<?php

namespace ContainerZdnuNSE;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getLexikJwtAuthentication_Extractor_CookieExtractorService extends App_KernelTestDebugContainer
{
    /**
     * Gets the private 'lexik_jwt_authentication.extractor.cookie_extractor' shared service.
     *
     * @return \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\CookieTokenExtractor
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/TokenExtractor/TokenExtractorInterface.php';
        include_once \dirname(__DIR__, 4).'/vendor/lexik/jwt-authentication-bundle/TokenExtractor/CookieTokenExtractor.php';

        return $container->privates['lexik_jwt_authentication.extractor.cookie_extractor'] = new \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\CookieTokenExtractor('BEARER');
    }
}
