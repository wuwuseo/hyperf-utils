<?php
declare(strict_types=1);

namespace Cmf\Exception;


use Cmf\Constants\ErrorCode;

class UnauthorizedException extends \Hyperf\Validation\UnauthorizedException
{
    protected $code = ErrorCode::UNAUTHENTICATED;

    public function __construct(string $message = "")
    {
        $message = $message?$message:ErrorCode::getMessage($this->code);
        parent::__construct($message, $this->code);
    }
}