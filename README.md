# php-cs-fixer-rules

[ico-tests-status]: https://github.com/slavcodev/php-cs-fixer-rules/workflows/phpunit/badge.svg
[link-github]: https://github.com/slavcodev/php-cs-fixer-rules

[ico-license]: https://img.shields.io/github/license/slavcodev/php-cs-fixer-rules
[link-license]: LICENSE

[ico-version]: https://img.shields.io/packagist/v/slavcodev/php-cs-fixer-rules.svg?label=Latest
[link-packagist]: https://packagist.org/packages/slavcodev/php-cs-fixer-rules

[![Tests status][ico-tests-status]][link-github]
[![Software License][ico-license]][link-license]
[![Latest Version on Packagist][ico-version]][link-packagist]

A set of rules that reflect personal preferences regarding programming standards.

## Install

Using [Composer](https://getcomposer.org)

```bash
composer require --dev slavcodev/php-cs-fixer-rules
```

## Usage

Add in our config file `.php-cs-fixer.php`:

~~~php
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
~~~

## Testing

```bash
phpunit
```
