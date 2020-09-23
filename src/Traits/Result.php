<?php

declare(strict_types=1);

namespace Cmf\Traits;

use Cmf\Constants\ErrorCode;
use Cmf\Constants\SuccessCode;
use Hyperf\Config\Annotation\Value;

trait Result
{
    /**
     * @Value("cmf.result_code")
     */
    private $resultCode = 'code';

    /**
     * @Value("cmf.result_msg")
     */
    private $resultMsg = 'msg';

    /**
     * @Value("cmf.result_data")
     */
    private $resultData = 'data';

    public function success($code = SuccessCode::SUCCESS, $data = [], $msg = null)
    {
        $msg = $msg ? $msg : SuccessCode::getMessage($code);
        return $this->result($code, $msg, $data);
    }

    public function error($code = ErrorCode::FAIL, $msg = null)
    {
        $msg = $msg ? $msg : ErrorCode::getMessage($code);
        return $this->result($code, $msg);

    }

    protected function result($code, $msg, $data = [])
    {
        $data = [
            $this->resultCode => $code,
            $this->resultMsg  => $msg,
            $this->resultData => $data
        ];
        return $data;
    }
}