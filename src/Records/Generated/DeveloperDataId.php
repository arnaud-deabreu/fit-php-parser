<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\DeveloperDataId\ApplicationId;
use FitParser\Records\Generated\DeveloperDataId\ApplicationVersion;
use FitParser\Records\Generated\DeveloperDataId\DeveloperDataIndex;
use FitParser\Records\Generated\DeveloperDataId\DeveloperId;
use FitParser\Records\Generated\DeveloperDataId\ManufacturerId;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class DeveloperDataId implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            DeveloperId::class,
            ApplicationId::class,
            ManufacturerId::class,
            DeveloperDataIndex::class,
            ApplicationVersion::class,
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