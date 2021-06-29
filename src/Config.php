<?php
namespace swoole;
/**
 * 配置类
 * @class Config
 */
class Config
{
    /**
     * 构造函数
     * @param   array   $config
     */
    public function __construct($config = [])
    {
        $this->setConfig($config);
    }
    /**
     * 启动的Reactor线程数
     * @var int
     */
    protected $reactorNum;
    /**
     * 启动的Reactor线程数
     * @return  int
     */
    public function getReactorNum()
    {
        return $this->reactorNum;
    }
    /**
     * Set 启动的Reactor线程数
     * @param  int  $reactorNum  启动的Reactor线程数
     * @return  $this
     */
    public function setReactorNum(int $reactorNum)
    {
        $this->reactorNum = $reactorNum;
        return $this;
    }
    /**
     * 启动的Worker进程数
     * @var int
     */
    protected $workerNum;
    /**
     * Get 启动的Worker进程数
     * @return  int
     */
    public function getWorkerNum()
    {
        return $this->workerNum;
    }
    /**
     * Set 启动的Worker进程数
     * @param  int  $workerNum  启动的Worker进程数
     * @return  $this
     */
    public function setWorkerNum(int $workerNum)
    {
        $this->workerNum = $workerNum;
        return $this;
    }
    /**
     * Worker进程的最大任务数
     * @var int
     */
    protected $maxRequest;
    /**
     * Get worker进程的最大任务数
     * @return  int
     */
    public function getMaxRequest()
    {
        return $this->maxRequest;
    }
    /**
     * Set worker进程的最大任务数
     * @param  int  $maxRequest  Worker进程的最大任务数
     * @return  $this
     */
    public function setMaxRequest(int $maxRequest)
    {
        $this->maxRequest = $maxRequest;
        return $this;
    }
    /**
     * 最大允许的连接数
     * @var int
     */
    protected $maxConn;
    /**
     * Get 最大允许的连接数
     * @return  int
     */
    public function getMaxConn()
    {
        return $this->maxConn;
    }
    /**
     * Set 最大允许的连接数
     * @param  int  $maxConn  最大允许的连接数
     * @return  $this
     */
    public function setMaxConn(int $maxConn)
    {
        $this->maxConn = $maxConn;
        return $this;
    }
    /**
     * Task进程数量
     * @var int
     */
    protected $taskWorkerNum;
    /**
     * Get task进程数量
     * @return  int
     */ 
    public function getTaskWorkerNum()
    {
        return $this->taskWorkerNum;
    }
    /**
     * Set task进程数量
     * @param  int  $taskWorkerNum  Task进程数量
     * @return  $this
     */ 
    public function setTaskWorkerNum(int $taskWorkerNum)
    {
        $this->taskWorkerNum = $taskWorkerNum;
        return $this;
    }
    /**
     * Task进程与Worker进程之间的通讯方式
     * @var int
     */
    protected $taskIpcMode;
    /**
     * Get task进程与Worker进程之间的通讯方式
     * @return  int
     */ 
    public function getTaskIpcMode()
    {
        return $this->taskIpcMode;
    }
    /**
     * Set task进程与Worker进程之间的通讯方式
     * @param  int  $taskIpcMode  Task进程与Worker进程之间的通讯方式
     * @return  $this
     */ 
    public function setTaskIpcMode(int $taskIpcMode)
    {
        $this->taskIpcMode = $taskIpcMode;
        return $this;
    }
    /**
     * Task进程最大任务数
     * @var int
     */
    protected $taskMaxRequest;
    /**
     * Get task进程最大任务数
     * @return  int
     */ 
    public function getTaskMaxRequest()
    {
        return $this->taskMaxRequest;
    }
    /**
     * Set task进程最大任务数
     * @param  int  $taskMaxRequest  Task进程最大任务数
     * @return  $this
     */ 
    public function setTaskMaxRequest(int $taskMaxRequest)
    {
        $this->taskMaxRequest = $taskMaxRequest;
        return $this;
    }
    /**
     * Task数据临时目录
     * @var string
     */
    protected $taskTmpdir;
    /**
     * Get task数据临时目录
     * @return  string
     */ 
    public function getTaskTmpdir()
    {
        return $this->taskTmpdir;
    }
    /**
     * Set task数据临时目录
     * @param  string  $taskTmpdir  Task数据临时目录
     * @return  $this
     */ 
    public function setTaskTmpdir(string $taskTmpdir)
    {
        $this->taskTmpdir = $taskTmpdir;
        return $this;
    }
    /**
     * 开启Task协程支持
     * @var bool
     */
    protected $taskEnableCoroutine;
    /**
     * Get 开启Task协程支持
     * @return  bool
     */ 
    public function getTaskEnableCoroutine()
    {
        return $this->taskEnableCoroutine;
    }
    /**
     * Set 开启Task协程支持
     * @param  bool  $taskEnableCoroutine  开启Task协程支持
     * @return  $this
     */ 
    public function setTaskEnableCoroutine(bool $taskEnableCoroutine)
    {
        $this->taskEnableCoroutine = $taskEnableCoroutine;
        return $this;
    }
    /**
     * 使用面向对象风格的 Task 回调格式
     * @var bool
     */
    protected $taskUseObject;
    /**
     * Get 使用面向对象风格的 Task 回调格式
     * @return  bool
     */ 
    public function getTaskUseObject()
    {
        return $this->taskUseObject;
    }
    /**
     * Set 使用面向对象风格的 Task 回调格式
     * @param  bool  $taskUseObject  使用面向对象风格的 Task 回调格式
     * @return  $this
     */ 
    public function setTaskUseObject(bool $taskUseObject)
    {
        $this->taskUseObject = $taskUseObject;
        return $this;
    }
    /**
     * 数据包分发策略
     * @var int
     */
    protected $dispatchMode;
    /**
     * Get 数据包分发策略
     * @return  int
     */ 
    public function getDispatchMode()
    {
        return $this->dispatchMode;
    }
    /**
     * Set 数据包分发策略
     * @param  int  $dispatchMode  数据包分发策略
     * @return  $this
     */ 
    public function setDispatchMode(int $dispatchMode)
    {
        $this->dispatchMode = $dispatchMode;
        return $this;
    }
    /**
     * 自定义dispatch函数
     * @var string
     */
    protected $dispatchFunc;
    /**
     * Get 自定义dispatch函数
     * @return  string
     */ 
    public function getDispatchFunc()
    {
        return $this->dispatchFunc;
    }
    /**
     * Set 自定义dispatch函数
     * @param  string  $dispatchFunc  自定义dispatch函数
     * @return  $this
     */ 
    public function setDispatchFunc(string $dispatchFunc)
    {
        $this->dispatchFunc = $dispatchFunc;
        return $this;
    }
    /**
     * 消息队列的 KEY
     * @var string
     */
    protected $messageQueueKey;
    /**
     * Get 消息队列的 KEY
     * @return  string
     */ 
    public function getMessageQueueKey()
    {
        return $this->messageQueueKey;
    }
    /**
     * Set 消息队列的 KEY
     * @param  string  $messageQueueKey  消息队列的 KEY
     * @return  $this
     */ 
    public function setMessageQueueKey(string $messageQueueKey)
    {
        $this->messageQueueKey = $messageQueueKey;
        return $this;
    }
    /**
     * 守护进程化
     * @var bool
     */
    protected $daemonize;
    /**
     * Get 守护进程化
     * @return  bool
     */ 
    public function getDaemonize()
    {
        return $this->daemonize;
    }
    /**
     * Set 守护进程化
     * @param  bool  $daemonize  守护进程化
     * @return  $this
     */ 
    public function setDaemonize(bool $daemonize)
    {
        $this->daemonize = $daemonize;
        return $this;
    }
    /**
     * Listen 队列长度
     * @var int
     */
    protected $backlog;
    /**
     * Get listen 队列长度
     * @return  int
     */ 
    public function getBacklog()
    {
        return $this->backlog;
    }
    /**
     * Set listen 队列长度
     * @param  int  $backlog  Listen 队列长度
     * @return  $this
     */ 
    public function setBacklog(int $backlog)
    {
        $this->backlog = $backlog;
        return $this;
    }
    /**
     * 指定 Swoole 错误日志文件
     * @var string
     */
    protected $logFile;
    /**
     * Get 指定 Swoole 错误日志文件
     * @return  string
     */ 
    public function getLogFile()
    {
        return $this->logFile;
    }
    /**
     * Set 指定 Swoole 错误日志文件
     * @param  string  $logFile  指定 Swoole 错误日志文件
     * @return  $this
     */ 
    public function setLogFile(string $logFile)
    {
        $this->logFile = $logFile;
        return $this;
    }
    /**
     * 设置 Server 错误日志打印的等级
     * @var int
     */
    protected $logLevel;
    /**
     * Get 设置 Server 错误日志打印的等级
     * @return  int
     */ 
    public function getLogLevel()
    {
        return $this->logLevel;
    }
    /**
     * Set 设置 Server 错误日志打印的等级
     * @param  int  $logLevel  设置 Server 错误日志打印的等级
     * @return  $this
     */ 
    public function setLogLevel(int $logLevel)
    {
        $this->logLevel = $logLevel;
        return $this;
    }
    /**
     * Server 日志精度，是否带微秒
     * @var bool
     */
    protected $logDateWithMicroseconds;
    /**
     * Get server 日志精度，是否带微秒
     * @return  bool
     */ 
    public function getLogDateWithMicroseconds()
    {
        return $this->logDateWithMicroseconds;
    }
    /**
     * Set server 日志精度，是否带微秒
     * @param  bool  $logDateWithMicroseconds  Server 日志精度，是否带微秒
     * @return  $this
     */ 
    public function setLogDateWithMicroseconds(bool $logDateWithMicroseconds)
    {
        $this->logDateWithMicroseconds = $logDateWithMicroseconds;
        return $this;
    }
    /**
     * 设置 Server 日志分割
     * @var int
     */
    protected $logRotation;
    /**
     * Get 设置 Server 日志分割
     * @return  int
     */ 
    public function getLogRotation()
    {
        return $this->logRotation;
    }
    /**
     * Set 设置 Server 日志分割
     * @param  int  $logRotation  设置 Server 日志分割
     * @return  $this
     */ 
    public function setLogRotation(int $logRotation)
    {
        $this->logRotation = $logRotation;
        return $this;
    }
    /**
     * Server 日志时间格式
     */
    protected $logDateFormat;
    /**
     * Get server 日志时间格式
     */ 
    public function getLogDateFormat()
    {
        return $this->logDateFormat;
    }
    /**
     * Set server 日志时间格式
     * @return  $this
     */ 
    public function setLogDateFormat($logDateFormat)
    {
        $this->logDateFormat = $logDateFormat;
        return $this;
    }
    /**
     * Keep-Alive 检测死连接
     * @var bool
     */
    protected $openTcpKeepalive;
    /**
     * Get keep-Alive 检测死连接
     * @return  bool
     */ 
    public function getOpenTcpKeepalive()
    {
        return $this->openTcpKeepalive;
    }
    /**
     * Set keep-Alive 检测死连接
     * @param  bool  $openTcpKeepalive  Keep-Alive 检测死连接
     * @return  $this
     */ 
    public function setOpenTcpKeepalive(bool $openTcpKeepalive)
    {
        $this->openTcpKeepalive = $openTcpKeepalive;
        return $this;
    }
    /**
     * 启用心跳检测
     * @var bool
     */
    protected $heartbeatCheckInterval;
    /**
     * Get 启用心跳检测
     * @return  bool
     */ 
    public function getHeartbeatCheckInterval()
    {
        return $this->heartbeatCheckInterval;
    }
    /**
     * Set 启用心跳检测
     * @param  bool  $heartbeatCheckInterval  启用心跳检测
     * @return  $this
     */ 
    public function setHeartbeatCheckInterval(bool $heartbeatCheckInterval)
    {
        $this->heartbeatCheckInterval = $heartbeatCheckInterval;
        return $this;
    }
    /**
     * 连接最大允许空闲的时间
     * @var int
     */
    protected $heartbeatIdleTime;
    /**
     * Get 连接最大允许空闲的时间
     * @return  int
     */ 
    public function getHeartbeatIdleTime()
    {
        return $this->heartbeatIdleTime;
    }
    /**
     * Set 连接最大允许空闲的时间
     * @param  int  $heartbeatIdleTime  连接最大允许空闲的时间
     * @return  $this
     */ 
    public function setHeartbeatIdleTime(int $heartbeatIdleTime)
    {
        $this->heartbeatIdleTime = $heartbeatIdleTime;
        return $this;
    }
    /**
     * 打开EOF检测
     * @var bool
     */
    protected $openEofCheck;
    /**
     * Get 打开EOF检测
     * @return  bool
     */ 
    public function getOpenEofCheck()
    {
        return $this->openEofCheck;
    }
    /**
     * Set 打开EOF检测
     * @param  bool  $openEofCheck  打开EOF检测
     * @return  $this
     */ 
    public function setOpenEofCheck(bool $openEofCheck)
    {
        $this->openEofCheck = $openEofCheck;
        return $this;
    }
    /**
     * 启用 EOF 自动分包
     * @var bool
     */
    protected $openEofSplit;
    /**
     * Get 启用 EOF 自动分包
     * @return  bool
     */ 
    public function getOpenEofSplit()
    {
        return $this->openEofSplit;
    }
    /**
     * Set 启用 EOF 自动分包
     * @param  bool  $openEofSplit  启用 EOF 自动分包
     * @return  $this
     */ 
    public function setOpenEofSplit(bool $openEofSplit)
    {
        $this->openEofSplit = $openEofSplit;
        return $this;
    }
    /**
     * 设置 EOF 字符串
     * @var string
     */
    protected $packageEof;
    /**
     * Get 设置 EOF 字符串
     * @return  string
     */ 
    public function getPackageEof()
    {
        return $this->packageEof;
    }
    /**
     * Set 设置 EOF 字符串
     * @param  string  $packageEof  设置 EOF 字符串
     * @return  $this
     */ 
    public function setPackageEof(string $packageEof)
    {
        $this->packageEof = $packageEof;
        return $this;
    }
    /**
     * 打开包长检测特性
     * @var bool
     */
    protected $openLengthCheck;
    /**
     * Get 打开包长检测特性
     * @return  bool
     */ 
    public function getOpenLengthCheck()
    {
        return $this->openLengthCheck;
    }
    /**
     * Set 打开包长检测特性
     * @param  bool  $openLengthCheck  打开包长检测特性
     * @return  $this
     */ 
    public function setOpenLengthCheck(bool $openLengthCheck)
    {
        $this->openLengthCheck = $openLengthCheck;
        return $this;
    }
    /**
     * 长度值的类型
     * @var string
     */
    protected $packageLengthType;
    /**
     * Get 长度值的类型
     * @return  string
     */ 
    public function getPackageLengthType()
    {
        return $this->packageLengthType;
    }
    /**
     * Set 长度值的类型
     * @param  string  $packageLengthType  长度值的类型
     * @return  $this
     */ 
    public function setPackageLengthType(string $packageLengthType)
    {
        $this->packageLengthType = $packageLengthType;
        return $this;
    }
    /**
     * 自定义长度解析函数
     * @var callable
     */
    protected $packageLengthFunc;
    /**
     * Get 自定义长度解析函数
     * @return  callable
     */ 
    public function getPackageLengthFunc()
    {
        return $this->packageLengthFunc;
    }
    /**
     * Set 自定义长度解析函数
     * @param  callable  $packageLengthFunc  自定义长度解析函数
     * @return  $this
     */ 
    public function setPackageLengthFunc(callable $packageLengthFunc)
    {
        $this->packageLengthFunc = $packageLengthFunc;
        return $this;
    }
    /**
     * 设置最大数据包尺寸，单位为字节
     * @var int
     */
    protected $packageMaxLength;
    /**
     * Get 设置最大数据包尺寸，单位为字节
     * @return  int
     */ 
    public function getPackageMaxLength()
    {
        return $this->packageMaxLength;
    }
    /**
     * Set 设置最大数据包尺寸，单位为字节
     * @param  int  $packageMaxLength  设置最大数据包尺寸，单位为字节
     * @return  $this
     */ 
    public function setPackageMaxLength(int $packageMaxLength)
    {
        $this->packageMaxLength = $packageMaxLength;
        return $this;
    }
    /**
     * 启用 HTTP 协议处理
     * @var bool
     */
    protected $openHttpProtocol;
    /**
     * Get 启用 HTTP 协议处理
     * @return  bool
     */ 
    public function getOpenHttpProtocol()
    {
        return $this->openHttpProtocol;
    }
    /**
     * Set 启用 HTTP 协议处理
     * @param  bool  $openHttpProtocol  启用 HTTP 协议处理
     * @return  $this
     */ 
    public function setOpenHttpProtocol(bool $openHttpProtocol)
    {
        $this->openHttpProtocol = $openHttpProtocol;
        return $this;
    }
    /**
     * 启用 MQTT 协议处理
     * @var bool
     */
    protected $openMqttProtocol;
    /**
     * Get 启用 MQTT 协议处理
     * @return  bool
     */ 
    public function getOpenMqttProtocol()
    {
        return $this->openMqttProtocol;
    }
    /**
     * Set 启用 MQTT 协议处理
     * @param  bool  $openMqttProtocol  启用 MQTT 协议处理
     * @return  $this
     */ 
    public function setOpenMqttProtocol(bool $openMqttProtocol)
    {
        $this->openMqttProtocol = $openMqttProtocol;
        return $this;
    }
    /**
     * 启用 Redis 协议处理
     * @var bool
     */
    protected $openRedisProtocol;
    /**
     * Get 启用 Redis 协议处理
     * @return  bool
     */ 
    public function getOpenRedisProtocol()
    {
        return $this->openRedisProtocol;
    }
    /**
     * Set 启用 Redis 协议处理
     * @param  bool  $openRedisProtocol  启用 Redis 协议处理
     * @return  $this
     */ 
    public function setOpenRedisProtocol(bool $openRedisProtocol)
    {
        $this->openRedisProtocol = $openRedisProtocol;
        return $this;
    }
    /**
     * 启用 WebSocket 协议处理
     * @var bool
     */
    protected $openWebsocketProtocol;
    /**
     * Get 启用 WebSocket 协议处理
     * @return  bool
     */ 
    public function getOpenWebsocketProtocol()
    {
        return $this->openWebsocketProtocol;
    }
    /**
     * Set 启用 WebSocket 协议处理
     * @param  bool  $openWebsocketProtocol  启用 WebSocket 协议处理
     * @return  $this
     */ 
    public function setOpenWebsocketProtocol(bool $openWebsocketProtocol)
    {
        $this->openWebsocketProtocol = $openWebsocketProtocol;
        return $this;
    }
    /**
     * 启用 websocket 协议中关闭帧
     * @var bool
     */
    protected $openWebsocketClose;
    /**
     * Get 启用 websocket 协议中关闭帧
     * @return  bool
     */ 
    public function getOpenWebsocketClose()
    {
        return $this->openWebsocketClose;
    }
    /**
     * Set 启用 websocket 协议中关闭帧
     * @param  bool  $openWebsocketClose  启用 websocket 协议中关闭帧
     * @return  $this
     */ 
    public function setOpenWebsocketClose(bool $openWebsocketClose)
    {
        $this->openWebsocketClose = $openWebsocketClose;
        return $this;
    }
    /**
     * 启用 open_tcp_nodelay
     * @var bool
     */
    protected $openTcpNodelay;
    /**
     * Get 启用 open_tcp_nodelay
     * @return  bool
     */ 
    public function getOpenTcpNodelay()
    {
        return $this->openTcpNodelay;
    }
    /**
     * Set 启用 open_tcp_nodelay
     * @param  bool  $openTcpNodelay  启用 open_tcp_nodelay
     * @return  $this
     */ 
    public function setOpenTcpNodelay(bool $openTcpNodelay)
    {
        $this->openTcpNodelay = $openTcpNodelay;
        return $this;
    }
    /**
     * 启用 CPU 亲和性设置
     * @var bool
     */
    protected $openCpuAffinity;
    /**
     * Get 启用 CPU 亲和性设置
     * @return  bool
     */ 
    public function getOpenCpuAffinity()
    {
        return $this->openCpuAffinity;
    }
    /**
     * Set 启用 CPU 亲和性设置
     * @param  bool  $openCpuAffinity  启用 CPU 亲和性设置
     * @return  $this
     */ 
    public function setOpenCpuAffinity(bool $openCpuAffinity)
    {
        $this->openCpuAffinity = $openCpuAffinity;
        return $this;
    }
     /**
     * 不使用的CPU数
     * @var array
     */
    protected $cpuAffinityIgnore;
    /**
     * Get 不使用的CPU数
     * @return  array
     */ 
    public function getCpuAffinityIgnore()
    {
        return $this->cpuAffinityIgnore;
    }
    /**
     * Set 不使用的CPU数
     * @param  array  $cpuAffinityIgnore  不使用的CPU数
     * @return  $this
     */ 
    public function setCpuAffinityIgnore(array $cpuAffinityIgnore)
    {
        $this->cpuAffinityIgnore = $cpuAffinityIgnore;
        return $this;
    }
    /**
     * 启用 tcp_defer_accept 特性
     * @var bool
     */
    protected $tcpDeferAccept;
    /**
     * Get 启用 tcp_defer_accept 特性
     * @return  bool
     */ 
    public function getTcpDeferAccept()
    {
        return $this->tcpDeferAccept;
    }
    /**
     * Set 启用 tcp_defer_accept 特性
     * @param  bool  $tcpDeferAccept  启用 tcp_defer_accept 特性
     * @return  $this
     */ 
    public function setTcpDeferAccept(bool $tcpDeferAccept)
    {
        $this->tcpDeferAccept = $tcpDeferAccept;
        return $this;
    }
    /**
     * cert 证书路径
     * @var string
     */
    protected $sslCartFile;
    /**
     * Get cert 证书路径
     * @return  string
     */ 
    public function getSslCartFile()
    {
        return $this->sslCartFile;
    }
    /**
     * Set cert 证书路径
     * @param  string  $sslCartFile  cert 证书路径
     * @return  $this
     */ 
    public function setSslCartFile(string $sslCartFile)
    {
        $this->sslCartFile = $sslCartFile;
        return $this;
    }
    /**
     * key 私钥的路径
     * @var string
     */
    protected $sslKeyFile;
    /**
     * Get key 私钥的路径
     * @return  string
     */ 
    public function getSslKeyFile()
    {
        return $this->sslKeyFile;
    }
    /**
     * Set key 私钥的路径
     * @param  string  $sslKeyFile  key 私钥的路径
     * @return  $this
     */ 
    public function setSslKeyFile(string $sslKeyFile)
    {
        $this->sslKeyFile = $sslKeyFile;
        return $this;
    }
    /**
     * OpenSSL 隧道加密的协议
     * @var int
     */
    protected $sslProtocols;
    /**
     * Get openSSL 隧道加密的协议
     * @return  int
     */ 
    public function getSslProtocols()
    {
        return $this->sslProtocols;
    }
    /**
     * Set openSSL 隧道加密的协议
     * @param  int  $sslProtocols  OpenSSL 隧道加密的协议
     * @return  $this
     */ 
    public function setSslProtocols(int $sslProtocols)
    {
        $this->sslProtocols = $sslProtocols;
        return $this;
    }
    /**
     * 设置 SNI (Server Name Identification) 证书
     * @var array
     */
    protected $sslSniCerts;
    /**
     * Get 设置 SNI (Server Name Identification) 证书
     * @return  array
     */ 
    public function getSslSniCerts()
    {
        return $this->sslSniCerts;
    }
    /**
     * Set 设置 SNI (Server Name Identification) 证书
     * @param  array  $sslSniCerts  设置 SNI (Server Name Identification) 证书
     * @return  $this
     */ 
    public function setSslSniCerts(array $sslSniCerts)
    {
        $this->sslSniCerts = $sslSniCerts;
        return $this;
    }
    /**
     * 设置 openssl 加密算法
     * @var string
     */
    protected $sslCiphers;
    /**
     * Get 设置 openssl 加密算法
     * @return  string
     */ 
    public function getSslCiphers()
    {
        return $this->sslCiphers;
    }
    /**
     * Set 设置 openssl 加密算法
     * @param  string  $sslCiphers  设置 openssl 加密算法
     * @return  $this
     */ 
    public function setSslCiphers(string $sslCiphers)
    {
        $this->sslCiphers = $sslCiphers;
        return $this;
    }
    /**
     * 服务 SSL 设置验证对端证书
     * @var bool
     */
    protected $sslVerifyPeer;
    /**
     * Get 服务 SSL 设置验证对端证书
     * @return  bool
     */ 
    public function getSslVerifyPeer()
    {
        return $this->sslVerifyPeer;
    }
    /**
     * Set 服务 SSL 设置验证对端证书
     * @param  bool  $sslVerifyPeer  服务 SSL 设置验证对端证书
     * @return  $this
     */ 
    public function setSslVerifyPeer(bool $sslVerifyPeer)
    {
        $this->sslVerifyPeer = $sslVerifyPeer;
        return $this;
    }
    /**
     * 允许自签名证书
     * @var bool
     */
    protected $sslAllowSelfSigned;
    /**
     * Get 允许自签名证书
     * @return  bool
     */ 
    public function getSslAllowSelfSigned()
    {
        return $this->sslAllowSelfSigned;
    }
    /**
     * Set 允许自签名证书
     * @param  bool  $sslAllowSelfSigned  允许自签名证书
     * @return  $this
     */ 
    public function setSslAllowSelfSigned(bool $sslAllowSelfSigned)
    {
        $this->sslAllowSelfSigned = $sslAllowSelfSigned;
        return $this;
    }
    /**
     * 根证书，用于验证客户端证书
     * @var string
     */
    protected $sslClientCertFile;
    /**
     * Get 根证书，用于验证客户端证书
     * @return  string
     */ 
    public function getSslClientCertFile()
    {
        return $this->sslClientCertFile;
    }
    /**
     * Set 根证书，用于验证客户端证书
     * @param  string  $sslClientCertFile  根证书，用于验证客户端证书
     * @return  $this
     */ 
    public function setSslClientCertFile(string $sslClientCertFile)
    {
        $this->sslClientCertFile = $sslClientCertFile;
        return $this;
    }
    /**
     * 设置是否启用 SSL/TLS 压缩
     * @var bool
     */
    protected $sslCompress;
    /**
     * Get 设置是否启用 SSL/TLS 压缩
     * @return  bool
     */ 
    public function getSslCompress()
    {
        return $this->sslCompress;
    }
    /**
     * Set 设置是否启用 SSL/TLS 压缩
     * @param  bool  $sslCompress  设置是否启用 SSL/TLS 压缩
     * @return  $this
     */ 
    public function setSslCompress(bool $sslCompress)
    {
        $this->sslCompress = $sslCompress;
        return $this;
    }
    /**
     * 证书链条层次
     * @var int
     */
    protected $sslVerifyDepth;
    /**
     * Get 证书链条层次
     * @return  int
     */ 
    public function getSslVerifyDepth()
    {
        return $this->sslVerifyDepth;
    }
    /**
     * Set 证书链条层次
     * @param  int  $sslVerifyDepth  证书链条层次
     * @return  $this
     */ 
    public function setSslVerifyDepth(int $sslVerifyDepth)
    {
        $this->sslVerifyDepth = $sslVerifyDepth;
        return $this;
    }
    /**
     * 启用服务器端保护，防止 BEAST 攻击
     * @var bool
     */
    protected $sslPreferServerCiphers;
    /**
     * Get 启用服务器端保护，防止 BEAST 攻击
     * @return  bool
     */ 
    public function getSslPreferServerCiphers()
    {
        return $this->sslPreferServerCiphers;
    }
    /**
     * Set 启用服务器端保护，防止 BEAST 攻击
     * @param  bool  $sslPreferServerCiphers  启用服务器端保护，防止 BEAST 攻击
     * @return  $this
     */ 
    public function setSslPreferServerCiphers(bool $sslPreferServerCiphers)
    {
        $this->sslPreferServerCiphers = $sslPreferServerCiphers;
        return $this;
    }
    /**
     * 指定 DHE 密码器的 Diffie-Hellman 参数
     * @var string
     */
    protected $sslDhparam;
    /**
     * Get 指定 DHE 密码器的 Diffie-Hellman 参数
     * @return  string
     */ 
    public function getSslDhparam()
    {
        return $this->sslDhparam;
    }
    /**
     * Set 指定 DHE 密码器的 Diffie-Hellman 参数
     * @param  string  $sslDhparam  指定 DHE 密码器的 Diffie-Hellman 参数
     * @return  $this
     */ 
    public function setSslDhparam(string $sslDhparam)
    {
        $this->sslDhparam = $sslDhparam;
        return $this;
    }
    /**
     * 指定用在 ECDH 密钥交换中的 curve
     * @var string
     */
    protected $sslEcdhCurve;
    /**
     * Get 指定用在 ECDH 密钥交换中的 curve
     * @return  string
     */ 
    public function getSslEcdhCurve()
    {
        return $this->sslEcdhCurve;
    }
    /**
     * Set 指定用在 ECDH 密钥交换中的 curve
     * @param  string  $sslEcdhCurve  指定用在 ECDH 密钥交换中的 curve
     * @return  $this
     */ 
    public function setSslEcdhCurve(string $sslEcdhCurve)
    {
        $this->sslEcdhCurve = $sslEcdhCurve;
        return $this;
    }
    /**
     * 设置 Worker/TaskWorker 子进程的所属用户
     * @var string
     */
    protected $user;
    /**
     * Get 设置 Worker/TaskWorker 子进程的所属用户
     * @return  string
     */ 
    public function getUser()
    {
        return $this->user;
    }
    /**
     * Set 设置 Worker/TaskWorker 子进程的所属用户
     * @param  string  $user  设置 Worker/TaskWorker 子进程的所属用户
     * @return  $this
     */ 
    public function setUser(string $user)
    {
        $this->user = $user;
        return $this;
    }
    /**
     * 设置 Worker/TaskWorker 子进程的进程用户组
     * @var string
     */
    protected $group;
    /**
     * Get 设置 Worker/TaskWorker 子进程的进程用户组
     * @return  string
     */ 
    public function getGroup()
    {
        return $this->group;
    }
    /**
     * Set 设置 Worker/TaskWorker 子进程的进程用户组
     * @param  string  $group  设置 Worker/TaskWorker 子进程的进程用户组
     * @return  $this
     */ 
    public function setGroup(string $group)
    {
        $this->group = $group;
        return $this;
    }
    /**
     * 重定向 Worker 进程的文件系统根目录
     * @var string
     */
    protected $chroot;
    /**
     * Get 重定向 Worker 进程的文件系统根目录
     * @return  string
     */ 
    public function getChroot()
    {
        return $this->chroot;
    }
    /**
     * Set 重定向 Worker 进程的文件系统根目录
     * @param  string  $chroot  重定向 Worker 进程的文件系统根目录
     * @return  $this
     */ 
    public function setChroot(string $chroot)
    {
        $this->chroot = $chroot;
        return $this;
    }
    /**
     * 设置 pid 文件地址
     * @var string
     */
    protected $pidFile;
    /**
     * Get 设置 pid 文件地址
     * @return  string
     */ 
    public function getPidFile()
    {
        return $this->pidFile;
    }
    /**
     * Set 设置 pid 文件地址
     * @param  string  $pidFile  设置 pid 文件地址
     * @return  $this
     */ 
    public function setPidFile(string $pidFile)
    {
        $this->pidFile = $pidFile;
        return $this;
    }
    /**
     * 接收输入缓存区内存尺寸
     * @var int
     */
    protected $bufferInputSize;
    /**
     * Get 接收输入缓存区内存尺寸
     * @return  int
     */ 
    public function getBufferInputSize()
    {
        return $this->bufferInputSize;
    }
    /**
     * Set 接收输入缓存区内存尺寸
     * @param  int  $bufferInputSize  接收输入缓存区内存尺寸
     * @return  $this
     */ 
    public function setBufferInputSize(int $bufferInputSize)
    {
        $this->bufferInputSize = $bufferInputSize;
        return $this;
    }
    /**
     * 发送输出缓存区内存尺寸
     * @var int
     */
    protected $bufferOutputSize;
    /**
     * Get 发送输出缓存区内存尺寸
     * @return  int
     */ 
    public function getBufferOutputSize()
    {
        return $this->bufferOutputSize;
    }
    /**
     * Set 发送输出缓存区内存尺寸
     * @param  int  $bufferOutputSize  发送输出缓存区内存尺寸
     * @return  $this
     */ 
    public function setBufferOutputSize(int $bufferOutputSize)
    {
        $this->bufferOutputSize = $bufferOutputSize;
        return $this;
    }
    /**
     * 客户端连接的缓存区长度
     * @var int
     */
    protected $socketBufferSize;
    /**
     * Get 客户端连接的缓存区长度
     * @return  int
     */ 
    public function getSocketBufferSize()
    {
        return $this->socketBufferSize;
    }
    /**
     * Set 客户端连接的缓存区长度
     * @param  int  $socketBufferSize  客户端连接的缓存区长度
     * @return  $this
     */ 
    public function setSocketBufferSize(int $socketBufferSize)
    {
        $this->socketBufferSize = $socketBufferSize;
        return $this;
    }
    /**
     * 启用 onConnect/onClose 事件
     * @var bool
     */
    protected $enableUnsafeEvent;
    /**
     * Get 启用 onConnect/onClose 事件
     * @return  bool
     */ 
    public function getEnableUnsafeEvent()
    {
        return $this->enableUnsafeEvent;
    }
    /**
     * Set 启用 onConnect/onClose 事件
     * @param  bool  $enableUnsafeEvent  启用 onConnect/onClose 事件
     * @return  $this
     */ 
    public function setEnableUnsafeEvent(bool $enableUnsafeEvent)
    {
        $this->enableUnsafeEvent = $enableUnsafeEvent;
        return $this;
    }
    /**
     * 丢弃已关闭链接的数据请求
     * @var bool
     */
    protected $discardTimeoutRequest;
    /**
     * Get 丢弃已关闭链接的数据请求
     * @return  bool
     */ 
    public function getDiscardTimeoutRequest()
    {
        return $this->discardTimeoutRequest;
    }
    /**
     * Set 丢弃已关闭链接的数据请求
     * @param  bool  $discardTimeoutRequest  丢弃已关闭链接的数据请求
     * @return  $this
     */ 
    public function setDiscardTimeoutRequest(bool $discardTimeoutRequest)
    {
        $this->discardTimeoutRequest = $discardTimeoutRequest;
        return $this;
    }
    /**
     * 端口重用
     * @var bool
     */
    protected $enableReusePort;
    /**
     * Get 端口重用
     * @return  bool
     */ 
    public function getEnableReusePort()
    {
        return $this->enableReusePort;
    }
    /**
     * Set 端口重用
     * @param  bool  $enableReusePort  端口重用
     * @return  $this
     */ 
    public function setEnableReusePort(bool $enableReusePort)
    {
        $this->enableReusePort = $enableReusePort;
        return $this;
    }
    /**
     * accept 客户端连接后将不会自动加入 EventLoop
     * @var bool
     */
    protected $enableDelayReceive;
    /**
     * Get accept 客户端连接后将不会自动加入 EventLoop
     * @return  bool
     */ 
    public function getEnableDelayReceive()
    {
        return $this->enableDelayReceive;
    }
    /**
     * Set accept 客户端连接后将不会自动加入 EventLoop
     * @param  bool  $enableDelayReceive  accept 客户端连接后将不会自动加入 EventLoop
     * @return  $this
     */ 
    public function setEnableDelayReceive(bool $enableDelayReceive)
    {
        $this->enableDelayReceive = $enableDelayReceive;
        return $this;
    }
    /**
     * 异步重启开关
     * @var bool
     */
    protected $reloadAsync;
    /**
     * Get 异步重启开关
     * @return  bool
     */ 
    public function getReloadAsync()
    {
        return $this->reloadAsync;
    }
    /**
     * Set 异步重启开关
     * @param  bool  $reloadAsync  异步重启开关
     * @return  $this
     */ 
    public function setReloadAsync(bool $reloadAsync)
    {
        $this->reloadAsync = $reloadAsync;
        return $this;
    }
    /**
     * 设置 Worker 进程收到停止服务通知后最大等待时间
     * @var int
     */
    protected $maxWaitTime;
    /**
     * Get 设置 Worker 进程收到停止服务通知后最大等待时间
     * @return  int
     */ 
    public function getMaxWaitTime()
    {
        return $this->maxWaitTime;
    }
    /**
     * Set 设置 Worker 进程收到停止服务通知后最大等待时间
     * @param  int  $maxWaitTime  设置 Worker 进程收到停止服务通知后最大等待时间
     * @return  $this
     */ 
    public function setMaxWaitTime(int $maxWaitTime)
    {
        $this->maxWaitTime = $maxWaitTime;
        return $this;
    }
    /**
     * 开启 TCP 快速握手特性
     * @var bool
     */
    protected $tcpFastopen;
    /**
     * Get 开启 TCP 快速握手特性
     * @return  bool
     */ 
    public function getTcpFastopen()
    {
        return $this->tcpFastopen;
    }
    /**
     * Set 开启 TCP 快速握手特性
     * @param  bool  $tcpFastopen  开启 TCP 快速握手特性
     * @return  $this
     */ 
    public function setTcpFastopen(bool $tcpFastopen)
    {
        $this->tcpFastopen = $tcpFastopen;
        return $this;
    }
    /**
     * 是否启用异步风格服务器的协程支持
     * @var bool
     */
    protected $enableCoroutine;
    /**
     * Get 是否启用异步风格服务器的协程支持
     * @return  bool
     */ 
    public function getEnableCoroutine()
    {
        return $this->enableCoroutine;
    }
    /**
     * Set 是否启用异步风格服务器的协程支持
     * @param  bool  $enableCoroutine  是否启用异步风格服务器的协程支持
     * @return  $this
     */ 
    public function setEnableCoroutine(bool $enableCoroutine)
    {
        $this->enableCoroutine = $enableCoroutine;
        return $this;
    }
    /**
     * 设置当前工作进程最大协程数量
     * @var int
     */
    protected $maxCoroutine;
    /**
     * Get 设置当前工作进程最大协程数量
     * @return  int
     */ 
    public function getMaxCoroutine()
    {
        return $this->maxCoroutine;
    }
    /**
     * Set 设置当前工作进程最大协程数量
     * @param  int  $maxCoroutine  设置当前工作进程最大协程数量
     * @return  $this
     */ 
    public function setMaxCoroutine(int $maxCoroutine)
    {
        $this->maxCoroutine = $maxCoroutine;
        return $this;
    }
    /**
     * @var bool
     */
    protected $sendYield;
    /**
     * Get sendYield
     * @return  bool
     */ 
    public function getSendYield()
    {
        return $this->sendYield;
    }
    /**
     * Set sendYield
     * @param  bool  $sendYield
     * @return  $this
     */ 
    public function setSendYield(bool $sendYield)
    {
        $this->sendYield = $sendYield;
        return $this;
    }
    /**
     * 发送超时时间
     * @var float
     */
    protected $sendTimeout;
    /**
     * Get 发送超时时间
     * @return  float
     */ 
    public function getSendTimeout()
    {
        return $this->sendTimeout;
    }
    /**
     * Set 发送超时时间
     * @param  float  $sendTimeout  发送超时时间
     * @return  $this
     */ 
    public function setSendTimeout(float $sendTimeout)
    {
        $this->sendTimeout = $sendTimeout;
        return $this;
    }
     /**
     * 设置一键协程化 Hook 的函数范围
     * @var int
     */
    protected $hookFlags;
    /**
     * Get 设置一键协程化 Hook 的函数范围
     * @return  int
     */ 
    public function getHookFlags()
    {
        return $this->hookFlags;
    }
    /**
     * Set 设置一键协程化 Hook 的函数范围
     * @param  int  $hookFlags  设置一键协程化 Hook 的函数范围
     * @return  $this
     */ 
    public function setHookFlags(int $hookFlags)
    {
        $this->hookFlags = $hookFlags;
        return $this;
    }
    /**
     * 缓存区高水位线，单位为字节
     * @var int
     */
    protected $bufferHighWatermark;
    /**
     * Get 缓存区高水位线，单位为字节
     * @return  int
     */ 
    public function getBufferHighWatermark()
    {
        return $this->bufferHighWatermark;
    }
    /**
     * Set 缓存区高水位线，单位为字节
     * @param  int  $bufferHighWatermark  缓存区高水位线，单位为字节
     * @return  $this
     */ 
    public function setBufferHighWatermark(int $bufferHighWatermark)
    {
        $this->bufferHighWatermark = $bufferHighWatermark;
        return $this;
    }
    /**
     * 缓存区低水位线，单位为字节
     * @var int
     */
    protected $bufferLowWatermark;
    /**
     * Get 缓存区低水位线，单位为字节
     * @return  int
     */ 
    public function getBufferLowWatermark()
    {
        return $this->bufferLowWatermark;
    }
    /**
     * Set 缓存区低水位线，单位为字节
     * @param  int  $bufferLowWatermark  缓存区低水位线，单位为字节
     * @return  $this
     */ 
    public function setBufferLowWatermark(int $bufferLowWatermark)
    {
        $this->bufferLowWatermark = $bufferLowWatermark;
        return $this;
    }
    /**
     * 数据包被发送后未接收到 ACK 确认的最大时长
     * @var int
     */
    protected $tcpUserTimeout;
    /**
     * Get 数据包被发送后未接收到 ACK 确认的最大时长
     * @return  int
     */ 
    public function getTcpUserTimeout()
    {
        return $this->tcpUserTimeout;
    }
    /**
     * Set 数据包被发送后未接收到 ACK 确认的最大时长
     * @param  int  $tcpUserTimeout  数据包被发送后未接收到 ACK 确认的最大时长
     * @return  $this
     */ 
    public function setTcpUserTimeout(int $tcpUserTimeout)
    {
        $this->tcpUserTimeout = $tcpUserTimeout;
        return $this;
    }
    /**
     * stats() 内容写入的文件路径
     * @var string
     */
    protected $statsFile;
    /**
     * Get stats() 内容写入的文件路径
     * @return  string
     */ 
    public function getStatsFile()
    {
        return $this->statsFile;
    }
    /**
     * Set stats() 内容写入的文件路径
     * @param  string  $statsFile  stats() 内容写入的文件路径
     * @return  $this
     */ 
    public function setStatsFile(string $statsFile)
    {
        $this->statsFile = $statsFile;
        return $this;
    }
    /**
     * 事件回调将使用对象风格
     * @var bool
     */
    protected $eventObject;
    /**
     * Get 事件回调将使用对象风格
     * @return  bool
     */ 
    public function getEventObject()
    {
        return $this->eventObject;
    }
    /**
     * Set 事件回调将使用对象风格
     * @param  bool  $eventObject  事件回调将使用对象风格
     * @return  $this
     */ 
    public function setEventObject(bool $eventObject)
    {
        $this->eventObject = $eventObject;
        return $this;
    }
    /**
     * 起始 session ID
     * @var int
     */
    protected $startSessionId;
    /**
     * Get 起始 session ID
     * @return  int
     */ 
    public function getStartSessionId()
    {
        return $this->startSessionId;
    }
    /**
     * Set 起始 session ID
     * @param  int  $startSessionId  起始 session ID
     * @return  $this
     */ 
    public function setStartSessionId(int $startSessionId)
    {
        $this->startSessionId = $startSessionId;
        return $this;
    }
    /**
     * 单一线程
     * @var bool
     */
    protected $singleThread;
    /**
     * Get 单一线程
     * @return  bool
     */ 
    public function getSingleThread()
    {
        return $this->singleThread;
    }
    /**
     * Set 单一线程
     * @param  bool  $singleThread  单一线程
     * @return  $this
     */ 
    public function setSingleThread(bool $singleThread)
    {
        $this->singleThread = $singleThread;
        return $this;
    }
    /**
     * 接收缓冲区的最大队列长度
     * @var int
     */
    protected $maxQueuedBytes;
    /**
     * Get 接收缓冲区的最大队列长度
     * @return  int
     */ 
    public function getMaxQueuedBytes()
    {
        return $this->maxQueuedBytes;
    }
    /**
     * Set 接收缓冲区的最大队列长度
     * @param  int  $maxQueuedBytes  接收缓冲区的最大队列长度
     * @return  $this
     */ 
    public function setMaxQueuedBytes(int $maxQueuedBytes)
    {
        $this->maxQueuedBytes = $maxQueuedBytes;
        return $this;
    }
    /***
     * 监听的 ip 地址
     * @var string
     */
    protected $host;
    /**
     * Get 监听的 ip 地址
     * @return  string
     */ 
    public function getHost()
    {
        return $this->host;
    }
    /**
     * Set 监听的 ip 地址
     * @param  string  $host  监听的 ip 地址
     * @return  $this
     */ 
    public function setHost(string $host)
    {
        $this->host = $host;
        return $this;
    }
    /**
     * 监听的端口
     * @var int
     */
    protected $port;
    /**
     * Get 监听的端口
     * @return  int
     */ 
    public function getPort()
    {
        return $this->port;
    }
    /**
     * Set 监听的端口
     * @param  int  $port  监听的端口
     * @return  $this
     */ 
    public function setPort(int $port)
    {
        $this->port = $port;
        return $this;
    }
    /**
     * 运行模式
     * @var int
     */
    protected $mode;
    /**
     * Get 运行模式
     * @return  int
     */ 
    public function getMode()
    {
        return $this->mode;
    }
    /**
     * Set 运行模式
     * @param  int  $mode  运行模式
     * @return  $this
     */ 
    public function setMode(int $mode)
    {
        $this->mode = $mode;
        return $this;
    }
    /**
     * Server 的类型
     * @var int
     */
    protected $sockType;
    /**
     * Get server 的类型
     * @return  int
     */ 
    public function getSockType()
    {
        return $this->sockType;
    }
    /**
     * Set server 的类型
     * @param  int  $sockType  Server 的类型
     * @return  $this
     */ 
    public function setSockType(int $sockType)
    {
        $this->sockType = $sockType;
        return $this;
    }
    /**
     * 事件类名(包扩命名空间)
     * @var string
     */
    protected $eventClass;
    /**
     * Get  事件类名(包扩命名空间)
     * @return  string
     */
    public function getEventClass()
    {
        return $this->eventClass;
    }
    /**
     * Set 事件类
     * @param   string  $eventClass     事件类名(包扩命名空间)
     * @return self
     */
    public function setEventClass(string $eventClass)
    {
        $this->eventClass = $eventClass;
        return $this;
    }
    /**
     * WebSocket 服务器自定义握手
     * @var bool
     */
    protected $websocketHandshake;
    /**
     * Set WebSocket 服务器自定义握手
     * @param   bool    $websocketHandshake
     * @return self
     */
    public function setWebsocketHandshake($websocketHandshake)
    {
        $this->websocketHandshake = $websocketHandshake;
        return $this;
    }
    /**
     * Get  WebSocket 服务器自定义握手
     * @return  bool
     */
    public function getWebsocketHandshake()
    {
        return $this->websocketHandshake;
    }
    /**
     * 开启文件监控
     * @var bool
     */
    protected $fileMonitor;
    /**
     * Set 开启文件监控
     * @param   bool    $fileMoniotr
     * @return $this
     */
    public function setFileMoniotr($fileMoniotr)
    {
        $this->fileMonitor = $fileMoniotr;
        return $this;
    }
    /**
     * Get 开启文件监控
     * @return bool
     */
    public function getFileMoniotr()
    {
        return $this->fileMonitor;
    }
    /**
     * 监控文件列表
     * @var array
     */
    protected $fileList;
    /**
     * Set 监控文件列表
     * @param   array   $fileList
     * @return  $this
     */
    public function setFileList($fileList)
    {
        $this->fileList = $fileList;
        return $this;
    }
    /**
     * Get  监控文件列表
     * @return array
     */
    public function getFileList()
    {
        return $this->fileList;
    }
    /**
     * 获取配置
     * @return array
     */
    public function getConfig()
    {
        // 忽略的属性
        $ignore = ['host','port','mode','sockeType','eventClass','websocketHandshake','fileMonitor','fileList'];
        $config = [];
        foreach($this as $k => $v) {
            if (!in_array($k, $ignore) && $v !== null) {
                $config[$this->hump2underline($k)] = $v;
            }
        }
        return $config;
    }
    /**
     * 设置配置
     * @param array $config
     * @return self
     */
    public function setConfig(array $config)
    {
        foreach($config as $k => $v) {
            $k = $this->underline2hump($k);
            if (property_exists($this, $k)) $this->$k = $v;
        }
        return $this;
    }

    /**
     * 驼峰转下划线
     * @param string    $str    要转换的字符串
     * @return string
     */
    private function hump2underline($str)
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1_$2", $str));
    }
    /**
     * 下换线转驼峰
     * @param   string  $str    要转换的字符串
     * @return string
     */
    private function underline2hump($str)
    {
        return preg_replace_callback('/(\_)([a-z])/', function($arr) {
            return strtoupper($arr[2]);
        }, $str);
    }
    
    public function __debugInfo()
    {
        return $this->getConfig();
    }
}
