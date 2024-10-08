<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\WeightScale\ActiveMet;
use FitParser\Records\Generated\WeightScale\BasalMet;
use FitParser\Records\Generated\WeightScale\Bmi;
use FitParser\Records\Generated\WeightScale\BoneMass;
use FitParser\Records\Generated\WeightScale\MetabolicAge;
use FitParser\Records\Generated\WeightScale\MuscleMass;
use FitParser\Records\Generated\WeightScale\PercentFat;
use FitParser\Records\Generated\WeightScale\PercentHydration;
use FitParser\Records\Generated\WeightScale\PhysiqueRating;
use FitParser\Records\Generated\WeightScale\Timestamp;
use FitParser\Records\Generated\WeightScale\UserProfileIndex;
use FitParser\Records\Generated\WeightScale\VisceralFatMass;
use FitParser\Records\Generated\WeightScale\VisceralFatRating;
use FitParser\Records\Generated\WeightScale\Weight;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class WeightScale implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            Weight::class,
            PercentFat::class,
            PercentHydration::class,
            VisceralFatMass::class,
            BoneMass::class,
            MuscleMass::class,
            BasalMet::class,
            PhysiqueRating::class,
            ActiveMet::class,
            MetabolicAge::class,
            VisceralFatRating::class,
            UserProfileIndex::class,
            Bmi::class,
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
