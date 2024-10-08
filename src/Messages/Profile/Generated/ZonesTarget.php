<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\ZonesTarget\FunctionalThresholdPower;
use FitParser\Messages\Profile\Generated\ZonesTarget\HrCalcType;
use FitParser\Messages\Profile\Generated\ZonesTarget\MaxHeartRate;
use FitParser\Messages\Profile\Generated\ZonesTarget\PwrCalcType;
use FitParser\Messages\Profile\Generated\ZonesTarget\ThresholdHeartRate;
use FitParser\Messages\Profile\MessageInterface;

final readonly class ZonesTarget implements MessageInterface
{
    private function __construct(
        public MaxHeartRate $maxHeartRate,
        public ThresholdHeartRate $thresholdHeartRate,
        public FunctionalThresholdPower $functionalThresholdPower,
        public HrCalcType $hrCalcType,
        public PwrCalcType $pwrCalcType,
    ) {}

    public static function create(): self
    {
        return new self(
            new MaxHeartRate(),
            new ThresholdHeartRate(),
            new FunctionalThresholdPower(),
            new HrCalcType(),
            new PwrCalcType(),
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
