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
        if ($this->compare_version(swoole_version(), '4.7.0')) {
            $this->appendEvents(['onDisconnect']);
        }
        $this->config->setOpenWebsocketProtocol(true);
        if (!$this->config->getWebsocketHandshake()) {
            $this->removeEvents(['onHandShake']);
        }
    }

    /**
     * 判断 v1 是否大于等于 v2
     */
    private function compare_version($version1, $version2)
    {
        $version1 = explode('.', $version1);
        $version2 = explode('.', $version2);
        foreach($version1 as $key => $value) {
            if (!isset($version2[$key])) return true;
            if ($value > $version2[$key]) return true;
            if ($value < $version2[$key]) return false;
        }
        return true;
    }
}