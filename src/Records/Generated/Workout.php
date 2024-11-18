<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\Workout\Capabilities;
use FitParser\Records\Generated\Workout\MessageIndex;
use FitParser\Records\Generated\Workout\NumValidSteps;
use FitParser\Records\Generated\Workout\PoolLength;
use FitParser\Records\Generated\Workout\PoolLengthUnit;
use FitParser\Records\Generated\Workout\Sport;
use FitParser\Records\Generated\Workout\SubSport;
use FitParser\Records\Generated\Workout\WktName;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class Workout implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            Sport::class,
            Capabilities::class,
            NumValidSteps::class,
            WktName::class,
            SubSport::class,
            PoolLength::class,
            PoolLengthUnit::class,
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