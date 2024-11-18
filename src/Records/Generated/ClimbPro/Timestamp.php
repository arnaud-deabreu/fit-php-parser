<?php

/**
 * Do not edit this file: it is auto-generated from the fit-parser-generate-profile command.
 */

declare(strict_types=1);

namespace FitParser\Records\Generated\ClimbPro;

use FitParser\Enums\Unit;
use FitParser\Records\DateTimeValueInterface;
use FitParser\Records\DateTimeValueTrait;

final readonly class Timestamp implements DateTimeValueInterface
{
    use DateTimeValueTrait;

    public const Unit UNIT = Unit::SECONDS;
}