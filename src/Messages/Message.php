<?php

declare(strict_types=1);

namespace FitParser\Messages;

use FitParser\Messages\Field\Field;

final class Message
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

    public function transformValues(): void
    {
        foreach ($this->fields as $field) {
            $field->transformValue();
        }
    }
}
