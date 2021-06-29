<?php

namespace swoole\server;

use swoole\Config;
use swoole\Options;
use swoole\Output;

/**
 * TCPUDP服务器类
 * @class Server
 */
class TcpUdp
{
    /**
     * 服务器名称
     * @var string
     */
    protected $serverName = 'TCP/UDP';
    /**
     * Swoole Server类
     * @var Swoole\Server
     */
    protected $server;
    /**
     * Swoole Server类名
     * @var string
     */
    protected $swooleServer = '\Swoole\Server';
    /**
     * 配置类
     * @var Config
     */
    protected $config;
    /**
     * 管理进程Pid
     * @var int|bool
     */
    protected $masterPid;
    /**
     * 支持的事件
     * @var array
     */
    protected $events = [
        'onStart','onShutdown','onWorkerStart','onWorkerStop','onWorkerExit','onConnect',
        'onReceive','onPacket','onClose','onTask','onFinish','onPipeMessage','onWorkerError',
        'onManagerStart','onManagerStop','onBeforeReload','onAfterReload'
    ];

    /**
     * 构造函数
     * @param   array|\swoole\Config
     */
    public function __construct($config = null)
    {
        if (!empty($config)) {
            $this->setConfig($config);
        }
    }

    /**
     * 设置参数
     * @param   array|\swoole\Config $config
     * @return $this
     */
    public function setConfig($config)
    {
        if (is_array($config)) {
            $this->config = new Config($config);
        } elseif ($config instanceof Config) {
            $this->config = $config;
        }
        $this->masterPid = $this->getMasterPid();
        return $this;
    }
    /**
     * 初始化服务器
     * @return $this
     */
    protected function initialize() {}
    /**
     * 添加事件
     * @param   array   $events
     * @return  $this
     */
    protected function appendEvents(array $events)
    {
        $this->events = array_merge($this->events, $events);
        return $this;
    }
    /**
     * 移除事件
     * @param   array   $events
     * @return  $this
     */
    protected function removeEvents(array $events)
    {
        $this->events = array_values(array_diff($this->events, $events));
        return $this;
    }
    /**
     * 绑定事件
     * @return $this
     */
    protected function bindEvent()
    {
        $eventClass = $this->config->getEventClass();
        if (empty($eventClass) || !class_exists($eventClass)) {
            throw new \Exception(Output::instance()->write('<error>Event class is not set or not accessible </error>'));
        }
        foreach($this->events as $event) {
            $this->server->on(strtolower(substr($event, 2)), [$eventClass, $event]);
        }
        return $this;
    }
    /**
     * 初始化服务器
     * @return $this
     */
    public function initServer()
    {
        $host = $this->config->getHost() ?: '0.0.0.0';
        $this->config->setHost($host);
        $port = $this->config->getPort() ?: 9501;
        $this->config->setPort($port);
        $mode = $this->config->getMode() ?: Options::MODE_PROCESS;
        $sockType = $this->config->getSockType() ?: Options::SOCK_TYPE_TCP;
        if (empty($this->config->getPidFile())) {
            $this->config->setPidFile("/tmp/" . md5("{$host}{$port}") . ".pid");
        }
        // 初始化
        $this->initialize();
        $this->server = new $this->swooleServer($host, $port, $mode, $sockType);
        $this->server->set($this->config->getConfig());
        // 绑定事件
        $this->bindEvent();
        // 获取监控文件列表
        $fileList = $this->config->getFileList();
        if (!empty($this->config->getFileMoniotr()) && !empty($fileList) && is_array($fileList)) {
            $table = new \Swoole\Table(1024);
            $table->column('update_time', \Swoole\Table::TYPE_INT);
            $table->create();
            $this->server->addProcess(new \Swoole\Process(function($process) use($table, $fileList) {
                \Swoole\Timer::tick(2000, function($timerId, $fileList, $table) {
                    $hasUpdate = false;
                    foreach ($fileList as $file) {
                        if (!is_file($file)) continue;
                        $lastUpdateTime = filectime($file);
                        $fileKey = md5($file);
                        $oldTime = $table->get($fileKey, 'update_time');
                        if ($lastUpdateTime <> $table->get($fileKey, 'update_time')) {
                            if ($oldTime !== false) $hasUpdate = true;
                            $table->set($fileKey, ['update_time' => $lastUpdateTime]);
                        }
                    }
                    clearstatcache();
                    if ($hasUpdate) $this->server->reload();
                }, $fileList, $table);
            }, false, 2, 1));
        }
        return $this;
    }
    /**
     * 获取Swoole Server实例
     * @return Swoole\Server
     */
    public function getServer()
    {
        return $this->server;
    }
    /**
     * 获取管理进程Pid
     * @return bool|int
     */
    public function getMasterPid()
    {
        if (empty($this->config->getPidFile())) {
            $host = $this->config->getHost() ?: '0.0.0.0';
            $port = $this->config->getPort() ?: 9501;
            return (int)file_get_contents("/tmp/" . md5("{$host}{$port}") . ".pid");
        } else {
            return (int)file_get_contents($this->config->getPidFile());
        }
    }
    /**
     * 判断服务器是否正在运行
     * @param   int     $pid
     * @return  bool
     */
    public function isRuning($pid)
    {
        if (empty($pid)) return false;
        return \Swoole\Process::kill($pid, 0);
    }
    /**
     * 启动服务器
     */
    public function start()
    {
        if ($this->isRuning($this->masterPid)) {
            Output::instance()->writeln("<warning>Swoole {$this->serverName} server is running</warning>");
            return;
        }
        if (empty($this->server)) {
            Output::instance()->writeln("<warning>Please initialize the server first</warning>");
            return;
        }
        Output::instance()->writeln('Starting server...');
        Output::instance()->writeln("Swoole {$this->serverName} server started: <{$this->config->getHost()}:{$this->config->getPort()}>");
        // 启动服务器
        $this->server->start();
    }
    /**
     * 停止服务器
     */
    public function stop()
    {
        if (!$this->isRuning($this->masterPid)) {
            Output::instance()->writeln("<warning>No Swoole {$this->serverName} server is running</warning>");
            return;
        }
        Output::instance()->writeln('Stoping server...');
        \Swoole\Process::kill($this->masterPid, SIGTERM);
        $time = time();
        do {
            if (!$this->isRuning($this->masterPid)) {
                Output::instance()->writeln('> <success>success</success>');
                return;
            }
            sleep(1);
        } while (time() - $time <= 5);
        Output::instance()->writeln('> <error>filure</error>');
    }
    /**
     * 柔性重启服务器
     */
    public function reload()
    {
        if (!$this->isRuning($this->masterPid)) {
            Output::instance()->writeln("<warning>No Swoole {$this->serverName} server is running</warning>");
            return;
        }
        Output::instance()->writeln('Reloading server...');
        \Swoole\Process::kill($this->masterPid, SIGUSR1);
        if (!$this->isRuning($this->masterPid)) {
            Output::instance()->writeln('> <error>filure</error>');
            return;
        }
        Output::instance()->writeln('> <success>success</success>');
    }
    /**
     * 重启服务器
     */
    public function restart()
    {
        $this->stop();
        sleep(1);
        $this->start();
    }
}