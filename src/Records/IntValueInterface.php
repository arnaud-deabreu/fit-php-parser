<?php

declare(strict_types=1);

namespace FitParser\Records;

interface IntValueInterface extends ValueInterface
{
    public static function create(int $value): self;

    public function value(): int;
}
