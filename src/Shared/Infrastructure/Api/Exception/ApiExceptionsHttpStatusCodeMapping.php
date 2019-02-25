<?php

declare(strict_types = 1);

namespace CodelyTv\Shared\Infrastructure\Api\Exception;

use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Response;

final class ApiExceptionsHttpStatusCodeMapping
{
    private $exceptions = [
        InvalidArgumentException::class => Response::HTTP_BAD_REQUEST
    ];

    public function register(string $exceptionClass, int $statusCode): void
    {
        $this->exceptions[$exceptionClass] = $statusCode;
    }

    public function exists(string $exceptionClass): bool
    {
        return \array_key_exists($exceptionClass, $this->exceptions);
    }

    public function getStatusCode(string $exceptionClass): int
    {
        return $this->exceptions[$exceptionClass];
    }
}
