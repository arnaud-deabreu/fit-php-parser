<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Formats\HeaderBinaryFormat;
use Symfony\Component\String\ByteString;

final readonly class Header
{
    private const array VALID_HEADER_SIZE = [12, 14];
    private const int HEADER_SIZE_WITH_CRC = 14;

    private function __construct(
        public int $protocolVersion,
        public int $profileVersion,
        public int $dataSize,
        public int $dataType1,
        public int $dataType2,
        public int $dataType3,
        public int $dataType4,
        public int $crc,
        public int $headerSize,
    ) {}

    public static function fromByteString(ByteString $byteString): self
    {
        $headerSize = self::getHeaderSize($byteString);
        $headerFields = HeaderBinaryFormat::create(
            self::HEADER_SIZE_WITH_CRC === $headerSize
        );

        $header = unpack((string) $headerFields, $byteString->slice(1, $headerSize - 1)->toString());
        if (false === $header) {
            throw new \RuntimeException('Cannot unpack header string');
        }
        $header['headerSize'] = $headerSize;

        return new self(...$header);
    }

    private static function getHeaderSize(ByteString $string): int
    {
        $headerSize = unpack('C1header_size', $string->slice(0, 1)->toString());

        if (
            false === $headerSize
            || false === \array_key_exists('header_size', $headerSize)
            || false === \in_array($headerSize['header_size'], self::VALID_HEADER_SIZE, true)
        ) {
            throw new \RuntimeException('Invalid header size');
        }

        return $headerSize['header_size'];
    }
}
