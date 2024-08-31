<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseType;
use Symfony\Component\String\ByteString;

final class CrcChecker
{
    private const array CRC_TABLE = [
        0x0000, 0xCC01, 0xD801, 0x1400, 0xF001, 0x3C00, 0x2800, 0xE401,
        0xA001, 0x6C00, 0x7800, 0xB401, 0x5000, 0x9C01, 0x8801, 0x4400,
    ];

    private int $checksum = 0;

    public function addBuffer(ByteString $buffer): int
    {
        foreach ($buffer->chunk() as $chunk) {
            $this->computeChecksum(
                (int) BaseType::unpackFrom(BaseType::UINT8, $chunk)
            );
        }

        return $this->checksum;
    }

    public function getChecksum(): int
    {
        return $this->checksum;
    }

    private function computeChecksum(int $value): void
    {
        // compute checksum of lower four bits of byte
        $tmp = self::CRC_TABLE[$this->checksum & 0xF];
        $this->checksum = ($this->checksum >> 4) & 0x0FFF;
        $this->checksum = $this->checksum ^ $tmp ^ self::CRC_TABLE[$value & 0xF];

        // compute checksum of upper four bits of byte
        $tmp = self::CRC_TABLE[$this->checksum & 0xF];
        $this->checksum = ($this->checksum >> 4) & 0x0FFF;
        $this->checksum = $this->checksum ^ $tmp ^ self::CRC_TABLE[($value >> 4) & 0xF];
    }
}
