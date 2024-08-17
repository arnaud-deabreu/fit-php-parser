<?php

declare(strict_types=1);

namespace FitParser\Formats;

final readonly class BinaryPackFormat implements \Stringable
{
    private function __construct(
        public string $code,
        public string $key,
        public ?int $multiplier,
    ) {}

    public function __toString(): string
    {
        return \sprintf(
            '%s%s%s',
            $this->code,
            $this->multiplier ?? '',
            $this->key
        );
    }

    public static function create(string $code, string $key, ?int $multiplier = null): self
    {
        return new self($code, $key, $multiplier);
    }
}
