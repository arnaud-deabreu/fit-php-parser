<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\EnergyTotal;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\Instance;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\Time;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\TimeAboveThreshold;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\Timestamp;
use FitParser\Messages\Profile\Generated\AadAccelFeatures\ZeroCrossCnt;
use FitParser\Messages\Profile\MessageInterface;

final readonly class AadAccelFeatures implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public Time $time,
        public EnergyTotal $energyTotal,
        public ZeroCrossCnt $zeroCrossCnt,
        public Instance $instance,
        public TimeAboveThreshold $timeAboveThreshold,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new Time(),
            new EnergyTotal(),
            new ZeroCrossCnt(),
            new Instance(),
            new TimeAboveThreshold(),
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
