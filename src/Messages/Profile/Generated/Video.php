<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\Video\Duration;
use FitParser\Messages\Profile\Generated\Video\HostingProvider;
use FitParser\Messages\Profile\Generated\Video\Url;
use FitParser\Messages\Profile\MessageInterface;

final readonly class Video implements MessageInterface
{
    private function __construct(
        public Url $url,
        public HostingProvider $hostingProvider,
        public Duration $duration,
    ) {}

    public static function create(): self
    {
        return new self(
            new Url(),
            new HostingProvider(),
            new Duration(),
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
