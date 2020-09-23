<?php
declare(strict_types=1);

return [
    'result_code'  => env('RESULT_CODE', 'code'),
    'result_msg'   => env('RESULT_MSG', 'msg'),
    'result_data'  => env('RESULT_DATA', 'data'),
    'cors_allow_origin'  => env('CORS_ALLOW_ORIGIN', '*'),
    'cors_allow_headers' => env('CORS_ALLOW_HEADERS', 'DNT,Keep-Alive,User-Agent,Cache-Control,Content-Type,Authorization,XX-Device-Type,XX-Token,XX-Api-Version,XX-Wxapp-AppId'),
    'cors_allow_methods' => env('CORS_ALLOW_METHODS', 'GET,POST,PATCH,PUT,DELETE,OPTIONS'),
];
