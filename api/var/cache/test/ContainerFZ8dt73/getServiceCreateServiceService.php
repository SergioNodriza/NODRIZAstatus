<?php

namespace ContainerFZ8dt73;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getServiceCreateServiceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\Service\ServiceCreateService' shared autowired service.
     *
     * @return \App\Service\Service\ServiceCreateService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Service/ServiceCreateService.php';

        return $container->privates['App\\Service\\Service\\ServiceCreateService'] = new \App\Service\Service\ServiceCreateService(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
