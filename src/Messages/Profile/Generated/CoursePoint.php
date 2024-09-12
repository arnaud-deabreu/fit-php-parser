<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\CoursePoint\Distance;
use FitParser\Messages\Profile\Generated\CoursePoint\Favorite;
use FitParser\Messages\Profile\Generated\CoursePoint\MessageIndex;
use FitParser\Messages\Profile\Generated\CoursePoint\Name;
use FitParser\Messages\Profile\Generated\CoursePoint\PositionLat;
use FitParser\Messages\Profile\Generated\CoursePoint\PositionLong;
use FitParser\Messages\Profile\Generated\CoursePoint\Timestamp;
use FitParser\Messages\Profile\Generated\CoursePoint\Type;
use FitParser\Messages\Profile\MessageInterface;

final readonly class CoursePoint implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Timestamp $timestamp,
        public PositionLat $positionLat,
        public PositionLong $positionLong,
        public Distance $distance,
        public Type $type,
        public Name $name,
        public Favorite $favorite,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Timestamp(),
            new PositionLat(),
            new PositionLong(),
            new Distance(),
            new Type(),
            new Name(),
            new Favorite(),
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