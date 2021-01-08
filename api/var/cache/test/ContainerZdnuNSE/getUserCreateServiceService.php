<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserCreateServiceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\User\UserCreateService' shared autowired service.
     *
     * @return \App\Service\User\UserCreateService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/User/UserCreateService.php';

        return $container->privates['App\\Service\\User\\UserCreateService'] = new \App\Service\User\UserCreateService(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()), ($container->privates['App\\Service\\Password\\EncoderService'] ?? $container->load('getEncoderServiceService')));
    }
}
