<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioAlice_FixtureBuilder_SimpleService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_alice.fixture_builder.simple' shared service.
     *
     * @return \Nelmio\Alice\FixtureBuilder\SimpleBuilder
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/FixtureBuilderInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/IsAServiceTrait.php';
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/FixtureBuilder/SimpleBuilder.php';

        return $container->privates['nelmio_alice.fixture_builder.simple'] = new \Nelmio\Alice\FixtureBuilder\SimpleBuilder(($container->privates['nelmio_alice.fixture_builder.denormalizer.simple'] ?? $container->load('getNelmioAlice_FixtureBuilder_Denormalizer_SimpleService')));
    }
}
