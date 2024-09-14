<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\WatchfaceSettings\Layout;
use FitParser\Messages\Profile\Generated\WatchfaceSettings\MessageIndex;
use FitParser\Messages\Profile\Generated\WatchfaceSettings\Mode;
use FitParser\Messages\Profile\MessageInterface;

final readonly class WatchfaceSettings implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Mode $mode,
        public Layout $layout,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Mode(),
            new Layout(),
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
