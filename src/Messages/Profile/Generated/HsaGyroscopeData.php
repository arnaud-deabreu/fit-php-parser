<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\GyroX;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\GyroY;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\GyroZ;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\SamplingInterval;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\Timestamp;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\Timestamp32k;
use FitParser\Messages\Profile\Generated\HsaGyroscopeData\TimestampMs;
use FitParser\Messages\Profile\MessageInterface;

final readonly class HsaGyroscopeData implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public TimestampMs $timestampMs,
        public SamplingInterval $samplingInterval,
        public GyroX $gyroX,
        public GyroY $gyroY,
        public GyroZ $gyroZ,
        public Timestamp32k $timestamp32k,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new TimestampMs(),
            new SamplingInterval(),
            new GyroX(),
            new GyroY(),
            new GyroZ(),
            new Timestamp32k(),
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
