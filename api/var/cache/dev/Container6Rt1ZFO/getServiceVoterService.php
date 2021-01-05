<?php

namespace Container6Rt1ZFO;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getServiceVoterService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private 'debug.security.voter.App\Security\Authorization\Voter\ServiceVoter' shared service.
     *
     * @return \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/VoterInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/TraceableVoter.php';
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-core/Authorization/Voter/Voter.php';
        include_once \dirname(__DIR__, 4).'/src/Security/Authorization/Voter/ServiceVoter.php';
        include_once \dirname(__DIR__, 4).'/src/Service/Roles/RolesService.php';

        return $container->privates['debug.security.voter.App\\Security\\Authorization\\Voter\\ServiceVoter'] = new \Symfony\Component\Security\Core\Authorization\Voter\TraceableVoter(new \App\Security\Authorization\Voter\ServiceVoter(($container->privates['App\\Service\\Roles\\RolesService'] ?? ($container->privates['App\\Service\\Roles\\RolesService'] = new \App\Service\Roles\RolesService()))), ($container->services['event_dispatcher'] ?? $container->getEventDispatcherService()));
    }
}
