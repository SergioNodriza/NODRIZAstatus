<?php

namespace ContainerYtvkpvn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_UWJzpLLService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.UWJzpLL' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.UWJzpLL'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'App\\Controller\\Action\\Incident\\CreateIncident::__invoke' => ['privates', '.service_locator.K_QFTzm', 'get_ServiceLocator_KQFTzmService', true],
            'App\\Controller\\Action\\Product\\CreateProduct::__invoke' => ['privates', '.service_locator.WsGvwo4', 'get_ServiceLocator_WsGvwo4Service', true],
            'App\\Controller\\Action\\Service\\CreateService::__invoke' => ['privates', '.service_locator.k1ijW05', 'get_ServiceLocator_K1ijW05Service', true],
            'App\\Controller\\Action\\User\\CreateUser::__invoke' => ['privates', '.service_locator.TO3kXqK', 'get_ServiceLocator_TO3kXqKService', true],
            'App\\Kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'App\\Kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'kernel::loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel::terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
            'App\\Controller\\Action\\Incident\\CreateIncident:__invoke' => ['privates', '.service_locator.K_QFTzm', 'get_ServiceLocator_KQFTzmService', true],
            'App\\Controller\\Action\\Incident\\CreateIncident' => ['privates', '.service_locator.K_QFTzm', 'get_ServiceLocator_KQFTzmService', true],
            'App\\Controller\\Action\\Product\\CreateProduct:__invoke' => ['privates', '.service_locator.WsGvwo4', 'get_ServiceLocator_WsGvwo4Service', true],
            'App\\Controller\\Action\\Product\\CreateProduct' => ['privates', '.service_locator.WsGvwo4', 'get_ServiceLocator_WsGvwo4Service', true],
            'App\\Controller\\Action\\Service\\CreateService:__invoke' => ['privates', '.service_locator.k1ijW05', 'get_ServiceLocator_K1ijW05Service', true],
            'App\\Controller\\Action\\Service\\CreateService' => ['privates', '.service_locator.k1ijW05', 'get_ServiceLocator_K1ijW05Service', true],
            'App\\Controller\\Action\\User\\CreateUser:__invoke' => ['privates', '.service_locator.TO3kXqK', 'get_ServiceLocator_TO3kXqKService', true],
            'App\\Controller\\Action\\User\\CreateUser' => ['privates', '.service_locator.TO3kXqK', 'get_ServiceLocator_TO3kXqKService', true],
            'kernel:loadRoutes' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:registerContainerConfiguration' => ['privates', '.service_locator.KfbR3DY', 'get_ServiceLocator_KfbR3DYService', true],
            'kernel:terminate' => ['privates', '.service_locator.KfwZsne', 'get_ServiceLocator_KfwZsneService', true],
        ], [
            'App\\Controller\\Action\\Incident\\CreateIncident::__invoke' => '?',
            'App\\Controller\\Action\\Product\\CreateProduct::__invoke' => '?',
            'App\\Controller\\Action\\Service\\CreateService::__invoke' => '?',
            'App\\Controller\\Action\\User\\CreateUser::__invoke' => '?',
            'App\\Kernel::loadRoutes' => '?',
            'App\\Kernel::registerContainerConfiguration' => '?',
            'App\\Kernel::terminate' => '?',
            'kernel::loadRoutes' => '?',
            'kernel::registerContainerConfiguration' => '?',
            'kernel::terminate' => '?',
            'App\\Controller\\Action\\Incident\\CreateIncident:__invoke' => '?',
            'App\\Controller\\Action\\Incident\\CreateIncident' => '?',
            'App\\Controller\\Action\\Product\\CreateProduct:__invoke' => '?',
            'App\\Controller\\Action\\Product\\CreateProduct' => '?',
            'App\\Controller\\Action\\Service\\CreateService:__invoke' => '?',
            'App\\Controller\\Action\\Service\\CreateService' => '?',
            'App\\Controller\\Action\\User\\CreateUser:__invoke' => '?',
            'App\\Controller\\Action\\User\\CreateUser' => '?',
            'kernel:loadRoutes' => '?',
            'kernel:registerContainerConfiguration' => '?',
            'kernel:terminate' => '?',
        ]);
    }
}