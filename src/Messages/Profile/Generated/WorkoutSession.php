<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\WorkoutSession\FirstStepIndex;
use FitParser\Messages\Profile\Generated\WorkoutSession\MessageIndex;
use FitParser\Messages\Profile\Generated\WorkoutSession\NumValidSteps;
use FitParser\Messages\Profile\Generated\WorkoutSession\PoolLength;
use FitParser\Messages\Profile\Generated\WorkoutSession\PoolLengthUnit;
use FitParser\Messages\Profile\Generated\WorkoutSession\Sport;
use FitParser\Messages\Profile\Generated\WorkoutSession\SubSport;
use FitParser\Messages\Profile\MessageInterface;

final readonly class WorkoutSession implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public Sport $sport,
        public SubSport $subSport,
        public NumValidSteps $numValidSteps,
        public FirstStepIndex $firstStepIndex,
        public PoolLength $poolLength,
        public PoolLengthUnit $poolLengthUnit,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new Sport(),
            new SubSport(),
            new NumValidSteps(),
            new FirstStepIndex(),
            new PoolLength(),
            new PoolLengthUnit(),
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
