<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\TankSummary\EndPressure;
use FitParser\Messages\Profile\Generated\TankSummary\Sensor;
use FitParser\Messages\Profile\Generated\TankSummary\StartPressure;
use FitParser\Messages\Profile\Generated\TankSummary\Timestamp;
use FitParser\Messages\Profile\Generated\TankSummary\VolumeUsed;
use FitParser\Messages\Profile\MessageInterface;

final readonly class TankSummary implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public Sensor $sensor,
        public StartPressure $startPressure,
        public EndPressure $endPressure,
        public VolumeUsed $volumeUsed,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new Sensor(),
            new StartPressure(),
            new EndPressure(),
            new VolumeUsed(),
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
