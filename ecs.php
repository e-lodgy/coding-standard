<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\NoAliasFunctionsFixer;
use PhpCsFixer\Fixer\Basic\NonPrintableCharacterFixer;
use PhpCsFixer\Fixer\Basic\NoTrailingCommaInSinglelineFixer;
use PhpCsFixer\Fixer\Casing\LowercaseStaticReferenceFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\MagicMethodCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfStaticAccessorFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer;
use PhpCsFixer\Fixer\ControlStructure\NoAlternativeSyntaxFixer;
use PhpCsFixer\Fixer\ControlStructure\NoSuperfluousElseifFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededCurlyBracesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUselessElseFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationArrayAssignmentFixer;
use PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationBracesFixer;
use PhpCsFixer\Fixer\DoctrineAnnotation\DoctrineAnnotationIndentationFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\LambdaNotUsedImportFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\NullableTypeDeclarationForDefaultNullValueFixer;
use PhpCsFixer\Fixer\FunctionNotation\StaticLambdaFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\FullyQualifiedStrictTypesFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveIssetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\CombineConsecutiveUnsetsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareParenthesesFixer;
use PhpCsFixer\Fixer\LanguageConstruct\SingleSpaceAfterConstructFixer;
use PhpCsFixer\Fixer\ListNotation\ListSyntaxFixer;
use PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\IncrementStyleFixer;
use PhpCsFixer\Fixer\Operator\LogicalOperatorsFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer;
use PhpCsFixer\Fixer\Operator\TernaryToNullCoalescingFixer;
use PhpCsFixer\Fixer\Phpdoc\AlignMultilineCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAnnotationWithoutDotFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoUselessInheritdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTagCasingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimConsecutiveBlankLineSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarAnnotationCorrectOrderFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocVarWithoutNameFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitConstructFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitDedicateAssertInternalTypeFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitExpectationFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitMethodCasingFixer;
use PhpCsFixer\Fixer\ReturnNotation\NoUselessReturnFixer;
use PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\Strict\DeclareStrictTypesFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\TypesSpacesFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $config): void {
    // PSR-12
    $config->sets([SetList::PSR_12]);

    // Fixers
    $config->rules([
        CastSpacesFixer::class,
        CombineConsecutiveIssetsFixer::class,
        CombineConsecutiveUnsetsFixer::class,
        DeclareParenthesesFixer::class,
        DeclareStrictTypesFixer::class,
        DoctrineAnnotationArrayAssignmentFixer::class,
        DoctrineAnnotationBracesFixer::class,
        DoctrineAnnotationIndentationFixer::class,
        FullyQualifiedStrictTypesFixer::class,
        FunctionTypehintSpaceFixer::class,
        LambdaNotUsedImportFixer::class,
        ListSyntaxFixer::class,
        LogicalOperatorsFixer::class,
        LowercaseStaticReferenceFixer::class,
        MagicConstantCasingFixer::class,
        MagicMethodCasingFixer::class,
        NativeConstantInvocationFixer::class,
        NativeFunctionCasingFixer::class,
        NoAliasFunctionsFixer::class,
        NoAlternativeSyntaxFixer::class,
        NoEmptyCommentFixer::class,
        NoEmptyPhpdocFixer::class,
        NoEmptyStatementFixer::class,
        NoLeadingImportSlashFixer::class,
        NoLeadingNamespaceWhitespaceFixer::class,
        NonPrintableCharacterFixer::class,
        NoSinglelineWhitespaceBeforeSemicolonsFixer::class,
        NoSpacesAroundOffsetFixer::class,
        NoSuperfluousElseifFixer::class,
        NotOperatorWithSuccessorSpaceFixer::class,
        NoTrailingCommaInSinglelineFixer::class,
        NoUnneededCurlyBracesFixer::class,
        NoUnusedImportsFixer::class,
        NoUselessElseFixer::class,
        NoUselessReturnFixer::class,
        NullableTypeDeclarationForDefaultNullValueFixer::class,
        ObjectOperatorWithoutWhitespaceFixer::class,
        PhpdocAnnotationWithoutDotFixer::class,
        PhpdocIndentFixer::class,
        PhpdocNoUselessInheritdocFixer::class,
        PhpdocOrderFixer::class,
        PhpdocScalarFixer::class,
        PhpdocSeparationFixer::class,
        PhpdocSingleLineVarSpacingFixer::class,
        PhpdocTagCasingFixer::class,
        PhpdocTrimConsecutiveBlankLineSeparationFixer::class,
        PhpdocTrimFixer::class,
        PhpdocTypesFixer::class,
        PhpdocVarAnnotationCorrectOrderFixer::class,
        PhpdocVarWithoutNameFixer::class,
        PhpUnitConstructFixer::class,
        PhpUnitDedicateAssertFixer::class,
        PhpUnitDedicateAssertInternalTypeFixer::class,
        PhpUnitExpectationFixer::class,
        PhpUnitMethodCasingFixer::class,
        SelfStaticAccessorFixer::class,
        SemicolonAfterInstructionFixer::class,
        SingleQuoteFixer::class,
        SingleSpaceAfterConstructFixer::class,
        SpaceAfterSemicolonFixer::class,
        StandardizeIncrementFixer::class,
        StandardizeNotEqualsFixer::class,
        StaticLambdaFixer::class,
        TernaryToNullCoalescingFixer::class,
        TypesSpacesFixer::class,
        VoidReturnFixer::class,
    ]);

    $config->rulesWithConfiguration([
        AlignMultilineCommentFixer::class => ['comment_type' => 'phpdocs_like'],
        BinaryOperatorSpacesFixer::class => ['operators' => ['|' => 'no_space']],
        BlankLineBeforeStatementFixer::class => ['statements' => ['return']],
        IncrementStyleFixer::class => ['style' => 'post'],
        MethodArgumentSpaceFixer::class => ['on_multiline' => 'ignore'],
        NoSuperfluousPhpdocTagsFixer::class => ['allow_mixed' => true],
        PhpdocAlignFixer::class => ['align' => 'left'],
        TrailingCommaInMultilineFixer::class => ['elements' => ['arguments', 'arrays', 'match', 'parameters']],
    ]);

    $config->ruleWithConfiguration(OrderedClassElementsFixer::class, ['order' => [
        'use_trait',
        'constant_public',
        'constant_protected',
        'constant_private',
        'case',
        'property_public',
        'property_protected',
        'property_private',
        'construct',
        'destruct',
        'magic',
        'phpunit',
        'method_abstract',
        'method_public',
        'method_protected',
        'method_private',
    ]]);

    $config->ruleWithConfiguration(NoExtraBlankLinesFixer::class, ['tokens' => [
        'case',
        'continue',
        'curly_brace_block',
        'default',
        'extra',
        'parenthesis_brace_block',
        'square_brace_block',
        'switch',
        'throw',
        'use',
    ]]);

    if (\PHP_VERSION_ID < 80000) {
        // The check fails on PHP <8.0. See https://github.com/symplify/symplify/issues/3130
        $config->skip([PhpUnitExpectationFixer::class]);

        // Override, parameters are only available in PHP 8+
        $config->ruleWithConfiguration(TrailingCommaInMultilineFixer::class, ['elements' => ['arguments', 'arrays']]);
    }
};
