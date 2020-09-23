<?php

declare(strict_types=1);

namespace Cmf\Exception\Handler;

use Cmf\Constants\SuccessCode;
use Cmf\Exception\BusinessException;
use Cmf\Traits\Result;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class BusinessExceptionHandler extends ExceptionHandler
{
    use Result;

    /**
     * @var StdoutLoggerInterface
     */
    protected $logger;

    public function __construct(StdoutLoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 阻止异常冒泡
        $this->stopPropagation();
        // 业务逻辑错误日志处理
        $throwableMsg = sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(),
                $throwable->getFile()).PHP_EOL.$throwable->getTraceAsString();
        $this->logger->warning($throwableMsg);
        $data = $this->error($throwable->getCode(),$throwable->getMessage());
        return $response->withStatus(SuccessCode::HTTP_SUCCESS)->json($data);
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof BusinessException;
    }
}
