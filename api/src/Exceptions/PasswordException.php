<?php


namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class PasswordException extends BadRequestException
{
    public static function invalidLength(int $length): self
    {
        throw new self(sprintf('Password must be at least %s characters', $length));
    }

    public static function invalidCharset(string $error): self
    {
        throw new self(sprintf('Password must be at least one %s', $error));
    }
}