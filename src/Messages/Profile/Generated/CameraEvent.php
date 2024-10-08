<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\CameraEvent\CameraEventType;
use FitParser\Messages\Profile\Generated\CameraEvent\CameraFileUuid;
use FitParser\Messages\Profile\Generated\CameraEvent\CameraOrientation;
use FitParser\Messages\Profile\Generated\CameraEvent\Timestamp;
use FitParser\Messages\Profile\Generated\CameraEvent\TimestampMs;
use FitParser\Messages\Profile\MessageInterface;

final readonly class CameraEvent implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public TimestampMs $timestampMs,
        public CameraEventType $cameraEventType,
        public CameraFileUuid $cameraFileUuid,
        public CameraOrientation $cameraOrientation,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new TimestampMs(),
            new CameraEventType(),
            new CameraFileUuid(),
            new CameraOrientation(),
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
