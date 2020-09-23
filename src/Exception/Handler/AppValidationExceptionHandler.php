<?php

declare(strict_types=1);

namespace Cmf\Exception\Handler;


use Cmf\Constants\ErrorCode;
use Cmf\Traits\Result;
use Hyperf\Validation\ValidationExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppValidationExceptionHandler extends ValidationExceptionHandler
{
    use Result;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $this->stopPropagation();
        $message = $throwable->validator->errors()->first();
        $data = $this->error(ErrorCode::VALIDATE_ERROR, $message);
        return $response->withStatus(ErrorCode::VALIDATE_ERROR)->json($data);
    }
}
