<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\MaskEnum;
use FitParser\Messages\Field\Field;
use FitParser\Messages\Message;
use FitParser\Messages\MessageDefinition;
use FitParser\Messages\MessageProfile;
use FitParser\Messages\MessageProfileFactory;
use Symfony\Component\String\ByteString;

final class Parser
{
    private const int MESG_DEFINITION_MASK = 0x40;
    private const int MESG_HEADER_MASK = 0x00;
    private Header $header;

    private Stream $stream;

    private ByteString $fileContents;

    /**
     * @var MessageProfile[]
     */
    private array $messageProfiles;

    /**
     * @var MessageDefinition[]
     */
    private array $localMessageDefinitions = [];

    /**
     * @var Message[]
     */
    private array $messages;

    public function __construct(string $filePath)
    {
        $fileContent = file_get_contents($filePath);

        if (false === $fileContent) {
            throw new \RuntimeException("Unable to read the file: {$filePath}");
        }

        $this->fileContents = new ByteString($fileContent);
        $this->messageProfiles = MessageProfileFactory::fromJsonFile();

        $this->stream = new Stream($this->fileContents);
    }

    public function parse(): void
    {
        $this->parseHeader();
        $this->parseRecords();
    }

    /**
     * @return Message[]
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    private function parseHeader(): void
    {
        $this->header = Header::fromByteString($this->fileContents);
        $this->stream->seek($this->header->headerSize);
    }

    private function parseRecords(): void
    {
        while ($this->header->headerSize + $this->header->dataSize > $this->stream->position()) {
            $this->decodeNextRecord();
        }
    }

    private function decodeNextRecord(): void
    {
        $recordHeader = $this->stream->peekByte();

        if (($recordHeader & self::MESG_DEFINITION_MASK) === self::MESG_HEADER_MASK) {
            $this->decodeMessage();
        }

        if (($recordHeader & self::MESG_DEFINITION_MASK) === self::MESG_DEFINITION_MASK) {
            $this->decodeMessageDefinition();
        }
    }

    private function decodeMessageDefinition(): void
    {
        $messageDefinition = MessageDefinition::create($this->stream, $this->messageProfiles);

        $this->localMessageDefinitions[$messageDefinition->localMesgNum] = $messageDefinition;
    }

    private function decodeMessage(): void
    {
        $recordHeader = $this->stream->readByte();

        $localMesgNum = $recordHeader & MaskEnum::LOCAL_MESG_NUM_MASK->value;

        if (false === \array_key_exists($localMesgNum, $this->localMessageDefinitions)) {
            throw new \RuntimeException("Invalid message definition: {$localMesgNum}");
        }

        $messageDefinition = $this->localMessageDefinitions[$localMesgNum];
        $fields = $messageDefinition->messageProfile->fields;

        $message = Message::create();

        foreach ($messageDefinition->fieldDefinitions as $fieldDefinition) {
            $field = $fields[$fieldDefinition->number] ?? null;

            $rawValue = $this->stream->readValue(
                $fieldDefinition->baseType,
                $fieldDefinition->size,
                $messageDefinition->littleEndian
            );

            if (null !== $rawValue) {
                $message->addField(
                    Field::create(
                        null !== $field ? $field->name : 'data_'.$fieldDefinition->number,
                        $fieldDefinition,
                        $rawValue,
                        $field,
                    )
                );
            }
        }

        // TODO: separate developer fields
        // foreach ($messageDefinition->developerFieldDefinitions as $developerFieldDefinition){}
        // addDeveloperDataIdToProfile
        // addFieldDescriptionToProfile
        // expandSubFields
        // expandComponents

        $message->transformValues();

        $this->messages[] = $message;
    }
}
