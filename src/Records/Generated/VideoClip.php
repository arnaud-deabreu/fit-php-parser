<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\VideoClip\ClipEnd;
use FitParser\Records\Generated\VideoClip\ClipNumber;
use FitParser\Records\Generated\VideoClip\ClipStart;
use FitParser\Records\Generated\VideoClip\EndTimestamp;
use FitParser\Records\Generated\VideoClip\EndTimestampMs;
use FitParser\Records\Generated\VideoClip\StartTimestamp;
use FitParser\Records\Generated\VideoClip\StartTimestampMs;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class VideoClip implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            ClipNumber::class,
            StartTimestamp::class,
            StartTimestampMs::class,
            EndTimestamp::class,
            EndTimestampMs::class,
            ClipStart::class,
            ClipEnd::class,
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