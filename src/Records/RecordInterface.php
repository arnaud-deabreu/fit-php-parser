<?php

declare(strict_types=1);

namespace FitParser\Records;

interface RecordInterface
{
    public function addValue(ValueInterface $value): void;

    /**
     * @return ValueInterface[]
     */
    public function getValues(): array;
}
