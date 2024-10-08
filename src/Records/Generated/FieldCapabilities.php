<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\FieldCapabilities\Count;
use FitParser\Records\Generated\FieldCapabilities\FieldNum;
use FitParser\Records\Generated\FieldCapabilities\File;
use FitParser\Records\Generated\FieldCapabilities\MesgNum;
use FitParser\Records\Generated\FieldCapabilities\MessageIndex;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class FieldCapabilities implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            MessageIndex::class,
            File::class,
            MesgNum::class,
            FieldNum::class,
            Count::class,
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
