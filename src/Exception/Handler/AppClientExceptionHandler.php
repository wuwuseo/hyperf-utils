<?php
declare(strict_types=1);

namespace Cmf\Exception\Handler;

use Cmf\Exception\AppBadRequestException;
use Cmf\Exception\AppNotAllowedException;
use Cmf\Exception\AppNotFoundException;
use Cmf\Traits\Result;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppClientExceptionHandler extends ExceptionHandler
{
    use Result;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        $data = $this->error($throwable->getCode());
        return $response->withStatus($throwable->getCode())
            ->json($data);
    }

    public function isValid(Throwable $throwable): bool
    {
        return ($throwable instanceof AppBadRequestException) ||
            ($throwable instanceof AppNotFoundException) ||
            ($throwable instanceof AppNotAllowedException);
    }
}