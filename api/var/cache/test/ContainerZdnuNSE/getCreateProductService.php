<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateProductService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\Action\Product\CreateProduct' shared autowired service.
     *
     * @return \App\Controller\Action\Product\CreateProduct
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Action/Product/CreateProduct.php';

        return $container->services['App\\Controller\\Action\\Product\\CreateProduct'] = new \App\Controller\Action\Product\CreateProduct(($container->privates['App\\Service\\Product\\ProductCreateService'] ?? $container->load('getProductCreateServiceService')));
    }
}
