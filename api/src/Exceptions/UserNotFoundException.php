<?php


namespace App\Exceptions;

use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class UserNotFoundException extends UsernameNotFoundException
{
    private const MESSAGE = 'User with name %s not found';

    public static function fromName(string $name): self
    {
        throw new self(\sprintf(self::MESSAGE, $name));
    }
}
