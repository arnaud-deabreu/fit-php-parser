<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\CrcChecker;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\String\ByteString;

#[CoversClass(CrcChecker::class)]
final class CrcCheckerTest extends TestCase
{
    #[DataProvider('bufferProvider')]
    public function testAddBufferWithMultipleCases(ByteString $buffer, int $expectedChecksum): void
    {
        $crcChecker = new CrcChecker();

        $crcChecker->addBuffer($buffer);

        self::assertSame($expectedChecksum, $crcChecker->getChecksum(), 'Checksum should be correctly calculated.');
    }

    /**
     * @return iterable<string, array{ByteString, int}>
     */
    public static function bufferProvider(): iterable
    {
        yield 'Checksum of \x00\x00 should be 0x0000' => [new ByteString("\x00\x00"), 0x0000];

        yield 'Checksum of \x01\x02 should be 0x5180' => [new ByteString("\x01\x02"), 0x5180];

        yield 'Checksum of \xFF\xFF should be 0xB001' => [new ByteString("\xFF\xFF"), 0xB001];

        yield 'Checksum of \x12\x34\x56 should be 0x0000' => [new ByteString("\x12\x34\x56"), 0xFB36];

        yield 'Checksum of \xAB\xCD\xEF should be 0x0000' => [new ByteString("\xAB\xCD\xEF"), 0xFC64];
    }
}
