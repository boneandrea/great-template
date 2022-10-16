<?php
/*
 * This document has been generated with
 * https://mlocati.github.io/php-cs-fixer-configurator/#version:2.2.20|configurator
 * you can change this configuration by importing this file.
 */
return PhpCsFixer\Config::create()
	->setIndent("\t")
	->setRules([
		'@PSR1' => true,
		'@PSR2' => true,
		'@Symfony' => true,
		'array_syntax' => ['syntax' => 'short'],
		'combine_consecutive_unsets' => true,
		'echo_tag_syntax' => [
			'format' => 'short',
		],
		'heredoc_to_nowdoc' => true,
		'no_useless_else' => true,
		'no_useless_return' => true,
		'no_alternative_syntax' => false,
		'ordered_class_elements' => true,
		'ordered_imports' => true,
		'phpdoc_add_missing_param_annotation' => true,
		'phpdoc_order' => true,
		'semicolon_after_instruction' => false,
		'yoda_style' => ['equal' => false, 'identical' => false],
	])
	->setFinder(PhpCsFixer\Finder::create()
		->exclude('vendor')
		->exclude('vendor_custom')
		->in(__DIR__)
	)
;
