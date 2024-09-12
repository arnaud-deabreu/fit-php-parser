<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\MemoGlob\Data;
use FitParser\Messages\Profile\Generated\MemoGlob\FieldNum;
use FitParser\Messages\Profile\Generated\MemoGlob\Memo;
use FitParser\Messages\Profile\Generated\MemoGlob\MesgNum;
use FitParser\Messages\Profile\Generated\MemoGlob\ParentIndex;
use FitParser\Messages\Profile\Generated\MemoGlob\PartIndex;
use FitParser\Messages\Profile\MessageInterface;

final readonly class MemoGlob implements MessageInterface
{
    private function __construct(
        public PartIndex $partIndex,
        public Memo $memo,
        public MesgNum $mesgNum,
        public ParentIndex $parentIndex,
        public FieldNum $fieldNum,
        public Data $data,
    ) {
    }

    public static function create(): self
    {
        return new self(
            new PartIndex(),
            new Memo(),
            new MesgNum(),
            new ParentIndex(),
            new FieldNum(),
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