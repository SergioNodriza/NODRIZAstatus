<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getNameProductService extends App_KernelTestDebugContainer
{
    /**
     * Gets the public 'App\Controller\Action\Product\NameProduct' shared autowired service.
     *
     * @return \App\Controller\Action\Product\NameProduct
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Action/Product/NameProduct.php';

        return $container->services['App\\Controller\\Action\\Product\\NameProduct'] = new \App\Controller\Action\Product\NameProduct(($container->privates['App\\Service\\Product\\ProductNameService'] ?? $container->load('getProductNameServiceService')));
    }
}
