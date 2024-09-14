<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Course\Capabilities;
use FitParser\Messages\Profile\Generated\Course\Name;
use FitParser\Messages\Profile\Generated\Course\Sport;
use FitParser\Messages\Profile\Generated\Course\SubSport;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Course implements MessageInterface
{
    private function __construct(
        public Sport $sport,
        public Name $name,
        public Capabilities $capabilities,
        public SubSport $subSport,
    ) {}

    public static function create(): self
    {
        return new self(
            new Sport(),
            new Name(),
            new Capabilities(),
            new SubSport(),
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
