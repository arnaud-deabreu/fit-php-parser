<?php

declare(strict_types=1);

namespace FitParser\Messages;

use FitParser\Enums\BaseTypeEnum;
use FitParser\Enums\MaskEnum;
use FitParser\Messages\Field\DeveloperFieldDefinition;
use FitParser\Messages\Field\FieldDefinition;
use FitParser\Stream;

final readonly class MessageDefinition
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
         * @var FieldDefinition[] $fieldDefinitions
         */
        public array $fieldDefinitions,
        /**
         * @var DeveloperFieldDefinition[] $developerFieldDefinitions
         */
        public array $developerFieldDefinitions,
        public int $messageSize,
        public int $developerDataSize,
        public MessageProfile $messageProfile,
    ) {}

    /**
     * @param MessageProfile[] $messageProfiles
     */
    public static function create(
        Stream $stream,
        array $messageProfiles,
    ): self {
        $recordHeader = $stream->readByte();
        $localMesgNum = $recordHeader & MaskEnum::LOCAL_MESG_NUM_MASK->value;
        $reserved = $stream->readByte();
        $architecture = $stream->readByte();
        $littleEndian = 0 === $architecture;
        $globalMessageNumber = $stream->readUInt16($littleEndian);
        $numFields = $stream->readByte();

        $messageSize = 0;
        $fieldDefinitions = [];

        for ($i = 0; $i < $numFields; ++$i) {
            $fieldDefinition = FieldDefinition::create(
                $stream->readByte(),
                $stream->readByte(),
                BaseTypeEnum::from($stream->readByte())
            );

            $fieldDefinitions[] = $fieldDefinition;

            $messageSize += $fieldDefinition->size;
        }

        $developerFieldDefinitions = [];
        $developerDataSize = 0;
        if (($recordHeader & MaskEnum::DEV_DATA_MASK->value) === MaskEnum::DEV_DATA_MASK->value) {
            $numDevFields = $stream->readByte();

            for ($i = 0; $i < $numDevFields; ++$i) {
                $developerFieldDefinition = DeveloperFieldDefinition::create(
                    $stream->readByte(),
                    $stream->readByte(),
                    $stream->readByte(),
                );
                $developerFieldDefinitions[] = $developerFieldDefinition;
                $developerDataSize += $developerFieldDefinition->size;
            }
        }

        $messageProfile = $messageProfiles[$globalMessageNumber] ?? MessageProfile::fromArray([
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
