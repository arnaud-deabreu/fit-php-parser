<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\AntTx\ChannelNumber;
use FitParser\Messages\Profile\Generated\AntTx\Data;
use FitParser\Messages\Profile\Generated\AntTx\FractionalTimestamp;
use FitParser\Messages\Profile\Generated\AntTx\MesgData;
use FitParser\Messages\Profile\Generated\AntTx\MesgId;
use FitParser\Messages\Profile\Generated\AntTx\Timestamp;
use FitParser\Messages\Profile\MessageInterface;

final readonly class AntTx implements MessageInterface
{
    private function __construct(
        public Timestamp $timestamp,
        public FractionalTimestamp $fractionalTimestamp,
        public MesgId $mesgId,
        public MesgData $mesgData,
        public ChannelNumber $channelNumber,
        public Data $data,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new Timestamp(),
            new FractionalTimestamp(),
            new MesgId(),
            new MesgData(),
            new ChannelNumber(),
            new Data(),
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
