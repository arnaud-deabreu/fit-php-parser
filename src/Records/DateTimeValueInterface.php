<?php

declare(strict_types=1);

namespace FitParser\Records;

interface DateTimeValueInterface extends ValueInterface
{
    public static function create(\DateTimeImmutable $value): self;

    public function value(): \DateTimeImmutable;
}
