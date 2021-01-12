<?php

namespace ContainerKCUYlKB;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Map_Config_RegisterService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.firewall.map.config.register' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallConfig
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security/FirewallConfig.php';

        return $container->privates['security.firewall.map.config.register'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('register', 'security.user_checker', '.security.request_matcher..9eelJG', false, false, NULL, NULL, NULL, NULL, NULL, [], NULL);
    }
}
