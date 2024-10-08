<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\DiveGas\HeliumContent;
use FitParser\Messages\Profile\Generated\DiveGas\MessageIndex;
use FitParser\Messages\Profile\Generated\DiveGas\Mode;
use FitParser\Messages\Profile\Generated\DiveGas\OxygenContent;
use FitParser\Messages\Profile\Generated\DiveGas\Status;
use FitParser\Messages\Profile\MessageInterface;

final readonly class DiveGas implements MessageInterface
{
    private function __construct(
        public MessageIndex $messageIndex,
        public HeliumContent $heliumContent,
        public OxygenContent $oxygenContent,
        public Status $status,
        public Mode $mode,
    ) {}

    public static function create(): self
    {
        return new self(
            new MessageIndex(),
            new HeliumContent(),
            new OxygenContent(),
            new Status(),
            new Mode(),
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
