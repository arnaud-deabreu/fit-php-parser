<?php

declare(strict_types=1);

namespace FitParser\Records;

trait BoolValueTrait
{
    private readonly bool $value;

    private function __construct(bool $value)
    {
        $this->value = $value;
    }

    public static function create(bool $value): self
    {
        return new self($value);
    }

    public function value(): bool
    {
        return $this->value;
    }
}
