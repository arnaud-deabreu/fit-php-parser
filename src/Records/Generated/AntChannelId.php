<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\AntChannelId\ChannelNumber;
use FitParser\Records\Generated\AntChannelId\DeviceIndex;
use FitParser\Records\Generated\AntChannelId\DeviceNumber;
use FitParser\Records\Generated\AntChannelId\DeviceType;
use FitParser\Records\Generated\AntChannelId\TransmissionType;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class AntChannelId implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            ChannelNumber::class,
            DeviceType::class,
            DeviceNumber::class,
            TransmissionType::class,
            DeviceIndex::class,
            UnknownValue::class,
        ], true)) {
            throw new \InvalidArgumentException(
                \sprintf('%s is not an expected value for this record.', $value::class)
            );
        }

        $this->values[] = $value;
    }

    /**
     * @return ValueInterface[]
     */
    public function getValues(): array
    {
        return $this->values;
    }
}
