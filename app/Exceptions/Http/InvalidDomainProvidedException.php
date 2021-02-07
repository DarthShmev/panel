<?php

namespace Pterodactyl\Exceptions\Http;

use Throwable;
use Illuminate\Http\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class InvalidDomainProvidedException extends HttpException implements HttpExceptionInterface
{
    /**
     * InvalidDomainProvidedException constructor.
     *
     * @param Throwable|null $previous
     */
    public function __construct(Throwable $previous = null)
    {
        parent::__construct(Response::HTTP_BAD_REQUEST, 'Invalid domain provided for this Pterodactyl installation.', $previous);
    }
}
