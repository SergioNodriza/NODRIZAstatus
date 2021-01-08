<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGeneralStateService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\Action\Product\GeneralState' shared autowired service.
     *
     * @return \App\Controller\Action\Product\GeneralState
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Action/Product/GeneralState.php';

        return $container->services['App\\Controller\\Action\\Product\\GeneralState'] = new \App\Controller\Action\Product\GeneralState(($container->privates['App\\Service\\Product\\GeneralStateService'] ?? $container->load('getGeneralStateServiceService')));
    }
}
