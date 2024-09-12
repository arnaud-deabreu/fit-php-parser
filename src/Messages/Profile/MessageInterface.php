<?php

declare(strict_types=1);

namespace FitParser\Messages\Profile;

interface MessageInterface
{
    public static function create(): self;

    /**
     * @return FieldInterface[]
     */
    public function getFields(): iterable;

    // TODO
    //public function getField(int $def): FieldInterface;
}
