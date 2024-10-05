<?php

declare(strict_types=1);

namespace FitParser\Records;

interface FloatValueInterface extends ValueInterface
{
    public static function create(float $value): self;

    public function value(): float;
}
