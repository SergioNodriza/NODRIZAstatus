<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getJsonExceptionResponseTransformerListenerService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'App\Controller\Listener\JsonExceptionResponseTransformerListener' shared autowired service.
     *
     * @return \App\Controller\Listener\JsonExceptionResponseTransformerListener
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/src/Controller/Listener/JsonExceptionResponseTransformerListener.php';

        return $container->privates['App\\Controller\\Listener\\JsonExceptionResponseTransformerListener'] = new \App\Controller\Listener\JsonExceptionResponseTransformerListener();
    }
}
