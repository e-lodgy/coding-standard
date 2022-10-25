<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\NoAliasFunctionsFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoTrailingCommaInSinglelineArrayFixer;
use PhpCsFixer\Fixer\Basic\NonPrintableCharacterFixer;
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
use PhpCsFixer\Fixer\NamespaceNotation\CleanNamespaceFixer;
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
    $config->rule(NoAliasFunctionsFixer::class);
    $config->rule(NoTrailingCommaInSinglelineArrayFixer::class);
    $config->rule(NonPrintableCharacterFixer::class);
    $config->rule(LowercaseStaticReferenceFixer::class);
    $config->rule(MagicConstantCasingFixer::class);
    $config->rule(MagicMethodCasingFixer::class);
    $config->rule(NativeFunctionCasingFixer::class);
    $config->rule(CastSpacesFixer::class);
    $config->ruleWithConfiguration(OrderedClassElementsFixer::class, [
        'order' => [
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
        ],
    ]);
    $config->rule(SelfStaticAccessorFixer::class);
    $config->rule(NoEmptyCommentFixer::class);
    $config->rule(NativeConstantInvocationFixer::class);
    $config->rule(NoAlternativeSyntaxFixer::class);
    $config->rule(NoSuperfluousElseifFixer::class);
    $config->rule(NoUnneededCurlyBracesFixer::class);
    $config->rule(NoUselessElseFixer::class);
    $config->rule(TrailingCommaInMultilineFixer::class);
    $config->rule(DoctrineAnnotationArrayAssignmentFixer::class);
    $config->rule(DoctrineAnnotationBracesFixer::class);
    $config->rule(DoctrineAnnotationIndentationFixer::class);
    $config->rule(FunctionTypehintSpaceFixer::class);
    $config->rule(LambdaNotUsedImportFixer::class);
    $config->rule(NullableTypeDeclarationForDefaultNullValueFixer::class);
    $config->rule(StaticLambdaFixer::class);
    $config->rule(VoidReturnFixer::class);
    $config->rule(FullyQualifiedStrictTypesFixer::class);
    $config->rule(NoLeadingImportSlashFixer::class);
    $config->rule(NoUnusedImportsFixer::class);
    $config->rule(CombineConsecutiveIssetsFixer::class);
    $config->rule(CombineConsecutiveUnsetsFixer::class);
    $config->rule(DeclareParenthesesFixer::class);
    $config->rule(SingleSpaceAfterConstructFixer::class);
    $config->rule(ListSyntaxFixer::class);
    $config->rule(CleanNamespaceFixer::class);
    $config->rule(NoLeadingNamespaceWhitespaceFixer::class);
    $config->ruleWithConfiguration(BinaryOperatorSpacesFixer::class, ['operators' => ['|' => 'no_space']]);
    $config->ruleWithConfiguration(IncrementStyleFixer::class, ['style' => 'post']);
    $config->rule(LogicalOperatorsFixer::class);
    $config->rule(NotOperatorWithSuccessorSpaceFixer::class);
    $config->rule(ObjectOperatorWithoutWhitespaceFixer::class);
    $config->rule(StandardizeIncrementFixer::class);
    $config->rule(StandardizeNotEqualsFixer::class);
    $config->rule(TernaryToNullCoalescingFixer::class);
    $config->rule(PhpUnitConstructFixer::class);
    $config->rule(PhpUnitDedicateAssertFixer::class);
    $config->rule(PhpUnitDedicateAssertInternalTypeFixer::class);
    $config->rule(PhpUnitMethodCasingFixer::class);
    $config->ruleWithConfiguration(AlignMultilineCommentFixer::class, ['comment_type' => 'all_multiline']);
    $config->rule(NoEmptyPhpdocFixer::class);
    $config->ruleWithConfiguration(NoSuperfluousPhpdocTagsFixer::class, ['allow_mixed' => true]);
    $config->ruleWithConfiguration(PhpdocAlignFixer::class, ['align' => 'left']);
    $config->rule(PhpdocAnnotationWithoutDotFixer::class);
    $config->rule(PhpdocIndentFixer::class);
    $config->rule(PhpdocNoUselessInheritdocFixer::class);
    $config->rule(PhpdocOrderFixer::class);
    $config->rule(PhpdocScalarFixer::class);
    $config->rule(PhpdocSeparationFixer::class);
    $config->rule(PhpdocSingleLineVarSpacingFixer::class);
    $config->rule(PhpdocTagCasingFixer::class);
    $config->rule(PhpdocTrimConsecutiveBlankLineSeparationFixer::class);
    $config->rule(PhpdocTrimFixer::class);
    $config->rule(PhpdocTypesFixer::class);
    $config->rule(PhpdocVarAnnotationCorrectOrderFixer::class);
    $config->rule(PhpdocVarWithoutNameFixer::class);
    $config->rule(NoUselessReturnFixer::class);
    $config->rule(NoEmptyStatementFixer::class);
    $config->rule(NoSinglelineWhitespaceBeforeSemicolonsFixer::class);
    $config->rule(SemicolonAfterInstructionFixer::class);
    $config->rule(SpaceAfterSemicolonFixer::class);
    $config->rule(DeclareStrictTypesFixer::class);
    $config->rule(SingleQuoteFixer::class);
    $config->ruleWithConfiguration(BlankLineBeforeStatementFixer::class, ['statements' => ['return']]);
    $config->ruleWithConfiguration(NoExtraBlankLinesFixer::class, [
        'tokens' => [
            'case',
            'continue',
            'curly_brace_block',
            'default', 'extra',
            'parenthesis_brace_block',
            'square_brace_block',
            'switch',
            'throw',
            'use',
        ],
    ]);
    $config->rule(NoSpacesAroundOffsetFixer::class);
    $config->rule(TypesSpacesFixer::class);

    if (\PHP_VERSION_ID >= 80000) { // The check fails on PHP <8.0. See https://github.com/symplify/symplify/issues/3130
        $config->rule(PhpUnitExpectationFixer::class);
    }
};
