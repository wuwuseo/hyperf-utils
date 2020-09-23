<?php

declare(strict_types=1);

namespace Cmf\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class SuccessCode extends AbstractConstants
{
    /**
     * @Message("ok")
     */
    const SUCCESS = 1;

    /**
     * @Message("http ok")
     */
    const HTTP_SUCCESS = 200;
}