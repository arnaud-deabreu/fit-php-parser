<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated\Session;

use FitParser\Enums\Unit;
use FitParser\Records\IntValueInterface;
use FitParser\Records\IntValueTrait;

final readonly class TotalWork implements IntValueInterface
{
    use IntValueTrait;

    public const Unit UNIT = Unit::JOULES;
}
