<?php

declare(strict_types=1);

namespace FitParser;

use FitParser\Enums\BaseType;
use Symfony\Component\String\ByteString;

final class Stream
{
    private int $position;

    public function __construct(
        private readonly ByteString $string
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

        if (false === $uint8 || false === \array_key_exists('uint8', $uint8)) {
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
        $uint8 = $this->readValue(BaseType::UINT8, 1);

        if (false === \is_int($uint8)) {
            throw new \RuntimeException('Invalid uint8 format');
        }

        return $uint8;
    }

    public function readUInt16(bool $littleEndian = true): int
    {
        $uint16 = $this->readValue(BaseType::UINT16, 2, $littleEndian);

        if (false === \is_int($uint16)) {
            throw new \RuntimeException('Invalid uint16 format');
        }

        return $uint16;
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
            $string = str_replace("\u{FFFD}", '', $string);
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

            $values[] = $value['value'];
        }

        return Utils::sanitizeValues($values);
    }

    private function readBytes(int $size): ByteString
    {
        if ($this->position + $size >= $this->string->length()) {
            throw new \RuntimeException(\sprintf('End of stream at byte %d', $this->position));
        }

        $bytes = $this->string->slice($this->position, $this->position + $size);
        $this->position += $size;

        return $bytes;
    }
}
