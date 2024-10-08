<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Messages\Profile\Generated;

use FitParser\Messages\Profile\FieldInterface;
use FitParser\Messages\Profile\Generated\FieldDescription\Accumulate;
use FitParser\Messages\Profile\Generated\FieldDescription\Bits;
use FitParser\Messages\Profile\Generated\FieldDescription\Components;
use FitParser\Messages\Profile\Generated\FieldDescription\DeveloperDataIndex;
use FitParser\Messages\Profile\Generated\FieldDescription\FieldArray;
use FitParser\Messages\Profile\Generated\FieldDescription\FieldDefinitionNumber;
use FitParser\Messages\Profile\Generated\FieldDescription\FieldName;
use FitParser\Messages\Profile\Generated\FieldDescription\FitBaseTypeId;
use FitParser\Messages\Profile\Generated\FieldDescription\FitBaseUnitId;
use FitParser\Messages\Profile\Generated\FieldDescription\NativeFieldNum;
use FitParser\Messages\Profile\Generated\FieldDescription\NativeMesgNum;
use FitParser\Messages\Profile\Generated\FieldDescription\Offset;
use FitParser\Messages\Profile\Generated\FieldDescription\Scale;
use FitParser\Messages\Profile\Generated\FieldDescription\Units;
use FitParser\Messages\Profile\MessageInterface;

final readonly class FieldDescription implements MessageInterface
{
    private function __construct(
        public DeveloperDataIndex $developerDataIndex,
        public FieldDefinitionNumber $fieldDefinitionNumber,
        public FitBaseTypeId $fitBaseTypeId,
        public FieldName $fieldName,
        public FieldArray $fieldArray,
        public Components $components,
        public Scale $scale,
        public Offset $offset,
        public Units $units,
        public Bits $bits,
        public Accumulate $accumulate,
        public FitBaseUnitId $fitBaseUnitId,
        public NativeMesgNum $nativeMesgNum,
        public NativeFieldNum $nativeFieldNum,
    ) {}

    public static function create(): self
    {
        return new self(
            new DeveloperDataIndex(),
            new FieldDefinitionNumber(),
            new FitBaseTypeId(),
            new FieldName(),
            new FieldArray(),
            new Components(),
            new Scale(),
            new Offset(),
            new Units(),
            new Bits(),
            new Accumulate(),
            new FitBaseUnitId(),
            new NativeMesgNum(),
            new NativeFieldNum(),
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
