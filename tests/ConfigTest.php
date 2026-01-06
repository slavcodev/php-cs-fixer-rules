<?php

declare(strict_types=1);

namespace Slavcodev\PhpCsFixer\Tests;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use Slavcodev\PhpCsFixer\Config;

use function array_keys;
use function dirname;
use function iterator_to_array;
use function json_encode;

#[CoversClass(Config::class)]
final class ConfigTest extends TestCase
{
    #[Test]
    public function buildsDefaultsInConstructorWithMinParams(): void
    {
        $dir = dirname(__DIR__);
        $config = new Config($dir);
        self::assertSame([], $config->getRules());

        $files = array_keys(iterator_to_array($config->getFinder()));
        self::assertNotEmpty($files);
        self::assertContains($dir . '/src/AutoSet.php', $files, json_encode($files, JSON_PRETTY_PRINT));
        self::assertContains($dir . '/src/Config.php', $files, json_encode($files, JSON_PRETTY_PRINT));
        self::assertContains($dir . '/.php-cs-fixer.php', $files, json_encode($files, JSON_PRETTY_PRINT));
    }
}
