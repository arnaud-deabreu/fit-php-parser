<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\SlaveDevice\Manufacturer;
use FitParser\Messages\Profile\Generated\SlaveDevice\Product;
use FitParser\Messages\Profile\MessageInterface;

final readonly class SlaveDevice implements MessageInterface
{
    private function __construct(
        public Manufacturer $manufacturer,
        public Product $product,
    ) {}

    public static function create(): self
    {
        return new self(
            new Manufacturer(),
            new Product(),
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
