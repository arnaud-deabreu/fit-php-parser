<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\SkinTempOvernight\Average7DayDeviation;
use FitParser\Records\Generated\SkinTempOvernight\AverageDeviation;
use FitParser\Records\Generated\SkinTempOvernight\LocalTimestamp;
use FitParser\Records\Generated\SkinTempOvernight\NightlyValue;
use FitParser\Records\Generated\SkinTempOvernight\Timestamp;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class SkinTempOvernight implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            LocalTimestamp::class,
            AverageDeviation::class,
            Average7DayDeviation::class,
            NightlyValue::class,
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
