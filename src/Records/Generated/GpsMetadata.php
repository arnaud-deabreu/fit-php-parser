<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\GpsMetadata\EnhancedAltitude;
use FitParser\Records\Generated\GpsMetadata\EnhancedSpeed;
use FitParser\Records\Generated\GpsMetadata\Heading;
use FitParser\Records\Generated\GpsMetadata\PositionLat;
use FitParser\Records\Generated\GpsMetadata\PositionLong;
use FitParser\Records\Generated\GpsMetadata\Timestamp;
use FitParser\Records\Generated\GpsMetadata\TimestampMs;
use FitParser\Records\Generated\GpsMetadata\UtcTimestamp;
use FitParser\Records\Generated\GpsMetadata\Velocity;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class GpsMetadata implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            TimestampMs::class,
            PositionLat::class,
            PositionLong::class,
            EnhancedAltitude::class,
            EnhancedSpeed::class,
            Heading::class,
            UtcTimestamp::class,
            Velocity::class,
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