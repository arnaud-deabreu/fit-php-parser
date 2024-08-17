<?php

declare(strict_types=1);

namespace FitParser\Enums;

enum BaseTypeEnum: int
{
    case ENUM = 0x00;
    case SINT8 = 0x01;
    case UINT8 = 0x02;
    case SINT16 = 0x83;
    case UINT16 = 0x84;
    case SINT32 = 0x85;
    case UINT32 = 0x86;
    case STRING = 0x07;
    case FLOAT32 = 0x88;
    case FLOAT64 = 0x89;
    case UINT8Z = 0x0A;
    case UINT16Z = 0x8B;
    case UINT32Z = 0x8C;
    case BYTE = 0x0D;
    case SINT64 = 0x8E;
    case UINT64 = 0x8F;
    case UINT64Z = 0x9;

    public static function sizeFrom(BaseTypeEnum $baseType): int
    {
        return match ($baseType) {
            self::ENUM,
            self::SINT8,
            self::STRING,
            self::UINT8Z,
            self::BYTE,
            self::UINT8 => 1,
            self::SINT16,
            self::UINT16Z,
            self::UINT16 => 2,
            self::SINT32,
            self::UINT32,
            self::UINT32Z,
            self::FLOAT32 => 4,
            self::FLOAT64,
            self::SINT64,
            self::UINT64,
            self::UINT64Z => 8,
        };
    }

    public static function invalidFrom(BaseTypeEnum $baseType): float|int
    {
        return match ($baseType) {
            self::ENUM,
            self::BYTE,
            self::UINT8 => 0xFF,
            self::SINT8 => 0x7F,
            self::SINT16 => 0x7FFF,
            self::UINT16 => 0xFFFF,
            self::SINT32 => 0x7FFFFFFF,
            self::UINT32,
            self::FLOAT32 => 0xFFFFFFFF,
            self::STRING,
            self::UINT8Z => 0x00,
            self::FLOAT64,
            self::UINT64 => 0xFFFFFFFFFFFFFFFF,
            self::UINT16Z => 0x0000,
            self::UINT32Z => 0x00000000,
            self::SINT64 => 0x7FFFFFFFFFFFFFFF,
            self::UINT64Z => 0x0000000000000000,
        };
    }

    public static function unpackFormatFrom(BaseTypeEnum $baseType, bool $littleEndian = true): string
    {
        return match ($baseType) {
            self::ENUM,
            self::SINT8,
            self::BYTE => 'c',
            self::UINT8Z,
            self::UINT8 => 'C',
            self::SINT16 => $littleEndian ? 's' : 'S',
            self::UINT16,
            self::UINT16Z => $littleEndian ? 'v' : 'n',
            self::SINT32 => $littleEndian ? 'l' : 'L',
            self::UINT32,
            self::UINT32Z => $littleEndian ? 'V' : 'N',
            self::STRING => 'a*',
            self::FLOAT32 => $littleEndian ? 'f' : 'G',
            self::FLOAT64 => $littleEndian ? 'd' : 'E',
            self::SINT64 => $littleEndian ? 'q' : 'J',
            self::UINT64,
            self::UINT64Z => $littleEndian ? 'P' : 'Q',
        };
    }

    public static function fromFieldType(?string $fieldType): ?self
    {
        return match ($fieldType) {
            'sint8' => self::SINT8,
            'uint8' => self::UINT8,
            'sint16' => self::SINT16,
            'uint16' => self::UINT16,
            'sint32' => self::SINT32,
            'uint32' => self::UINT32,
            'string' => self::STRING,
            'float32' => self::FLOAT32,
            'float64' => self::FLOAT64,
            'uint8z' => self::UINT8Z,
            'uint16z' => self::UINT16Z,
            'uint32z' => self::UINT32Z,
            'byte' => self::BYTE,
            'sint64' => self::SINT64,
            'uint64' => self::UINT64,
            'uint64z' => self::UINT64Z,
            default => null,
        };
    }

    public static function isNumeric(BaseTypeEnum $baseType): bool
    {
        return self::STRING !== $baseType;
    }
}
