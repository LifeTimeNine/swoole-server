<?php

namespace swoole\server;

/**
 * MQTT 服务器类
 * @class   Mqtt
 */
class Mqtt extends TcpUdp
{
    /**
     * 服务器名称
     * @var string
     */
    protected $serverName = 'MQTT';
    /**
     * 初始化
     */
    protected function initialize()
    {
        $this->config->setOpenMqttProtocol(true);
    }
}