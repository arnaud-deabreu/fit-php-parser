<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated\Record;

use FitParser\Enums\Unit;
use FitParser\Records\FloatValueInterface;
use FitParser\Records\FloatValueTrait;

final readonly class TotalHemoglobinConc implements FloatValueInterface
{
    use FloatValueTrait;

    public const Unit UNIT = Unit::GRAM_PER_DECILITER;
}
