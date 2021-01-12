<?php

namespace App\Tests\User;

use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;

class LoginTest extends UserTestBase
{
    public function testLogin(): Cookie
    {
        $payload = [
            "username" => "Peter",
            "password" => "password"
        ];

        self::$peter->request('POST', sprintf('%s/login', $this->endpoint), [], [], [], json_encode($payload));

        $response = self::$peter->getResponse();
        self::assertSame(JsonResponse::HTTP_NO_CONTENT, $response->getStatusCode());

        $cookies = $response->headers->getCookies();
        $cookie = $cookies[0];

        self::assertSame($cookie->getName(), "BEARER");
        self::assertNull($cookie->getDomain());
        self::assertIsInt($cookie->getExpiresTime());
        self::assertSame($cookie->getPath(), "/");
        self::assertFalse($cookie->isSecure());
        self::assertTrue($cookie->isHttpOnly());
        self::assertFalse($cookie->isRaw());
        self::assertSame($cookie->getSameSite(), "lax");

        return $cookie;
    }

    public function testInvalidUserLogin(): void
    {
        $payload = [
            "username" => "Invalid-Peter",
            "password" => "password"
        ];

        self::$peter->request('POST', sprintf('%s/login', $this->endpoint), [], [], [], json_encode($payload));

        $response = self::$peter->getResponse();
        $exception = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_UNAUTHORIZED, $exception['code']);
        self::assertSame("Invalid credentials.", $exception['message']);
    }

    public function testInvalidPasswordLogin(): void
    {
        $payload = [
            "username" => "Peter",
            "password" => "Invalid-Password"
        ];

        self::$peter->request('POST', sprintf('%s/login', $this->endpoint), [], [], [], json_encode($payload));

        $response = self::$peter->getResponse();
        $exception = json_decode($response->getContent(), true);

        self::assertSame(JsonResponse::HTTP_UNAUTHORIZED, $exception['code']);
        self::assertSame("Invalid credentials.", $exception['message']);
    }

    /**
     * @depends testLogin
     * @param Cookie $cookie
     */
    public function testCookie(Cookie $cookie): void
    {
        self::assertSame($cookie->getName(), "BEARER");
    }
}