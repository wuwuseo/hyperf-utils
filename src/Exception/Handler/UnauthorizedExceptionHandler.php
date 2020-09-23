<?php
declare(strict_types=1);

namespace Cmf\Exception\Handler;

use Cmf\Constants\ErrorCode;
use Cmf\Exception\UnauthorizedException;
use Cmf\Traits\Result;
use Psr\Http\Message\ResponseInterface;
use Throwable;
use Hyperf\ExceptionHandler\ExceptionHandler;

class UnauthorizedExceptionHandler extends ExceptionHandler
{
    use Result;

    public function handle(Throwable $throwable, ResponseInterface $response) {
        $this->stopPropagation();
        $data = $this->error($throwable->getCode(),$throwable->getMessage());
        return $response->withStatus(ErrorCode::UNAUTHENTICATED)->json($data);
    }
    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof UnauthorizedException;
    }
}