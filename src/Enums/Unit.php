<?php

declare(strict_types=1);

namespace FitParser\Enums;

enum Unit: string
{
    case NONE = '';
    case YEARS = 'years';
    case HOURS = 'hr';
    case MINUTES = 'min';
    case SECONDS = 's';
    case MILLISECONDS = 'ms';
    case BYTES = 'bytes';
    case STEPS = 'steps';
    case MILLIMETERS = 'mm';
    case KILOMETERS = 'km';
    case METERS = 'm';
    case KILOGRAMS = 'kg';
    case GRAMS = 'g';
    case MILLI_G = 'mG';
    case G = 'G';
    case KILOGRAM_PER_CUBIC_METER = 'kg/m^3';
    case BPM = 'bpm';
    case FACTOR = '%';
    case METER_PER_SECONDS = 'm/s';
    case WATTS = 'watts';
    case KILO_CALORIES_PER_MINUTE = 'kcal/min';
    case KILO_CALORIES = 'kcal';
    case KILO_CALORIES_PER_DAY = 'kcal/day';
    case KILO_CALORIES_PER_CYCLE = 'kcal/cycle';
    case RPM = 'rpm';
    case SEMICIRCLES = 'semicircles';
    case CYCLES = 'cycles';
    case LENGTHS = 'lengths';
    case TOTAL_SUSPENDED_SOLIDS = 'tss';
    case INTENSITY_FACTOR = 'if';
    case STROKES_PER_LAP = 'strokes/lap';
    case STROKES = 'strokes';
    case STROKES_PER_MINUTE = 'strokes/min';
    case JOULES = 'J';
    case CELCIUS = 'C';
    case COUNTS = 'counts';
    case GRAM_PER_DECILITER = 'g/dL';
    case DEGREES = 'degrees';
    case RADIANS = 'radians';
    case RADIANS_PER_SECOND = 'radians/second';
    case DEGREES_PER_SECONDS = 'deg/s';
    case OXYGEN_TOXICITY_UNITS = 'OTUs';
    case BREATH_RATE = 'breaths/min';
    case KILOG_GRITS = 'kGrit';
    case PASCALS = 'Pa';
    case BAR_PER_MINUTE = 'bar/min';
    case BAR = 'bar';
    case LITER_PER_MINUTE = 'L/min';
    case LITER = 'L';
    case MILLILITER_PER_KILOGRAM_PER_MINUTE = 'mL/kg/min';
    case VOLTS = 'V';
}
