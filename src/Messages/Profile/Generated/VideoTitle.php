<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\VideoTitle\MessageCount;
use FitParser\Messages\Profile\Generated\VideoTitle\MessageIndex;
use FitParser\Messages\Profile\Generated\VideoTitle\Text;
use FitParser\Messages\Profile\MessageInterface;

final readonly class VideoTitle implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public MessageCount $messageCount,
        public Text $text,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new MessageCount(),
            new Text(),
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