<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getSecurity_Firewall_Map_Config_GetProductsNamesService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'security.firewall.map.config.getProductsNames' shared service.
     *
     * @return \Symfony\Bundle\SecurityBundle\Security\FirewallConfig
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/security-bundle/Security/FirewallConfig.php';

        return $container->privates['security.firewall.map.config.getProductsNames'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallConfig('getProductsNames', 'security.user_checker', '.security.request_matcher.Nf6IVfR', false, false, NULL, NULL, NULL, NULL, NULL, [], NULL);
    }
}
