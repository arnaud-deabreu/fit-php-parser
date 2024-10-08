<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\MaxMetData\CalibratedData;
use FitParser\Records\Generated\MaxMetData\HrSource;
use FitParser\Records\Generated\MaxMetData\MaxMetCategory;
use FitParser\Records\Generated\MaxMetData\SpeedSource;
use FitParser\Records\Generated\MaxMetData\Sport;
use FitParser\Records\Generated\MaxMetData\SubSport;
use FitParser\Records\Generated\MaxMetData\UpdateTime;
use FitParser\Records\Generated\MaxMetData\Vo2Max;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class MaxMetData implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            UpdateTime::class,
            Vo2Max::class,
            Sport::class,
            SubSport::class,
            MaxMetCategory::class,
            CalibratedData::class,
            HrSource::class,
            SpeedSource::class,
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
