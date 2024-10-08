<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\Goal\Enabled;
use FitParser\Records\Generated\Goal\EndDate;
use FitParser\Records\Generated\Goal\MessageIndex;
use FitParser\Records\Generated\Goal\Recurrence;
use FitParser\Records\Generated\Goal\RecurrenceValue;
use FitParser\Records\Generated\Goal\Repeat;
use FitParser\Records\Generated\Goal\Source;
use FitParser\Records\Generated\Goal\Sport;
use FitParser\Records\Generated\Goal\StartDate;
use FitParser\Records\Generated\Goal\SubSport;
use FitParser\Records\Generated\Goal\TargetValue;
use FitParser\Records\Generated\Goal\Type;
use FitParser\Records\Generated\Goal\Value;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class Goal implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            Sport::class,
            SubSport::class,
            StartDate::class,
            EndDate::class,
            Type::class,
            Value::class,
            Repeat::class,
            TargetValue::class,
            Recurrence::class,
            RecurrenceValue::class,
            Enabled::class,
            Source::class,
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
