<?php

namespace swoole\server;

/**
 * WebSocket 服务器类
 * @class WebSocket
 */
class WebSocket extends TcpUdp
{
    /**
     * 服务器名称
     * @var string
     */
    protected $serverName = 'WebSocket';
    /**
     * Swoole Server类名
     */
    protected $swooleServer = '\Swoole\WebSocket\Server';
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->appendEvents(['onHandShake','onOpen','onMessage','onRequest']);
        if (str_replace('.', '', swoole_version()) >= str_replace('.', '', '4.7.0')) {
            $this->appendEvents(['onDisconnect']);
        }
        $this->config->setOpenWebsocketProtocol(true);
        if (!$this->config->getWebsocketHandshake()) {
            $this->removeEvents(['onHandShake']);
        }
    }
}