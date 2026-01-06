<?php

declare(strict_types=1);

namespace Slavcodev\PhpCsFixer;

use Override;
use PhpCsFixer\RuleSet\RuleSetDefinitionInterface;

final class AutoSet implements RuleSetDefinitionInterface
{
    #[Override]
    public function getDescription(): string
    {
        return <<<'TEXT'
            Custom rule set.
            TEXT;
    }

    #[Override]
    public function getName(): string
    {
        return '@slavcodev/auto:risky';
    }

    /**
     * @see https://cs.symfony.com/doc/rules/
     * @see https://cs.symfony.com/doc/ruleSets/
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/AutoSet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/AutoRiskySet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/PhpCsFixerRiskySet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/PhpCsFixerSet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/PhpCsFixerRiskySet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/SymfonySet.php
     * @see https://github.com/PHP-CS-Fixer/PHP-CS-Fixer/blob/v3.92.4/src/RuleSet/Sets/SymfonyRiskySet.php
     */
    #[Override]
    public function getRules(): array
    {
        return [
            '@auto' => true,
            '@auto:risky' => true,
            'yoda_style' => false,
            'blank_line_before_statement' => ['statements' => ['declare', 'include', 'include_once', 'require', 'require_once', 'return']],
            'global_namespace_import' => ['import_classes' => true, 'import_functions' => true, 'import_constants' => true],
            // Make function invocation consistent, require all to be with leading `\`.
            'native_function_invocation' => ['include' => ['@all'], 'scope' => 'namespaced', 'strict' => true],
            'not_operator_with_successor_space' => false,
            'increment_style' => ['style' => 'post'],
            'class_definition' => ['multi_line_extends_each_single_line' => true, 'single_item_single_line' => true],
            'mb_str_functions' => true,
            'trailing_comma_in_multiline' => ['after_heredoc' => true, 'elements' => ['arrays', 'arguments', 'parameters', 'match']],
            'simplified_null_return' => true,
            // TODO: May conflict with php 8.5
            'new_with_parentheses' => true,
            'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
            'phpdoc_align' => ['align' => 'left'],
            'nullable_type_declaration' => ['syntax' => 'union'],
            'nullable_type_declaration_for_default_null_value' => true,
            'ordered_types' => ['null_adjustment' => 'always_first'],
            // Make function invocation consistent, require all to be with leading `\`. Force PSR-12 standard.
            'ordered_imports' => ['sort_algorithm' => 'alpha', 'imports_order' => ['class', 'function', 'const']],
            'php_unit_test_case_static_method_calls' => ['call_type' => 'self'],
            'php_unit_data_provider_method_order' => ['placement' => 'before'],
            'php_unit_internal_class' => false,
            'php_unit_test_annotation' => ['style' => 'annotation'],
            'php_unit_data_provider_name' => false,
            // TODO: Check if understand attributes and enable if yes.
            'php_unit_test_class_requires_covers' => false,
            'php_unit_method_casing' => ['case' => 'camel_case'],
        ];
    }

    #[Override]
    public function isRisky(): bool
    {
        return true;
    }
}
