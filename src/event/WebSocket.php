<?php

namespace swoole\event;

/**
 * WebSocket 服务器事件类
 */
class WebSocket extends TcpUdp
{
    /**
     * WebSocket 建立连接后进行握手
     * @param   \Swoole\Http\Request $request    请求信息对象
     * @param   \Swoole\Http\Response $response HTTP 响应对象
     */
    public static function onHandShake($request, $response) {}
    /**
     * 当 WebSocket 客户端与服务器建立连接并完成握手后会回调此函数
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   \Swoole\Http\Request $request    请求信息对象
     */
    public static function onOpen($server, $request) {}
    /**
     * 当服务器收到来自客户端的数据帧时会回调此函数
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   Swoole\WebSocket\Frame  Swoole\WebSocket\Frame 对象，包含了客户端发来的数据帧信息
     */
    public static function onMessage($server, $frame) {}
    /**
     * 收到 HTTP 请求时触发此函数
     * @param   \Swoole\Http\Request $request    请求信息对象
     * @param   \Swoole\Http\Response $response HTTP 响应对象
     */
    public static function onRequest($request, $response) {}
}