<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\ObdiiData\Pid;
use FitParser\Messages\Profile\Generated\ObdiiData\PidDataSize;
use FitParser\Messages\Profile\Generated\ObdiiData\RawData;
use FitParser\Messages\Profile\Generated\ObdiiData\StartTimestamp;
use FitParser\Messages\Profile\Generated\ObdiiData\StartTimestampMs;
use FitParser\Messages\Profile\Generated\ObdiiData\SystemTime;
use FitParser\Messages\Profile\Generated\ObdiiData\TimeOffset;
use FitParser\Messages\Profile\Generated\ObdiiData\Timestamp;
use FitParser\Messages\Profile\Generated\ObdiiData\TimestampMs;
use FitParser\Messages\Profile\MessageInterface;

final readonly class ObdiiData implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public TimestampMs $timestampMs,
        public TimeOffset $timeOffset,
        public Pid $pid,
        public RawData $rawData,
        public PidDataSize $pidDataSize,
        public SystemTime $systemTime,
        public StartTimestamp $startTimestamp,
        public StartTimestampMs $startTimestampMs,
    ) {}

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new TimestampMs(),
            new TimeOffset(),
            new Pid(),
            new RawData(),
            new PidDataSize(),
            new SystemTime(),
            new StartTimestamp(),
            new StartTimestampMs(),
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
