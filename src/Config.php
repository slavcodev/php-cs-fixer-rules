<?php

declare(strict_types=1);

namespace Slavcodev\PhpCsFixer;

use Override;
use PhpCsFixer;
use PhpCsFixer\ConfigInterface;
use PhpCsFixer\Finder;

final class Config extends PhpCsFixer\Config
{
    private null|iterable $finder = null;

    /**
     * @param non-empty-string $root
     * @param array<string, array<string, mixed>|bool> $rules
     * @param array{
     *     cache_file?: non-empty-string,
     *     name?: non-empty-string,
     * } $params
     */
    public function __construct(
        string $root,
        array $rules = [],
        array $params = [],
    ) {
        parent::__construct($params['name'] ?? 'default');
        $this->registerCustomRuleSets([new AutoSet()]);
        $this->setDefaultFinder($root);
        $this->setRiskyAllowed(true);
        $this->setRules($rules);
        $this->setCacheFile($params['cache_file'] ?? '.php-cs-fixer.cache');
    }

    #[Override]
    public function getFinder(): iterable
    {
        if ($this->finder === null) {
            $this->setFinder(new Finder());
        }

        return parent::getFinder();
    }

    #[Override]
    public function setFinder(iterable $finder): ConfigInterface
    {
        return parent::setFinder($this->finder = $finder);
    }

    public function setDefaultFinder(string $rootDir): ConfigInterface
    {
        return $this->setFinder(
            (new Finder())
                ->ignoreUnreadableDirs()
                ->append(
                    (new Finder())
                        ->in($rootDir)
                        ->ignoreUnreadableDirs(),
                )
                ->append(
                    (new Finder())
                        ->in($rootDir)
                        ->ignoreUnreadableDirs()
                        ->depth('<= 1')
                        ->name('.php-cs-fixer.php')
                        ->ignoreDotFiles(false),
                ),
        );
    }
}
