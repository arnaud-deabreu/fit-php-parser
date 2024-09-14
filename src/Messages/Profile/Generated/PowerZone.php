<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\PowerZone\HighValue;
use FitParser\Messages\Profile\Generated\PowerZone\MessageIndex;
use FitParser\Messages\Profile\Generated\PowerZone\Name;
use FitParser\Messages\Profile\MessageInterface;

final readonly class PowerZone implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public HighValue $highValue,
        public Name $name,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new HighValue(),
            new Name(),
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
