<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\Parser;
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
    }
}
