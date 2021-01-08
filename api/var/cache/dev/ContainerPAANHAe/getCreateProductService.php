<?php

namespace ContainerPAANHAe;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getCreateProductService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\Action\Product\CreateProduct' shared autowired service.
     *
     * @return \App\Controller\Action\Product\CreateProduct
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Action/Product/CreateProduct.php';
        include_once \dirname(__DIR__, 4).'/src/Service/Product/ProductCreateService.php';

        return $container->services['App\\Controller\\Action\\Product\\CreateProduct'] = new \App\Controller\Action\Product\CreateProduct(new \App\Service\Product\ProductCreateService(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService())));
    }
}
