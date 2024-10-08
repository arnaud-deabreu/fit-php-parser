<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\SleepLevel\SleepLevel as SleepLevel1;
use FitParser\Messages\Profile\Generated\SleepLevel\Timestamp;
use FitParser\Messages\Profile\MessageInterface;

final readonly class SleepLevel implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public SleepLevel1 $sleepLevel,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new SleepLevel1(),
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
