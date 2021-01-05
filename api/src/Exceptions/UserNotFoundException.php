<?php


namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserNotFoundException extends NotFoundHttpException
{
    private const MESSAGE = 'User with name %s not found';

    public static function fromName(string $name): self
    {
        throw new self(\sprintf(self::MESSAGE, $name));
    }
}
