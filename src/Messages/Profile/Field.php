<?php

declare(strict_types=1);

namespace FitParser\Messages\Profile;

final readonly class Field implements FieldInterface
{
    /**
     * @param int[] $array
     */
    private function __construct(
        public int $def,
        public string $name,
        public string $type,
        public array $array,
        public int $components, // todo extract from xlsx
        public int $scale,
        public int $offset,
        public string $units, // todo enum
        public bool $accumulate,
    ) {}

    /**
     * @param int[] $array
     */
    public static function create(
        int $def,
        string $name,
        string $type,
        array $array,
        int $components,
        int $scale,
        int $offset,
        string $units,
        bool $accumulate,
    ): self {
        return new self(
            $def,
            $name,
            $type,
            $array,
            $components,
            $scale,
            $offset,
            $units,
            $accumulate
        );
    }

    public function getDefinitionNumber(): int
    {
        return $this->def;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getScale(): int
    {
        return $this->scale;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
