<?php

declare(strict_types=1);

namespace FitParser\Messages;

use FitParser\Enums\BaseType;
use FitParser\Enums\Mask;
use FitParser\Messages\Definitions\DeveloperField;
use FitParser\Messages\Definitions\Field;
use FitParser\Messages\Profile\Message;
use FitParser\Stream;

final readonly class DefinitionMessage
{
    private function __construct(
        public int $recordHeader,
        public int $localMesgNum,
        public int $reserved,
        public int $architecture,
        public bool $littleEndian,
        public int $globalMessageNumber,
        public int $numFields,
        /**
         * @var Field[] $fieldDefinitions
         */
        public array $fieldDefinitions,
        /**
         * @var DeveloperField[] $developerFieldDefinitions
         */
        public array $developerFieldDefinitions,
        public int $messageSize,
        public int $developerDataSize,
        public Message $profileMessage,
    ) {}

    /**
     * @param Message[] $profileMessages
     */
    public static function create(
        Stream $stream,
        array $profileMessages,
    ): self {
        $recordHeader = $stream->readByte();
        $localMesgNum = $recordHeader & Mask::LOCAL_MESG_NUM_MASK->value;
        $reserved = $stream->readByte();
        $architecture = $stream->readByte();
        $littleEndian = 0 === $architecture;
        $globalMessageNumber = $stream->readUInt16($littleEndian);
        $numFields = $stream->readByte();

        $messageSize = 0;
        $fieldDefinitions = [];

        for ($i = 0; $i < $numFields; ++$i) {
            $fieldDefinition = Field::create(
                $stream->readByte(),
                $stream->readByte(),
                BaseType::from($stream->readByte())
            );

            $fieldDefinitions[] = $fieldDefinition;

            $messageSize += $fieldDefinition->size;
        }

        $developerFieldDefinitions = [];
        $developerDataSize = 0;

        if (($recordHeader & Mask::DEV_MESG_MASK->value) === Mask::DEV_MESG_MASK->value) {
            $numDevFields = $stream->readByte();

            for ($i = 0; $i < $numDevFields; ++$i) {
                $developerFieldDefinition = DeveloperField::create(
                    $stream->readByte(),
                    $stream->readByte(),
                    $stream->readByte(),
                );
                $developerFieldDefinitions[] = $developerFieldDefinition;
                $developerDataSize += $developerFieldDefinition->size;
            }
        }

        $messageProfile = $profileMessages[$globalMessageNumber] ?? Message::fromArray([
            'name' => 'data_'.$globalMessageNumber,
            'num' => $globalMessageNumber,
            'fields' => [],
        ]);

        return new self(
            $recordHeader,
            $localMesgNum,
            $reserved,
            $architecture,
            $littleEndian,
            $globalMessageNumber,
            $numFields,
            $fieldDefinitions,
            $developerFieldDefinitions,
            $messageSize,
            $developerDataSize,
            $messageProfile
        );
    }
}
