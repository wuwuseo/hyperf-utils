<?php
declare(strict_types=1);

namespace Cmf\Exception;


use Cmf\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;

class AppBadRequestException extends ServerException
{
    protected $code = ErrorCode::BAD_REQUEST;

    public function __construct(string $message = "")
    {
        $message = $message?$message:ErrorCode::getMessage($this->code);
        parent::__construct($message, $this->code);
    }
}