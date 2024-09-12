<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Sport\Name;
use FitParser\Messages\Profile\Generated\Sport\Sport as Sport1;
use FitParser\Messages\Profile\Generated\Sport\SubSport;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Sport implements MessageInterface
{
    private function __construct(
        public Sport1 $sport,
        public SubSport $subSport,
        public Name $name,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new Sport1(),
            new SubSport(),
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
