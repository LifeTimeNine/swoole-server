<?php

namespace swoole\server;

/**
 * HTTP 服务器
 * @class Http
 */
class Http extends TcpUdp
{
    /**
     * 服务器名称
     * @var string
     */
    protected $serverName = 'HTTP';
    /**
     * Swoole Server 类名
     */
    protected $swooleServer = '\Swoole\Http\Server';
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->removeEvents(['onConnect', 'onReceive'])
            ->appendEvents(['onRequest']);
        $this->config->setOpenHttpProtocol(true);
    }
}