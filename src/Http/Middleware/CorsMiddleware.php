<?php
declare(strict_types=1);

namespace Cmf\Http\Middleware;

use Hyperf\Utils\Context;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Hyperf\Config\Annotation\Value;

class CorsMiddleware implements MiddlewareInterface
{
    /**
     * @Value("cmf.cors_allow_origin")
     */
    private $allowOrigin = '*';

    /**
     * @Value("cmf.cors_allow_headers")
     */
    private $allowHeaders = 'DNT,Keep-Alive,User-Agent,Cache-Control,Content-Type,Authorization,XX-Device-Type,XX-Token,XX-Api-Version,XX-Wxapp-AppId';

    /**
     * @Value("cmf.cors_allow_methods")
     */
    private $allowMethods = 'GET,POST,PATCH,PUT,DELETE,OPTIONS';

    /**
     * @param  ServerRequestInterface  $request
     * @param  RequestHandlerInterface  $handler
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $response = Context::get(ResponseInterface::class);
        $response = $response->withHeader('Access-Control-Allow-Origin', $this->allowOrigin)
            ->withHeader('Access-Control-Allow-Credentials', 'true')
            // Headers 可以根据实际情况进行改写。
            ->withHeader('Access-Control-Allow-Headers',
                $this->allowHeaders)
            ->withHeader('Access-Control-Allow-Methods',$this->allowMethods);

        Context::set(ResponseInterface::class, $response);

        if ($request->getMethod() == 'OPTIONS') {
            return $response;
        }

        return $handler->handle($request);
    }
}