<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class AlreadyExistsException extends ConflictHttpException
{
    private const MESSAGE = '%s %s already exist';

    public static function from(string $var, string $name): self
    {
        throw new self(\sprintf(self::MESSAGE, $var, $name));
    }
}