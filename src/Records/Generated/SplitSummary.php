<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\SplitSummary\AvgHeartRate;
use FitParser\Records\Generated\SplitSummary\AvgSpeed;
use FitParser\Records\Generated\SplitSummary\AvgVertSpeed;
use FitParser\Records\Generated\SplitSummary\MaxHeartRate;
use FitParser\Records\Generated\SplitSummary\MaxSpeed;
use FitParser\Records\Generated\SplitSummary\MessageIndex;
use FitParser\Records\Generated\SplitSummary\NumSplits;
use FitParser\Records\Generated\SplitSummary\SplitType;
use FitParser\Records\Generated\SplitSummary\TotalAscent;
use FitParser\Records\Generated\SplitSummary\TotalCalories;
use FitParser\Records\Generated\SplitSummary\TotalDescent;
use FitParser\Records\Generated\SplitSummary\TotalDistance;
use FitParser\Records\Generated\SplitSummary\TotalMovingTime;
use FitParser\Records\Generated\SplitSummary\TotalTimerTime;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class SplitSummary implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            SplitType::class,
            NumSplits::class,
            TotalTimerTime::class,
            TotalDistance::class,
            AvgSpeed::class,
            MaxSpeed::class,
            TotalAscent::class,
            TotalDescent::class,
            AvgHeartRate::class,
            MaxHeartRate::class,
            AvgVertSpeed::class,
            TotalCalories::class,
            TotalMovingTime::class,
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
