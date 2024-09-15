<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\CrcChecker;
use FitParser\Stream;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;
use Symfony\Component\String\ByteString;

#[CoversClass(Stream::class)]
final class StreamTest extends TestCase
{
    public function testReadByte(): void
    {
        $stream = new Stream(new ByteString("\x01\x02\x03"), new CrcChecker());

        self::assertSame(0x01, $stream->readByte());
        self::assertSame(0x02, $stream->readByte());
        self::assertSame(0x03, $stream->readByte());
    }

    public function testReadUInt8(): void
    {
        $stream = new Stream(new ByteString("\x01\x02\x03"), new CrcChecker());

        self::assertSame(0x01, $stream->readUInt8());
        self::assertSame(0x02, $stream->readUInt8());
        self::assertSame(0x03, $stream->readUInt8());
    }

    public function testReadUInt16(): void
    {
        $stream = new Stream(new ByteString("\x01\x02\x03\x04"), new CrcChecker());

        self::assertSame(0x0201, $stream->readUInt16());
        self::assertSame(0x0403, $stream->readUInt16());
    }

    public function testReadUInt32(): void
    {
        $stream = new Stream(new ByteString("\x01\x02\x03\x04\x05\x06\x07\x08"), new CrcChecker());

        self::assertSame(0x04030201, $stream->readUInt32());
        self::assertSame(0x08070605, $stream->readUInt32());
    }

    public function testReadString(): void
    {
        $stream = new Stream(new ByteString("\x61\x62\x63\x64\x65\x66\x67\x68\x69"), new CrcChecker());

        self::assertSame('abcdefghi', $stream->readString(9));
    }
}
