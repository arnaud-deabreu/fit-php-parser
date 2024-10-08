<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\AntChannelId\ChannelNumber;
use FitParser\Messages\Profile\Generated\AntChannelId\DeviceIndex;
use FitParser\Messages\Profile\Generated\AntChannelId\DeviceNumber;
use FitParser\Messages\Profile\Generated\AntChannelId\DeviceType;
use FitParser\Messages\Profile\Generated\AntChannelId\TransmissionType;
use FitParser\Messages\Profile\MessageInterface;

final readonly class AntChannelId implements MessageInterface
{
    private function __construct(
        public ChannelNumber $channelNumber,
        public DeviceType $deviceType,
        public DeviceNumber $deviceNumber,
        public TransmissionType $transmissionType,
        public DeviceIndex $deviceIndex,
    ) {}

    public static function create(): self
    {
        return new self(
            new ChannelNumber(),
            new DeviceType(),
            new DeviceNumber(),
            new TransmissionType(),
            new DeviceIndex(),
        );
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields(): iterable
    {
        /** @var FieldInterface[] $properties */
        $properties = get_object_vars($this);

        foreach ($properties as $field) {
            yield $field->getDefinitionNumber() => $field;
        }
    }
}
