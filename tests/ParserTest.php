<?php

declare(strict_types=1);

namespace FitParser\Tests;

use FitParser\Parser;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
final class ParserTest extends TestCase
{
    public function testParseValidFile(): void
    {
        $filePath = __DIR__.'/examples/WorkoutIndividualSteps.fit';

        $parser = new Parser($filePath);
        $parser->parse();

        Assert::assertNotEmpty($parser->getMessages());
    }
}
