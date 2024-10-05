<?php

declare(strict_types=1);

namespace FitParser\Records;

trait DateTimeValueTrait
{
    private readonly \DateTimeImmutable $value;

    private function __construct(\DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    public static function create(\DateTimeImmutable $value): self
    {
        return new self($value);
    }

    public function value(): \DateTimeImmutable
    {
        return $this->value;
    }
}
