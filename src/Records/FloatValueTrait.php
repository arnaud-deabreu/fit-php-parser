<?php

declare(strict_types=1);

namespace FitParser\Records;

trait FloatValueTrait
{
    private readonly float $value;

    private function __construct(float $value)
    {
        $this->value = $value;
    }

    public static function create(float $value): self
    {
        return new self($value);
    }

    public function value(): float
    {
        return $this->value;
    }
}
