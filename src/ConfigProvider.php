<?php

declare(strict_types=1);

namespace Cmf;

use Cmf\Exception\Handler\AppClientExceptionHandler;
use Cmf\Exception\Handler\AppExceptionHandler;
use Cmf\Exception\Handler\AppValidationExceptionHandler;
use Cmf\Exception\Handler\BusinessExceptionHandler;
use Cmf\Model\Model;

class ConfigProvider
{
    public function __invoke(): array
    {
        return [
            'exceptions'=>[
                'handler' => [
                    'http' => [
                        BusinessExceptionHandler::class,
                        AppClientExceptionHandler::class,
                        AppValidationExceptionHandler::class,
                        AppExceptionHandler::class,
                    ],
                ],
            ],
            'databases'=>[
                'default' => [
                    'commands' => [
                        'gen:model' => [
                            'uses' => Model::class
                        ],
                    ],
                ],
            ],
            'dependencies' => [

            ],
            'commands' => [
            ],
            'annotations' => [
                'scan' => [
                    'paths' => [
                        __DIR__,
                    ],
                ],
            ],
            'publish' => [
                [
                    'id' => 'cmf',
                    'description' => 'cmf核心配置', // 描述
                    'source' => __DIR__ . '/../publish/cmf.php',  // 对应的配置文件路径
                    'destination' => BASE_PATH . '/config/autoload/cmf.php', // 复制为这个路径下的该文件
                ],
            ],
        ];
    }
}
