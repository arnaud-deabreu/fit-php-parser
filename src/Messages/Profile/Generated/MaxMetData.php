<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\MaxMetData\CalibratedData;
use FitParser\Messages\Profile\Generated\MaxMetData\HrSource;
use FitParser\Messages\Profile\Generated\MaxMetData\MaxMetCategory;
use FitParser\Messages\Profile\Generated\MaxMetData\SpeedSource;
use FitParser\Messages\Profile\Generated\MaxMetData\Sport;
use FitParser\Messages\Profile\Generated\MaxMetData\SubSport;
use FitParser\Messages\Profile\Generated\MaxMetData\UpdateTime;
use FitParser\Messages\Profile\Generated\MaxMetData\Vo2Max;
use FitParser\Messages\Profile\MessageInterface;

final readonly class MaxMetData implements MessageInterface
{
    private function __construct(
        public UpdateTime $updateTime,
        public Vo2Max $vo2Max,
        public Sport $sport,
        public SubSport $subSport,
        public MaxMetCategory $maxMetCategory,
        public CalibratedData $calibratedData,
        public HrSource $hrSource,
        public SpeedSource $speedSource,
    ) {}

    public static function create(): self
    {
        return new self(
            new UpdateTime(),
            new Vo2Max(),
            new Sport(),
            new SubSport(),
            new MaxMetCategory(),
            new CalibratedData(),
            new HrSource(),
            new SpeedSource(),
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
