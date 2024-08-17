<?php

declare(strict_types=1);

namespace FitParser\Formats;

/**
 * Byte    Parameter             Size (Bytes)    Description
 * 0       Header Size           1               Indicates the length of this file header including header size. Minimum size is 12. This may be increased in future to add additional optional information
 * 1       Protocol Version      1               Protocol version number as provided in SDK
 * 2       Profile Version LSB   2               Profile version number as provided in SDK
 * 3       Profile Version MSB
 * 4       Data Size LSB         4               Length of the Data Records section in bytesDoes not include Header or CRC
 * 5       Data Size
 * 6       Data Size
 * 7       Data Size MSB
 * 8       Data Type Byte[0]     4               ASCII values for “.FIT”. A FIT binary file opened with a text editor will contain a readable “.FIT” in the first line.
 * 9       Data Type Byte[1]
 * 10      Data Type Byte[2]
 * 11      Data Type Byte[3]
 * 12      CRC LSB               2               Contains the value of the CRC (see CRC ) of Bytes 0 through 11, or may be set to 0x0000. This field is optional.
 * 13      CRC MSB.
 */
final readonly class HeaderBinaryFormat implements \Stringable
{
    /**
     * @param BinaryPackFormat[] $fields
     */
    private function __construct(
        public array $fields,
    ) {}

    public function __toString(): string
    {
        return implode('/', $this->fields);
    }

    public static function create(bool $withCrc = false): self
    {
        $fields = [
            BinaryPackFormat::create('C', 'protocolVersion', 1),
            BinaryPackFormat::create('v', 'profileVersion', 1),
            BinaryPackFormat::create('V', 'dataSize', 1),
            BinaryPackFormat::create('C', 'dataType', 4),
        ];

        if ($withCrc) {
            $fields[] = BinaryPackFormat::create('v', 'crc', 1);
        }

        return new self(
            $fields,
        );
    }
}
