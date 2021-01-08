<?php

namespace ContainerFZ8dt73;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNelmioAlice_Faker_Provider_AliceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'nelmio_alice.faker.provider.alice' shared service.
     *
     * @return \Nelmio\Alice\Faker\Provider\AliceProvider
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/nelmio/alice/src/Faker/Provider/AliceProvider.php';

        return $container->privates['nelmio_alice.faker.provider.alice'] = new \Nelmio\Alice\Faker\Provider\AliceProvider();
    }
}
