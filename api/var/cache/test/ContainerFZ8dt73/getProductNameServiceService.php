<?php

namespace ContainerFZ8dt73;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getProductNameServiceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\Product\ProductNameService' shared autowired service.
     *
     * @return \App\Service\Product\ProductNameService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Product/ProductNameService.php';

        return $container->privates['App\\Service\\Product\\ProductNameService'] = new \App\Service\Product\ProductNameService(($container->privates['App\\Repository\\ProductRepository'] ?? $container->load('getProductRepositoryService')));
    }
}
