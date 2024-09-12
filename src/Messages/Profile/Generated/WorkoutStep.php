<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\WorkoutStep\CustomTargetValueHigh;
use FitParser\Messages\Profile\Generated\WorkoutStep\CustomTargetValueLow;
use FitParser\Messages\Profile\Generated\WorkoutStep\DurationType;
use FitParser\Messages\Profile\Generated\WorkoutStep\DurationValue;
use FitParser\Messages\Profile\Generated\WorkoutStep\Equipment;
use FitParser\Messages\Profile\Generated\WorkoutStep\ExerciseCategory;
use FitParser\Messages\Profile\Generated\WorkoutStep\ExerciseName;
use FitParser\Messages\Profile\Generated\WorkoutStep\ExerciseWeight;
use FitParser\Messages\Profile\Generated\WorkoutStep\Intensity;
use FitParser\Messages\Profile\Generated\WorkoutStep\MessageIndex;
use FitParser\Messages\Profile\Generated\WorkoutStep\Notes;
use FitParser\Messages\Profile\Generated\WorkoutStep\SecondaryCustomTargetValueHigh;
use FitParser\Messages\Profile\Generated\WorkoutStep\SecondaryCustomTargetValueLow;
use FitParser\Messages\Profile\Generated\WorkoutStep\SecondaryTargetType;
use FitParser\Messages\Profile\Generated\WorkoutStep\SecondaryTargetValue;
use FitParser\Messages\Profile\Generated\WorkoutStep\TargetType;
use FitParser\Messages\Profile\Generated\WorkoutStep\TargetValue;
use FitParser\Messages\Profile\Generated\WorkoutStep\WeightDisplayUnit;
use FitParser\Messages\Profile\Generated\WorkoutStep\WktStepName;
use FitParser\Messages\Profile\MessageInterface;

final readonly class WorkoutStep implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public WktStepName $wktStepName,
        public DurationType $durationType,
        public DurationValue $durationValue,
        public TargetType $targetType,
        public TargetValue $targetValue,
        public CustomTargetValueLow $customTargetValueLow,
        public CustomTargetValueHigh $customTargetValueHigh,
        public Intensity $intensity,
        public Notes $notes,
        public Equipment $equipment,
        public ExerciseCategory $exerciseCategory,
        public ExerciseName $exerciseName,
        public ExerciseWeight $exerciseWeight,
        public WeightDisplayUnit $weightDisplayUnit,
        public SecondaryTargetType $secondaryTargetType,
        public SecondaryTargetValue $secondaryTargetValue,
        public SecondaryCustomTargetValueLow $secondaryCustomTargetValueLow,
        public SecondaryCustomTargetValueHigh $secondaryCustomTargetValueHigh,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new WktStepName(),
            new DurationType(),
            new DurationValue(),
            new TargetType(),
            new TargetValue(),
            new CustomTargetValueLow(),
            new CustomTargetValueHigh(),
            new Intensity(),
            new Notes(),
            new Equipment(),
            new ExerciseCategory(),
            new ExerciseName(),
            new ExerciseWeight(),
            new WeightDisplayUnit(),
            new SecondaryTargetType(),
            new SecondaryTargetValue(),
            new SecondaryCustomTargetValueLow(),
            new SecondaryCustomTargetValueHigh(),
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