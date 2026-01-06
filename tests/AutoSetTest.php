<?php

declare(strict_types=1);

namespace Slavcodev\PhpCsFixer\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Slavcodev\PhpCsFixer\AutoSet;

use function array_keys;

#[CoversClass(AutoSet::class)]
final class AutoSetTest extends TestCase
{
    #[Test]
    public function providesRulesSetDetails(): void
    {
        $set = new AutoSet();
        self::assertSame('@slavcodev/auto:risky', $set->getName());
        self::assertTrue($set->isRisky());

        $rules = array_keys($set->getRules());
        self::assertNotEmpty($rules);
        self::assertContains('@auto', $rules);
        self::assertContains('@auto:risky', $rules);
    }
}
