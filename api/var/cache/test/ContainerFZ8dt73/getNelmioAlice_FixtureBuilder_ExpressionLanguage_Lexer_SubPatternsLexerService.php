<?php

namespace ContainerFZ8dt73;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioAlice_FixtureBuilder_ExpressionLanguage_Lexer_SubPatternsLexerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_alice.fixture_builder.expression_language.lexer.sub_patterns_lexer' shared service.
     *
     * @return \Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\SubPatternsLexer
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/FixtureBuilder/ExpressionLanguage/LexerInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/IsAServiceTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/FixtureBuilder/ExpressionLanguage/Lexer/SubPatternsLexer.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/FixtureBuilder/ExpressionLanguage/Lexer/ReferenceLexer.php';

        return $container->privates['nelmio_alice.fixture_builder.expression_language.lexer.sub_patterns_lexer'] = new \Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\SubPatternsLexer(($container->privates['nelmio_alice.fixture_builder.expression_language.lexer.reference_lexer'] ?? ($container->privates['nelmio_alice.fixture_builder.expression_language.lexer.reference_lexer'] = new \Nelmio\Alice\FixtureBuilder\ExpressionLanguage\Lexer\ReferenceLexer())));
    }
}
