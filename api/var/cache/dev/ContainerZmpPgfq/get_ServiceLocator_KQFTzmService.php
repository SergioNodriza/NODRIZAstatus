<?php

namespace ContainerZmpPgfq;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_KQFTzmService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.K_QFTzm' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.K_QFTzm'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'data' => ['privates', '.errored..service_locator.K_QFTzm.App\\Entity\\Incident', NULL, 'Cannot autowire service ".service_locator.K_QFTzm": it references class "App\\Entity\\Incident" but no such service exists.'],
        ], [
            'data' => 'App\\Entity\\Incident',
        ]);
    }
}
