<?php

namespace swoole\event;

/**
 * HTTP 服务器事件类
 * @class Http
 */
class Http extends TcpUdp
{
    /**
     * 收到 HTTP 请求时触发此函数
     * @param   \Swoole\Http\Request $request    请求信息对象
     * @param   \Swoole\Http\Response $response HTTP 响应对象
     */
    public static function onRequest($request, $response) {}
}