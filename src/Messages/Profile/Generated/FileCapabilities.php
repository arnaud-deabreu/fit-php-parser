<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\FileCapabilities\Directory;
use FitParser\Messages\Profile\Generated\FileCapabilities\Flags;
use FitParser\Messages\Profile\Generated\FileCapabilities\MaxCount;
use FitParser\Messages\Profile\Generated\FileCapabilities\MaxSize;
use FitParser\Messages\Profile\Generated\FileCapabilities\MessageIndex;
use FitParser\Messages\Profile\Generated\FileCapabilities\Type;
use FitParser\Messages\Profile\MessageInterface;

final readonly class FileCapabilities implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Type $type,
        public Flags $flags,
        public Directory $directory,
        public MaxCount $maxCount,
        public MaxSize $maxSize,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Type(),
            new Flags(),
            new Directory(),
            new MaxCount(),
            new MaxSize(),
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
