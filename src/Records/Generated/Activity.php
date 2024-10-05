<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\Activity\Event;
use FitParser\Records\Generated\Activity\EventGroup;
use FitParser\Records\Generated\Activity\EventType;
use FitParser\Records\Generated\Activity\LocalTimestamp;
use FitParser\Records\Generated\Activity\NumSessions;
use FitParser\Records\Generated\Activity\Timestamp;
use FitParser\Records\Generated\Activity\TotalTimerTime;
use FitParser\Records\Generated\Activity\Type;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class Activity implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            TotalTimerTime::class,
            NumSessions::class,
            Type::class,
            Event::class,
            EventType::class,
            LocalTimestamp::class,
            EventGroup::class,
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
