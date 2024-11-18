<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\CameraEvent\CameraEventType;
use FitParser\Records\Generated\CameraEvent\CameraFileUuid;
use FitParser\Records\Generated\CameraEvent\CameraOrientation;
use FitParser\Records\Generated\CameraEvent\Timestamp;
use FitParser\Records\Generated\CameraEvent\TimestampMs;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class CameraEvent implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            TimestampMs::class,
            CameraEventType::class,
            CameraFileUuid::class,
            CameraOrientation::class,
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