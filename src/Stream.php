<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseType;
use Symfony\Component\String\ByteString;

final class Stream
{
    private int $position = 0;

    public function __construct(
        private readonly ByteString $string,
        private readonly CrcChecker $crcChecker,
    ) {}

    public function position(): int
    {
        return $this->position;
    }

    public function seek(int $position): void
    {
        $this->position = $position;
    }

    public function reset(): void
    {
        $this->position = 0;
    }

    public function peekByte(): int
    {
        $bytes = $this->string->slice($this->position, $this->position + 1)->toString();

        $uint8 = unpack(BaseType::unpackFormatFrom(BaseType::UINT8).'uint8', $bytes);

        if (
            false === $uint8
            || false === \array_key_exists('uint8', $uint8)
            || false === \is_int($uint8['uint8'])) {
            throw new \RuntimeException('Invalid uint8 format');
        }

        return $uint8['uint8'];
    }

    public function readByte(): int
    {
        return $this->readUInt8();
    }

    public function readUInt8(): int
    {
        return $this->readInt(BaseType::UINT8);
    }

    public function readUInt16(bool $littleEndian = true): int
    {
        return $this->readInt(BaseType::UINT16, $littleEndian);
    }

    public function readUInt32(bool $littleEndian = true): int
    {
        return $this->readInt(BaseType::UINT32, $littleEndian);
    }

    public function readValue(BaseType $baseType, int $size, bool $littleEndian = true): null|float|int|string
    {
        $bytes = $this->readBytes($size);

        $baseTypeSize = BaseType::sizeFrom($baseType);
        $baseTypeInvalid = BaseType::invalidFrom($baseType);

        if (0 !== $size % $baseTypeSize) {
            return $baseTypeInvalid;
        }

        if (BaseType::STRING === $baseType) {
            $string = $bytes->toString();
            $strings = explode("\0", $string);

            while ('' === end($strings)) {
                array_pop($strings);
            }

            if (0 === \count($strings)) {
                return null;
            }

            return reset($strings);
        }

        $values = [];

        for ($i = 0; $i < $size / $baseTypeSize; ++$i) {
            $value = unpack(
                BaseType::unpackFormatFrom($baseType, $littleEndian).'value',
                $bytes->slice($i * $baseTypeSize, $baseTypeSize)->toString()
            );

            if (false === $value || false === \array_key_exists('value', $value)) {
                continue;
            }

            if (
                false === \is_int($value['value'])
                && false === \is_float($value['value'])
            ) {
                throw new \RuntimeException('Invalid value');
            }

            $values[] = $value['value'];
        }

        return Utils::sanitizeValues($values);
    }

    public function readBytes(int $size): ByteString
    {
        if ($this->position + $size > $this->string->length()) {
            throw new \RuntimeException(\sprintf('End of stream at byte %d', $this->position));
        }

        $bytes = $this->string->slice($this->position, $size);
        $this->position += $size;

        $this->crcChecker->addBuffer($bytes);

        return $bytes;
    }

    public function readString(int $size): string
    {
        $value = $this->readValue(BaseType::STRING, $size);

        if (false === \is_string($value)) {
            throw new \RuntimeException('Invalid string format');
        }

        return $value;
    }

    private function readInt(BaseType $baseType, bool $littleEndian = true): int
    {
        if (false === BaseType::isInt($baseType)) {
            throw new \RuntimeException('Invalid int format');
        }

        $int = $this->readValue(
            $baseType,
            BaseType::sizeFrom($baseType),
            $littleEndian,
        );

        if (false === \is_int($int)) {
            throw new \RuntimeException('Invalid int format');
        }

        return $int;
    }
}
