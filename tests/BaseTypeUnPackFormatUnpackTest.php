<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\Enums\BaseType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\CoversMethod;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(BaseType::class)]
#[CoversMethod(BaseType::class, 'unpackFormatFrom')]
final class BaseTypeUnPackFormatUnpackTest extends TestCase
{
    #[DataProvider('unpackFromBaseTypeProvider')]
    public function testUnpackFromBaseType(
        BaseType $baseType,
        string $binaryValue,
        bool $littleEndian,
        mixed $expectedValue
    ): void {
        $value = unpack(BaseType::unpackFormatFrom($baseType, $littleEndian).'tmp', $binaryValue);

        self::assertNotFalse($value, 'Unable to unpack value');

        self::assertArrayHasKey('tmp', $value);

        self::assertSame($expectedValue, $value['tmp']);
    }

    /**
     * @return iterable<string, array{BaseType, mixed}>
     */
    public static function unpackFromBaseTypeProvider(): iterable
    {
        yield 'SINT32 types are unpacked to 32 bit unsigned long (big endian)' => [BaseType::SINT32, "\x01\x23\x45\x67", false, 19088743];

        yield 'SINT32 types are unpacked to 32 bit unsigned long (little endian)' => [BaseType::SINT32, "\x01\x23\x45\x67", true, 1732584193];
    }
}
