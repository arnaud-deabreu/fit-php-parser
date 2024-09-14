<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\VideoClip\ClipEnd;
use FitParser\Messages\Profile\Generated\VideoClip\ClipNumber;
use FitParser\Messages\Profile\Generated\VideoClip\ClipStart;
use FitParser\Messages\Profile\Generated\VideoClip\EndTimestamp;
use FitParser\Messages\Profile\Generated\VideoClip\EndTimestampMs;
use FitParser\Messages\Profile\Generated\VideoClip\StartTimestamp;
use FitParser\Messages\Profile\Generated\VideoClip\StartTimestampMs;
use FitParser\Messages\Profile\MessageInterface;

final readonly class VideoClip implements MessageInterface
{
    private function __construct(
        public ClipNumber $clipNumber,
        public StartTimestamp $startTimestamp,
        public StartTimestampMs $startTimestampMs,
        public EndTimestamp $endTimestamp,
        public EndTimestampMs $endTimestampMs,
        public ClipStart $clipStart,
        public ClipEnd $clipEnd,
    ) {}

    public static function create(): self
    {
        return new self(
            new ClipNumber(),
            new StartTimestamp(),
            new StartTimestampMs(),
            new EndTimestamp(),
            new EndTimestampMs(),
            new ClipStart(),
            new ClipEnd(),
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
