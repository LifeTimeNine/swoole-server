<?php
/*
 * @Description   定时器
 * @Author        lifetime
 * @Date          2021-07-17 16:35:30
 * @LastEditTime  2021-07-19 19:07:33
 * @LastEditors   lifetime
 */
namespace swoole\extend\server;

use swoole\Config;
use swoole\server\TcpUdp;

/**
 * 定时器
 * @class   Timer
 */
class Timer
{
    /**
     * 配置
     * @access  protected
     * @var array
     */
    protected $config = [
        'port' => 9503, // 端口
        'task_worker_num' => 1, // 任务工作进程数
        'pid_file' => '', // PID文件地址
        'task_file_path' => '', // 任务列表文件地址
        'log_path' => '', // 日志文件地址
        'daemonize' => false, // 以守护进程的方式运行
        'hit_update' => true, // 热更新
    ];
    /**
     * 服务器示例
     * @var TcpUdp
     */
    protected $server;
    /**
     * 实例列表
     * @var array
     */
    protected static $instances = [];

    /**
     * 实例化
     * @param   array
     * @return  $this
     */
    public static function instance($config = [])
    {
        $key = md5(get_called_class() . serialize($config));
        if (isset(self::$instances[$key])) return self::$instances[$key];
        return self::$instances[$key] = new static($config);
    }

    /**
     * 构造函数
     * @access  private
     * @param   array   $cofig  配置
     */
    private function __construct($config = [])
    {
        $this->setConfig($config);
        $swooleConfig = new Config();
        $swooleConfig->setPort($this->config['port']);
        $swooleConfig->setWorkerNum(1);
        $swooleConfig->setTaskWorkerNum($this->config['task_worker_num']);
        $swooleConfig->setPidFile($this->config['pid_file']);
        $swooleConfig->setEventClass('\swoole\extend\event\Timer');
        $swooleConfig->setMaxWaitTime(10);
        $swooleConfig->setReloadAsync(true);
        $swooleConfig->setDaemonize($this->config['daemonize'] == true);
        $this->server = TcpUdp::instance($swooleConfig)->setName('Timer');
    }

    /**
     * 设置参数
     * @param   array   $config
     * @return  $this
     */
    public function setConfig($cofig)
    {
        if (is_array($cofig)) {
            $this->config = array_merge($this->config, $cofig);
        }
        if (!is_file($this->config['task_file_path'])) {
            throw new \Exception('unable to access the task list file');
        }
        return $this;
    }

    /**
     * 启动服务器
     */
    public function start()
    {
        $this->server->initServer();
        $this->server->getServer()->taskFilePath = $this->config['task_file_path'];
        $this->server->getServer()->logPath = $this->config['log_path'];
        $this->server->getServer()->hitUpdate = $this->config['hit_update'];
        $this->server->start();
    }
    /**
     * 停止服务器
     */
    public function stop()
    {
        $this->server->stop();
    }
    /**
     * 柔性重启服务器
     */
    public function reload()
    {
        $this->server->reload();
    }
    /**
     * 重启服务器
     */
    public function restart()
    {
        $this->server->restart();
    }
    /**
     * 删除PID文件
     */
    public function removePidFile()
    {
        $this->server->removePidFile();
    }
}
