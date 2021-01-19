<?php

namespace App\Tests\User;



class InfoUserTest extends UserTestBase
{
    public function testInfoUser(): void
    {
        $token = self::$peter->getServerParameter("HTTP_Authorization");
        $tokenParts = explode(".", $token);
        $tokenPayload = base64_decode($tokenParts[1]);

        $username = json_decode($tokenPayload)->username;
        $id = json_decode($tokenPayload)->id;

        self::assertSame($username, "Peter");
        self::assertSame($id, $this->getPeterId());
    }

    public function testInfoUserNotLogged(): void
    {
        $token = self::$roger->getServerParameter("HTTP_Authorization");
        self::assertSame($token, '');
    }
}