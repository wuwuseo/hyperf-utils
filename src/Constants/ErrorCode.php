<?php

declare(strict_types=1);

namespace Cmf\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("fail")
     */
    const FAIL = 0;

    /**
     * @Message("Server Error！")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("验证错误")
     */
    const VALIDATE_ERROR = 422;

    /**
     * @Message("无权访问该资源")
     */
    const DISALLOW = 403;

    /**
     * @Message("请求参数错误")
     */
    const BAD_REQUEST = 400;

    /**
     * @Message("请求资源不存在")
     */
    const RECORD_NOT_FOUND = 404;

    /**
     * @Message("Method Not Allowed")
     */
    const METHOD_NOT_ALLOWED = 405;

    /**
     * @Message("请先登录")
     */
    const UNAUTHENTICATED = 401;
}