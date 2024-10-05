<?php

declare(strict_types=1);

namespace FitParser\Records;

interface BoolValueInterface extends ValueInterface
{
    public static function create(bool $value): self;

    public function value(): bool;
}
