<?php

$rules = [
    '@PSR2' => true,
    'array_syntax' => ['syntax' => 'short'],
    'ordered_imports' => ['sortAlgorithm' => 'alpha'],
    'no_unused_imports' => true,
    'no_multiline_whitespace_before_semicolons' => true,
    'no_short_echo_tag' => true,
    'not_operator_with_successor_space' => true,
    'no_useless_else' => true,
    'phpdoc_add_missing_param_annotation' => true,
    'phpdoc_indent' => true,
    'phpdoc_no_package' => true,
    'phpdoc_order' => true,
    'phpdoc_separation' => true,
    'phpdoc_single_line_var_spacing' => true,
    'phpdoc_trim' => true,
    'phpdoc_var_without_name' => true,
    'phpdoc_to_comment' => true,
    'single_quote' => true,
    'ternary_operator_spaces' => true,
    'trailing_comma_in_multiline_array' => true,
    'trim_array_spaces' => true,
];

$excludes = [
    'bootstrap',
    'public',
    'resources',
    'storage',
    'vendor',
    'node_modules'
];

$finder = PhpCsFixer\Finder::create()
    ->exclude($excludes)
    ->in(__DIR__)
;
return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder)
;
