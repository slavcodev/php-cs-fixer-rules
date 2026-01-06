<?php

declare(strict_types=1);

use Slavcodev\PhpCsFixer\Config;

// https://cs.symfony.com/doc/rules/
// https://cs.symfony.com/doc/ruleSets/
return new Config(__DIR__, [
    '@slavcodev/auto:risky' => true,
], [
    'cache_file' => 'var/php-cs-fixer/cache.json',
]);
