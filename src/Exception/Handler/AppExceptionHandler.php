<?php

declare(strict_types=1);

namespace Cmf\Exception\Handler;


use Cmf\Constants\ErrorCode;
use Cmf\Traits\Result;
use Hyperf\Contract\StdoutLoggerInterface;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
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
        $this->logger->error(sprintf('%s[%s] in %s', $throwable->getMessage(), $throwable->getLine(),
            $throwable->getFile()));
        $this->logger->error($throwable->getTraceAsString());
        $data = $this->error(ErrorCode::SERVER_ERROR);
        $this->stopPropagation();
        return $response->withStatus(ErrorCode::SERVER_ERROR)->json($data);
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
