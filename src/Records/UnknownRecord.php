<?php

declare(strict_types=1);

namespace FitParser\Records;

final class UnknownRecord implements RecordInterface
{
    /**
     * @var ValueInterface[]
     */
    private array $values = [];

    public function getValues(): array
    {
        return $this->values;
    }

    public function addValue(ValueInterface $value): void
    {
        $this->values[] = $value;
    }
}
