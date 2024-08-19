<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\Mask;
use FitParser\Messages\DefinitionMessage;
use FitParser\Messages\Profile\Message;
use FitParser\Messages\ProfileMessageFactory;
use FitParser\Records\Field;
use FitParser\Records\Record;
use Symfony\Component\String\ByteString;

final class Parser
{
    private const int MESG_DEFINITION_MASK = 0x40;
    private const int MESG_HEADER_MASK = 0x00;
    private Header $header;

    private Stream $stream;

    private ByteString $fileContents;

    /**
     * @var Message[]
     */
    private array $messageProfiles;

    /**
     * @var DefinitionMessage[]
     */
    private array $localMessageDefinitions = [];

    /**
     * @var Record[]
     */
    private array $records;

    public function __construct(string $filePath)
    {
        $fileContent = file_get_contents($filePath);

        if (false === $fileContent) {
            throw new \RuntimeException("Unable to read the file: {$filePath}");
        }

        $this->fileContents = new ByteString($fileContent);
        $this->messageProfiles = ProfileMessageFactory::fromJsonFile();

        $this->stream = new Stream($this->fileContents);
    }

    public function parse(): void
    {
        $this->parseHeader();
        $this->parseRecords();
    }

    /**
     * @return Record[]
     */
    public function getRecords(): array
    {
        return $this->records;
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
        $messageDefinition = DefinitionMessage::create($this->stream, $this->messageProfiles);

        $this->localMessageDefinitions[$messageDefinition->localMesgNum] = $messageDefinition;
    }

    private function decodeMessage(): void
    {
        $recordHeader = $this->stream->readByte();

        $localMesgNum = $recordHeader & Mask::LOCAL_MESG_NUM_MASK->value;

        if (false === \array_key_exists($localMesgNum, $this->localMessageDefinitions)) {
            throw new \RuntimeException("Invalid record definition: {$localMesgNum}");
        }

        $messageDefinition = $this->localMessageDefinitions[$localMesgNum];
        $fields = $messageDefinition->profileMessage->fields;

        $record = Record::create();

        foreach ($messageDefinition->fieldDefinitions as $fieldDefinition) {
            $field = $fields[$fieldDefinition->number] ?? null;

            $rawValue = $this->stream->readValue(
                $fieldDefinition->baseType,
                $fieldDefinition->size,
                $messageDefinition->littleEndian
            );

            if (null !== $rawValue) {
                $record->addField(
                    Field::create(
                        null !== $field ? $field->name : 'data_'.$fieldDefinition->number,
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

        $this->records[] = $record;
    }
}
