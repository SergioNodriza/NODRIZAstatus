<?php

namespace ContainerYtvkpvn;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIncidentNotifierService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'App\Controller\Listener\IncidentNotifier' shared autowired service.
     *
     * @return \App\Controller\Listener\IncidentNotifier
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Listener/IncidentNotifier.php';

        return $container->privates['App\\Controller\\Listener\\IncidentNotifier'] = new \App\Controller\Listener\IncidentNotifier(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
