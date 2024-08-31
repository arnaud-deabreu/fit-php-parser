<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\Enums\BaseType;
use FitParser\Utils;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Utils::class)]
final class UtilsTest extends TestCase
{
    public function testSanitizeValuesWithOnlyNulls(): void
    {
        $values = [null, null];
        $result = Utils::sanitizeValues($values);
        self::assertNull($result);
    }

    public function testSanitizeValuesWithEmptyArray(): void
    {
        $values = [];
        $result = Utils::sanitizeValues($values);
        self::assertNull($result);
    }

    public function testSanitizeValuesWithNonNullValues(): void
    {
        $values = [null, 42, null];
        $result = Utils::sanitizeValues($values);
        self::assertSame(42, $result);
    }

    public function testOnlyNullValuesWithOnlyNulls(): void
    {
        $values = [null, null];
        $result = Utils::onlyNullValues($values);
        self::assertTrue($result);
    }

    public function testOnlyNullValuesWithNonNullValues(): void
    {
        $values = [null, 42, null];
        $result = Utils::onlyNullValues($values);
        self::assertFalse($result);
    }

    public function testOnlyInvalidValuesWithArray(): void
    {
        $baseType = BaseType::STRING;
        $invalidValue = BaseType::invalidFrom($baseType);

        $values = [$invalidValue, $invalidValue];
        $result = Utils::onlyInvalidValues($values, $baseType);
        self::assertTrue($result);
    }

    public function testOnlyInvalidValuesWithArrayHavingValidValue(): void
    {
        $baseType = BaseType::STRING;
        $invalidValue = BaseType::invalidFrom($baseType);

        $values = [$invalidValue, 42];
        $result = Utils::onlyInvalidValues($values, $baseType);
        self::assertFalse($result);
    }

    public function testOnlyInvalidValuesWithNonArray(): void
    {
        $baseType = BaseType::STRING;
        $invalidValue = BaseType::invalidFrom($baseType);

        $value = $invalidValue;
        $result = Utils::onlyInvalidValues($value, $baseType);
        self::assertTrue($result);
    }

    public function testConvertFITDateTime(): void
    {
        $datetime = (int) (new \DateTimeImmutable())->format('U');
        $result = Utils::convertFITDateTime($datetime);

        $expected = new \DateTimeImmutable('@'.(631072771 + $datetime));
        self::assertEquals($expected, $result);
    }

    public function testConvertFITDateTimeWithInvalidValue(): void
    {
        $this->expectException(\RuntimeException::class);
        $datetime = -99999999;
        Utils::convertFITDateTime($datetime);
    }
}
