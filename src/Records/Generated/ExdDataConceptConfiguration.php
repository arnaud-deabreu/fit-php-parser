<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated;

use FitParser\Records\Generated\ExdDataConceptConfiguration\ConceptField;
use FitParser\Records\Generated\ExdDataConceptConfiguration\ConceptIndex;
use FitParser\Records\Generated\ExdDataConceptConfiguration\ConceptKey;
use FitParser\Records\Generated\ExdDataConceptConfiguration\DataPage;
use FitParser\Records\Generated\ExdDataConceptConfiguration\DataUnits;
use FitParser\Records\Generated\ExdDataConceptConfiguration\Descriptor;
use FitParser\Records\Generated\ExdDataConceptConfiguration\FieldId;
use FitParser\Records\Generated\ExdDataConceptConfiguration\IsSigned;
use FitParser\Records\Generated\ExdDataConceptConfiguration\Qualifier;
use FitParser\Records\Generated\ExdDataConceptConfiguration\Scaling;
use FitParser\Records\Generated\ExdDataConceptConfiguration\ScreenIndex;
use FitParser\Records\RecordInterface;
use FitParser\Records\UnknownValue;
use FitParser\Records\ValueInterface;

final class ExdDataConceptConfiguration implements RecordInterface
{
    /** @var ValueInterface[] */
    private array $values;

    public function addValue(ValueInterface $value): void
    {
        if (false === \in_array($value::class, [
            ScreenIndex::class,
            ConceptField::class,
            FieldId::class,
            ConceptIndex::class,
            DataPage::class,
            ConceptKey::class,
            Scaling::class,
            DataUnits::class,
            Qualifier::class,
            Descriptor::class,
            IsSigned::class,
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