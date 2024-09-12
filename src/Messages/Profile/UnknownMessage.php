<?php

declare(strict_types=1);

namespace FitParser\Messages\Profile;

final class UnknownMessage implements MessageInterface
{
    private function __construct(
        public string $name,
        public int $num,
        /**
         * @var Field[] $fields
         */
        public array $fields,
    ) {}

    public static function create(): MessageInterface
    {
        return new self(
            '',
            0,
            []
        );
    }

    /**
     * @return Field[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }

    /**
     * @param array{
     *      name: string,
     *      num: int,
     *      fields: array{}|array{
     *          array{
     *              fieldDef: int,
     *              fieldName: string,
     *              fieldType: string,
     *              array: int[],
     *              components: int,
     *              scale: int,
     *              offset: int,
     *              units: string,
     *              accumulate: bool,
     *          }|array{}
     *     }
     *   } $messageProfile
     */
    public static function fromArray(array $messageProfile): self
    {
        $fields = [];

        foreach ($messageProfile['fields'] as $field) {
            if ([] === $field) {
                continue;
            }

            $fields[$field['fieldDef']] = Field::create(
                def: $field['fieldDef'],
                name: $field['fieldName'],
                type: $field['fieldType'],
                array: $field['array'],
                components: $field['components'],
                scale: $field['scale'],
                offset: $field['offset'],
                units: $field['units'],
                accumulate: $field['accumulate'],
            );
        }

        return new self(
            $messageProfile['name'],
            $messageProfile['num'],
            $fields,
        );
    }
}
