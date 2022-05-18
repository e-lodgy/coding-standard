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

return static function (ECSConfig $containerConfigurator): void {
    // PSR-12
    $containerConfigurator->import(SetList::PSR_12);

    // Fixers
    $services = $containerConfigurator->services();
    $services->set(NoAliasFunctionsFixer::class);
    $services->set(NoTrailingCommaInSinglelineArrayFixer::class);
    $services->set(NonPrintableCharacterFixer::class);
    $services->set(LowercaseStaticReferenceFixer::class);
    $services->set(MagicConstantCasingFixer::class);
    $services->set(MagicMethodCasingFixer::class);
    $services->set(NativeFunctionCasingFixer::class);
    $services->set(CastSpacesFixer::class);
    $services->set(OrderedClassElementsFixer::class)
        ->call('configure', [['order' => [
            'use_trait',
            'constant_public',
            'constant_protected',
            'constant_private',
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
    ]]);
    $services->set(SelfStaticAccessorFixer::class);
    $services->set(NoEmptyCommentFixer::class);
    $services->set(NativeConstantInvocationFixer::class);
    $services->set(NoAlternativeSyntaxFixer::class);
    $services->set(NoSuperfluousElseifFixer::class);
    $services->set(NoUnneededCurlyBracesFixer::class);
    $services->set(NoUselessElseFixer::class);
    $services->set(TrailingCommaInMultilineFixer::class);
    $services->set(DoctrineAnnotationArrayAssignmentFixer::class);
    $services->set(DoctrineAnnotationBracesFixer::class);
    $services->set(DoctrineAnnotationIndentationFixer::class);
    $services->set(FunctionTypehintSpaceFixer::class);
    $services->set(LambdaNotUsedImportFixer::class);
    $services->set(NullableTypeDeclarationForDefaultNullValueFixer::class);
    $services->set(StaticLambdaFixer::class);
    $services->set(VoidReturnFixer::class);
    $services->set(FullyQualifiedStrictTypesFixer::class);
    $services->set(NoLeadingImportSlashFixer::class);
    $services->set(NoUnusedImportsFixer::class);
    $services->set(CombineConsecutiveIssetsFixer::class);
    $services->set(CombineConsecutiveUnsetsFixer::class);
    $services->set(DeclareParenthesesFixer::class);
    $services->set(SingleSpaceAfterConstructFixer::class);
    $services->set(ListSyntaxFixer::class);
    $services->set(CleanNamespaceFixer::class);
    $services->set(NoLeadingNamespaceWhitespaceFixer::class);
    $services->set(BinaryOperatorSpacesFixer::class)
        ->call('configure', [['operators' => ['|' => 'no_space']]]);
    $services->set(IncrementStyleFixer::class)
        ->call('configure', [['style' => 'post']]);
    $services->set(LogicalOperatorsFixer::class);
    $services->set(NotOperatorWithSuccessorSpaceFixer::class);
    $services->set(ObjectOperatorWithoutWhitespaceFixer::class);
    $services->set(StandardizeIncrementFixer::class);
    $services->set(StandardizeNotEqualsFixer::class);
    $services->set(TernaryToNullCoalescingFixer::class);
    $services->set(PhpUnitConstructFixer::class);
    $services->set(PhpUnitDedicateAssertFixer::class);
    $services->set(PhpUnitDedicateAssertInternalTypeFixer::class);
    $services->set(PhpUnitExpectationFixer::class);
    $services->set(PhpUnitMethodCasingFixer::class);
    $services->set(AlignMultilineCommentFixer::class)
        ->call('configure', [['comment_type' => 'all_multiline']]);
    $services->set(NoEmptyPhpdocFixer::class);
    $services->set(NoSuperfluousPhpdocTagsFixer::class)
        ->call('configure', [['allow_mixed' => true]]);
    $services->set(PhpdocAlignFixer::class)
        ->call('configure', [['align' => 'left']]);
    $services->set(PhpdocAnnotationWithoutDotFixer::class);
    $services->set(PhpdocIndentFixer::class);
    $services->set(PhpdocNoUselessInheritdocFixer::class);
    $services->set(PhpdocOrderFixer::class);
    $services->set(PhpdocScalarFixer::class);
    $services->set(PhpdocSeparationFixer::class);
    $services->set(PhpdocSingleLineVarSpacingFixer::class);
    $services->set(PhpdocTagCasingFixer::class);
    $services->set(PhpdocTrimConsecutiveBlankLineSeparationFixer::class);
    $services->set(PhpdocTrimFixer::class);
    $services->set(PhpdocTypesFixer::class);
    $services->set(PhpdocVarAnnotationCorrectOrderFixer::class);
    $services->set(PhpdocVarWithoutNameFixer::class);
    $services->set(NoUselessReturnFixer::class);
    $services->set(NoEmptyStatementFixer::class);
    $services->set(NoSinglelineWhitespaceBeforeSemicolonsFixer::class);
    $services->set(SemicolonAfterInstructionFixer::class);
    $services->set(SpaceAfterSemicolonFixer::class);
    $services->set(DeclareStrictTypesFixer::class);
    $services->set(SingleQuoteFixer::class);
    $services->set(BlankLineBeforeStatementFixer::class)
        ->call('configure', [['statements' => ['return']]]);
    $services->set(NoExtraBlankLinesFixer::class)
        ->call('configure', [['tokens' => [
            'case',
            'continue',
            'curly_brace_block',
            'default', 'extra',
            'parenthesis_brace_block',
            'square_brace_block',
            'switch',
            'throw',
            'use',
        ]]])
    ;
    $services->set(NoSpacesAroundOffsetFixer::class);
    $services->set(TypesSpacesFixer::class);
};
