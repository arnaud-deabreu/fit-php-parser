<?php

declare(strict_types=1);

namespace FitParser\Records;

trait IntValueTrait
{
    private readonly int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function create(int $value): self
    {
        return new self($value);
    }

    public function value(): int
    {
        return $this->value;
    }
}
