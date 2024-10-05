<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\Mask;
use FitParser\Messages\DefinitionMessage;
use FitParser\Records\Field;
use FitParser\Records\Generated\RecordsRegistry;
use FitParser\Records\RecordInterface;
use Symfony\Component\String\ByteString;

final class Parser
{
    private const int MESG_DEFINITION_MASK = 0x40;
    private const int MESG_HEADER_MASK = 0x00;
    private Header $header;

    private Stream $stream;

    private ByteString $fileContents;

    private CrcChecker $crcChecker;

    /**
     * @var DefinitionMessage[]
     */
    private array $localMessageDefinitions = [];

    private RecordsRegistry $recordsRegistry;

    /**
     * @var RecordInterface[]
     */
    private array $records;

    public function __construct(string $fileContent)
    {
        $this->crcChecker = new CrcChecker();
        $this->fileContents = new ByteString($fileContent);
        $this->stream = new Stream(
            $this->fileContents,
            $this->crcChecker,
        );
        $this->recordsRegistry = new RecordsRegistry();
    }

    public function parse(): void
    {
        $this->parseHeader();
        $this->parseRecords();
    }

    /**
     * @return RecordInterface[]
     */
    public function getRecords(): array
    {
        return $this->records;
    }

    private function parseHeader(): void
    {
        $this->header = Header::fromStream($this->stream);
    }

    private function parseRecords(): void
    {
        while ($this->header->headerSize + $this->header->dataSize > $this->stream->position()) {
            $this->decodeNextRecord();
        }

        if ($this->crcChecker->getChecksum() !== $this->stream->readUInt16()) {
            throw new \RuntimeException('Invalid CRC checksum');
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
        $messageDefinition = DefinitionMessage::create($this->stream);

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

        $fields = iterator_to_array($messageDefinition->profileMessage->getFields());

        $record = $this->recordsRegistry->getRecord($messageDefinition->globalMessageNumber);

        foreach ($messageDefinition->fieldDefinitions as $fieldDefinition) {
            $field = $fields[$fieldDefinition->number] ?? null;

            $rawValue = $this->stream->readValue(
                $fieldDefinition->baseType,
                $fieldDefinition->size,
                $messageDefinition->littleEndian
            );

            if (null !== $rawValue) {
                $record->addValue(
                    Utils::convertFieldToValueObject(
                        Field::create(
                            null !== $field ? $field::class : 'data_'.$fieldDefinition->number,
                            $rawValue,
                            $field,
                        )
                    ),
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
