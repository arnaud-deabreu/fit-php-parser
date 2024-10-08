<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\ClimbPro\ClimbCategory;
use FitParser\Records\Generated\ClimbPro\ClimbNumber;
use FitParser\Records\Generated\ClimbPro\ClimbProEvent;
use FitParser\Records\Generated\ClimbPro\CurrentDist;
use FitParser\Records\Generated\ClimbPro\PositionLat;
use FitParser\Records\Generated\ClimbPro\PositionLong;
use FitParser\Records\Generated\ClimbPro\Timestamp;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class ClimbPro implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            Timestamp::class,
            PositionLat::class,
            PositionLong::class,
            ClimbProEvent::class,
            ClimbNumber::class,
            ClimbCategory::class,
            CurrentDist::class,
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
