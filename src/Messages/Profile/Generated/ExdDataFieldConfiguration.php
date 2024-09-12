<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\ConceptCount;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\ConceptField;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\DisplayType;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\FieldId;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\ScreenIndex;
use FitParser\Messages\Profile\Generated\ExdDataFieldConfiguration\Title;
use FitParser\Messages\Profile\MessageInterface;

final readonly class ExdDataFieldConfiguration implements MessageInterface
{
    private function __construct(
        public ScreenIndex $screenIndex,
        public ConceptField $conceptField,
        public FieldId $fieldId,
        public ConceptCount $conceptCount,
        public DisplayType $displayType,
        public Title $title,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new ScreenIndex(),
            new ConceptField(),
            new FieldId(),
            new ConceptCount(),
            new DisplayType(),
            new Title(),
        );
    }

    /**
     * @return FieldInterface[]
     */
    public function getFields(): iterable
    {
        /** @var FieldInterface[] $properties */
        $properties = get_object_vars($this);

        foreach ($properties as $field) {
            yield $field->getDefinitionNumber() => $field;
        }
    }
}