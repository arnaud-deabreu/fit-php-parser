<?php

declare(strict_types=1);

namespace FitParser;

final readonly class Header
{
    private const array VALID_HEADER_SIZE = [12, 14];
    private const int HEADER_SIZE_WITH_CRC = 14;

    private function __construct(
        public int $protocolVersion,
        public int $profileVersion,
        public int $dataSize,
        public string $dataType,
        public int $crc,
        public int $headerSize,
    ) {}

    public static function fromStream(Stream $stream): self
    {
        $headerSize = $stream->readByte();

        if (false === \in_array($headerSize, self::VALID_HEADER_SIZE, true)) {
            throw new \RuntimeException('Invalid header size');
        }

        $header = new self(
            protocolVersion: $stream->readByte(),
            profileVersion: $stream->readUInt16(),
            dataSize: $stream->readUInt32(),
            dataType: $stream->readString(4),
            crc: self::HEADER_SIZE_WITH_CRC === $headerSize ? $stream->readUInt16() : 0,
            headerSize: $headerSize,
        );

        if ('.FIT' !== $header->dataType) {
            throw new \RuntimeException('Unable to validate that header is a FIT file');
        }

        return $header;
    }
}
