<?php

declare(strict_types=1);

namespace FitParser\Records;

interface StringValueInterface extends ValueInterface
{
    public static function create(string $value): self;

    public function value(): string;
}
