<?php

namespace App\Tests;

use Hautelook\AliceBundle\PhpUnit\RecreateDatabaseTrait;
use Liip\TestFixturesBundle\Test\FixturesTrait;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\BrowserKit\Cookie;
use function json_decode;

class TestBase extends WebTestCase
{
    use FixturesTrait;
    use RecreateDatabaseTrait;

    protected static ?KernelBrowser $client = null;
    protected static ?KernelBrowser $peter = null;
    protected static ?KernelBrowser $brian = null;
    protected static ?KernelBrowser $roger = null;

    protected function setUp(): void
    {
        if (null === self::$client) {
            self::$client = static::createClient();
            self::$client->setServerParameters(
                [
                    'CONTENT_TYPE' => 'application/json',
                    'HTTP_ACCEPT' => 'application/ld+json',
                ]
            );
        }

        if (null === self::$roger) {
            self::$roger = clone self::$client;
        }

        if (null === self::$peter) {
            self::$peter = clone self::$client;
            $this->createAuthenticatedUser(self::$peter, 'Peter');
        }

        if (null === self::$brian) {
            self::$brian = clone self::$client;
            $this->createAuthenticatedUser(self::$brian, 'Brian');
        }
    }

    private function createAuthenticatedUser(KernelBrowser $client, string $name): void
    {
        $user = $this->getContainer()->get('App\Repository\UserRepository')->findOneBy(['name' => $name]);
        $token = $this
            ->getContainer()
            ->get('Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface')
            ->create($user);

//        $cookie = new Cookie("BEARER", $token, strtotime('+8 hours'), "/", '', false, true);
//        $client->getCookieJar()->set($cookie);

        $client->setServerParameters(
            [
                'HTTP_Authorization' => sprintf('Bearer %s', $token),
                'CONTENT_TYPE' => 'application/json',
                'HTTP_ACCEPT' => 'application/ld+json',
            ]
        );
    }

    protected function getResponseData(Response $response): array
    {
        return json_decode($response->getContent(), true);
    }

    protected function initDbConnection()
    {
        return $this->getContainer()->get('doctrine')->getConnection();
    }

    /**
     * @return false|mixed
     */
    protected function getPeterId()
    {
        return $this->initDbConnection()->query('SELECT id FROM user WHERE name = "Peter"')->fetchColumn(0);
    }

    /**
     * @return false|mixed
     */
    protected function getBrianId()
    {
        return $this->initDbConnection()->query('SELECT id FROM user WHERE name = "Brian"')->fetchColumn(0);
    }

    /**
     * @return false|mixed
     */
    protected function getProductId()
    {
        return $this->initDbConnection()->query('SELECT id FROM product WHERE name = "TestProduct"')->fetchColumn(0);
    }

    /**
     * @return false|mixed
     */
    protected function getServiceId()
    {
        return $this->initDbConnection()->query('SELECT id FROM service WHERE name = "TestService"')->fetchColumn(0);
    }

    /**
     * @return false|mixed
     */
    protected function getServiceId2()
    {
        return $this->initDbConnection()->query('SELECT id FROM service WHERE name = "TestService2"')->fetchColumn(0);
    }

    /**
     * @return false|mixed
     */
    protected function getIncidentBajaId()
    {
        return $this->initDbConnection()->query('SELECT id FROM incident WHERE name = "TestIncidentBaja"')->fetchColumn(0);
    }
}