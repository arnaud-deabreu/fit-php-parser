<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\Parser;
use FitParser\Records\Generated\FileId;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Parser::class)]
final class ParserTest extends TestCase
{
    public function testParseValidFile(): void
    {
        $fitContent = "\x0E\x20\x8B\x08\x24\x00\x00\x00\x2E\x46\x49\x54\x8E\xA3\x40\x00\x00\x00\x00\x04\x00\x01\x00\x01\x02\x84\x04\x04\x86\x08\x0A\x07\x00\x04\x01\x00\x00\xCA\x9A\x3B\x61\x62\x63\x64\x65\x66\x67\x68\x69\x00\x5D\xF2";

        $parser = new Parser($fitContent);
        $parser->parse();

        Assert::assertNotEmpty($parser->getRecords());

        $fileIdRecord = $parser->getRecords()[0];

        Assert::assertInstanceOf(FileId::class, $fileIdRecord);

        $recordValues = $fileIdRecord->getValues();

        Assert::assertInstanceOf(FileId\Type::class, $recordValues[0]);
        Assert::assertEquals(4, $recordValues[0]->value());

        Assert::assertInstanceOf(FileId\Manufacturer::class, $recordValues[1]);
        Assert::assertEquals(1, $recordValues[1]->value());

        Assert::assertInstanceOf(FileId\TimeCreated::class, $recordValues[2]);
        Assert::assertEquals(new \DateTimeImmutable('2021-09-08 03:46:11.0 +00:00'), $recordValues[2]->value());

        Assert::assertInstanceOf(FileId\ProductName::class, $recordValues[3]);
        Assert::assertEquals('abcdefghi', $recordValues[3]->value());
    }
}
