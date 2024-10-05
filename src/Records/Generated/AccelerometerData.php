<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\AccelerometerData\AccelX;
use FitParser\Records\Generated\AccelerometerData\AccelY;
use FitParser\Records\Generated\AccelerometerData\AccelZ;
use FitParser\Records\Generated\AccelerometerData\CalibratedAccelX;
use FitParser\Records\Generated\AccelerometerData\CalibratedAccelY;
use FitParser\Records\Generated\AccelerometerData\CalibratedAccelZ;
use FitParser\Records\Generated\AccelerometerData\CompressedCalibratedAccelX;
use FitParser\Records\Generated\AccelerometerData\CompressedCalibratedAccelY;
use FitParser\Records\Generated\AccelerometerData\CompressedCalibratedAccelZ;
use FitParser\Records\Generated\AccelerometerData\SampleTimeOffset;
use FitParser\Records\Generated\AccelerometerData\Timestamp;
use FitParser\Records\Generated\AccelerometerData\TimestampMs;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class AccelerometerData implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            TimestampMs::class,
            SampleTimeOffset::class,
            AccelX::class,
            AccelY::class,
            AccelZ::class,
            CalibratedAccelX::class,
            CalibratedAccelY::class,
            CalibratedAccelZ::class,
            CompressedCalibratedAccelX::class,
            CompressedCalibratedAccelY::class,
            CompressedCalibratedAccelZ::class,
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
