<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\CrcChecker;
use FitParser\Header;
use FitParser\Stream;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\String\ByteString;

#[CoversClass(Header::class)]
final class HeaderTest extends TestCase
{
    public function testInvalidHeaderSizeWillThrowException(): void
    {
        $header = new ByteString('\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00\x00');
        $crcChecker = new CrcChecker();
        $stream = new Stream($header, $crcChecker);

        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Invalid header size');

        Header::fromStream($stream);
    }

    public function testHeader(): void
    {
        $crcChecker = new CrcChecker();
        $stream = new Stream(
            new ByteString("\x0e\x20\x57\x08\xe1\xfe\x00\x00\x2e\x46\x49\x54\x99\x95"),
            $crcChecker
        );

        $header = Header::fromStream($stream);

        self::assertSame(14, $header->headerSize, 'Wrong header size');
        self::assertSame(32, $header->protocolVersion, 'Wrong protocol version');
        self::assertSame(2135, $header->profileVersion, 'Wrong profile version');
        self::assertSame(65249, $header->dataSize, 'Wrong data size');
        self::assertSame('.FIT', $header->dataType, 'Wrong data type');
        self::assertSame(38297, $header->crc, 'Wrong crc');
    }

    public function testInvalidFitFileDataWillThrowException(): void
    {
        $crcChecker = new CrcChecker();
        $stream = new Stream(
            new ByteString("\x0e\x20\x57\x08\xe1\xfe\x00\x00\x2e\x45\x58\x54\x99\x95"),
            $crcChecker
        );

        self::expectException(\RuntimeException::class);
        self::expectExceptionMessage('Unable to validate that header is a FIT file');

        Header::fromStream($stream);
    }
}
