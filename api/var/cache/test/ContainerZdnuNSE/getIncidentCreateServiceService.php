<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getIncidentCreateServiceService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Service\Incident\IncidentCreateService' shared autowired service.
     *
     * @return \App\Service\Incident\IncidentCreateService
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Service/Incident/IncidentCreateService.php';

        return $container->privates['App\\Service\\Incident\\IncidentCreateService'] = new \App\Service\Incident\IncidentCreateService(($container->services['doctrine.orm.default_entity_manager'] ?? $container->getDoctrine_Orm_DefaultEntityManagerService()));
    }
}
