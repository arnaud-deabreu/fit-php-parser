<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\HrvStatusSummary\BaselineBalancedLower;
use FitParser\Records\Generated\HrvStatusSummary\BaselineBalancedUpper;
use FitParser\Records\Generated\HrvStatusSummary\BaselineLowUpper;
use FitParser\Records\Generated\HrvStatusSummary\LastNight5MinHigh;
use FitParser\Records\Generated\HrvStatusSummary\LastNightAverage;
use FitParser\Records\Generated\HrvStatusSummary\Status;
use FitParser\Records\Generated\HrvStatusSummary\Timestamp;
use FitParser\Records\Generated\HrvStatusSummary\WeeklyAverage;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class HrvStatusSummary implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            WeeklyAverage::class,
            LastNightAverage::class,
            LastNight5MinHigh::class,
            BaselineLowUpper::class,
            BaselineBalancedLower::class,
            BaselineBalancedUpper::class,
            Status::class,
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