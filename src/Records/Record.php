<?php

declare(strict_types=1);

namespace FitParser\Records;

final class Record
{
    private function __construct(
        /**
         * @var Field[]
         */
        private array $fields,
    ) {}

    /**
     * @param Field[] $fields
     */
    public static function create(array $fields = []): self
    {
        return new self($fields);
    }

    public function addField(Field $field): void
    {
        $this->fields[] = $field;
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
