<?php

declare(strict_types=1);

namespace FitParser\Messages\Profile;

interface FieldInterface {
    public function getDefinitionNumber(): int;

    public function getType(): string;

    public function getOffset(): int;

    public function getScale(): int;
}
