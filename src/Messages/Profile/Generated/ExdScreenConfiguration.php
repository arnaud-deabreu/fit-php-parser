<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\ExdScreenConfiguration\FieldCount;
use FitParser\Messages\Profile\Generated\ExdScreenConfiguration\Layout;
use FitParser\Messages\Profile\Generated\ExdScreenConfiguration\ScreenEnabled;
use FitParser\Messages\Profile\Generated\ExdScreenConfiguration\ScreenIndex;
use FitParser\Messages\Profile\MessageInterface;

final readonly class ExdScreenConfiguration implements MessageInterface
{
    private function __construct(
        public ScreenIndex $screenIndex,
        public FieldCount $fieldCount,
        public Layout $layout,
        public ScreenEnabled $screenEnabled,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new ScreenIndex(),
            new FieldCount(),
            new Layout(),
            new ScreenEnabled(),
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
