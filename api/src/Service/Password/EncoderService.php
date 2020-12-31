<?php

namespace App\Service\Password;

use App\Exceptions\PasswordException;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use function strlen;

class EncoderService
{
    private const MINIMUM_LENGTH = 6;

    private UserPasswordEncoderInterface $userPasswordEncoder;

    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    public function generateEncodedPassword(UserInterface $user, string $password): string
    {
        if (self::MINIMUM_LENGTH > strlen($password)) {
            throw PasswordException::invalidLength(self::MINIMUM_LENGTH);
        }

        if (!preg_match('`[a-z]`',$password)) {
            throw PasswordException::invalidCharset('lowercase');
        }

        if (!preg_match('`[A-Z]`',$password)) {
            throw PasswordException::invalidCharset('uppercase');
        }

        if(!preg_match('/\d/', $password)) {
            throw PasswordException::invalidCharset('number');
        }

        $pattern = "/!@#$%^&*-_/";
        if (!strpbrk($pattern, $password)) {
            throw PasswordException::invalidCharset('special character');
        }

        return $this->userPasswordEncoder->encodePassword($user, $password);
    }
}