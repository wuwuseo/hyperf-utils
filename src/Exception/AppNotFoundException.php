<?php
declare(strict_types=1);

namespace Cmf\Exception;


use Cmf\Constants\ErrorCode;
use Hyperf\Server\Exception\ServerException;

class AppNotFoundException extends ServerException
{
    protected $code = ErrorCode::RECORD_NOT_FOUND;

    public function __construct(string $message = "")
    {
        $message = $message?$message:ErrorCode::getMessage($this->code);
        parent::__construct($message, $this->code);
    }
}