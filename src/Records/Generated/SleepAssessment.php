<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\SleepAssessment\AverageStressDuringSleep;
use FitParser\Records\Generated\SleepAssessment\AwakeningsCount;
use FitParser\Records\Generated\SleepAssessment\AwakeningsCountScore;
use FitParser\Records\Generated\SleepAssessment\AwakeTimeScore;
use FitParser\Records\Generated\SleepAssessment\CombinedAwakeScore;
use FitParser\Records\Generated\SleepAssessment\DeepSleepScore;
use FitParser\Records\Generated\SleepAssessment\InterruptionsScore;
use FitParser\Records\Generated\SleepAssessment\LightSleepScore;
use FitParser\Records\Generated\SleepAssessment\OverallSleepScore;
use FitParser\Records\Generated\SleepAssessment\RemSleepScore;
use FitParser\Records\Generated\SleepAssessment\SleepDurationScore;
use FitParser\Records\Generated\SleepAssessment\SleepQualityScore;
use FitParser\Records\Generated\SleepAssessment\SleepRecoveryScore;
use FitParser\Records\Generated\SleepAssessment\SleepRestlessnessScore;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class SleepAssessment implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            CombinedAwakeScore::class,
            AwakeTimeScore::class,
            AwakeningsCountScore::class,
            DeepSleepScore::class,
            SleepDurationScore::class,
            LightSleepScore::class,
            OverallSleepScore::class,
            SleepQualityScore::class,
            SleepRecoveryScore::class,
            RemSleepScore::class,
            SleepRestlessnessScore::class,
            AwakeningsCount::class,
            InterruptionsScore::class,
            AverageStressDuringSleep::class,
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
