<?php

declare(strict_types=1);

namespace FitParser\Records;

use FitParser\Enums\Unit;

final class UnknownValue implements ValueInterface
{
    public const Unit UNIT = Unit::NONE;
    private readonly null|bool|\DateTimeImmutable|float|int|string $value;

    private function __construct(null|bool|\DateTimeImmutable|float|int|string $value)
    {
        $this->value = $value;
    }

    public static function create(null|bool|\DateTimeImmutable|float|int|string $value): self
    {
        return new self($value);
    }

    public function value(): null|bool|\DateTimeImmutable|float|int|string
    {
        return $this->value;
    }
}
