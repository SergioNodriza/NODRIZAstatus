<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getGeneralStateServiceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\Product\GeneralStateService' shared autowired service.
     *
     * @return \App\Service\Product\GeneralStateService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Product/GeneralStateService.php';

        return $container->privates['App\\Service\\Product\\GeneralStateService'] = new \App\Service\Product\GeneralStateService(($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')));
    }
}
