<?php

namespace swoole\event;

/**
 * TCPUDP事件类
 * @class   TcpUdp
 */
class TcpUdp
{
    /**
     * swoole 服务器类
     * @var \Swoole\Server;
     */
    public static $server;
    /**
     * 启动后在主进程（master）的主线程回调此函数
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onStart($server) {}
    /**
     * 此事件在 Server 正常结束时发生
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onShutdown($server) {}
    /**
     * 此事件在 Worker 进程 / Task 进程 启动时发生
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $workerId Worker 进程 id
     */
    public static function onWorkerStart($server, int $workerId) {}
    /**
     * 此事件在 Worker 进程终止时发生
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $workerId Worker 进程 id
     */
    public static function onWorkerStop($server, int $workerId) {}
    /**
     * 仅在开启 reload_async 特性后有效
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $workerId Worker 进程 id
     */
    public static function onWorkerExit($server, int $workerId) {}
    /**
     * 有新的连接进入时，在 worker 进程中回调
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $fd 连接的文件描述符
     * @param   int $reactorId 连接所在的 Reactor 线程 ID
     */
    public static function onConnect($server, int $fd, int $reactorId) {}
    /**
     * 接收到数据时回调此函数，发生在 worker 进程中
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $fd 连接的文件描述符
     * @param   int $reactorId 连接所在的 Reactor 线程 ID
     * @param   string $data 收到的数据内容，可能是文本或者二进制内容
     */
    public static function onReceive($server, int $fd, int $reactorId, string $data) {}
    /**
     * 接收到 UDP 数据包时回调此函数，发生在 worker 进程中
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   string $data 收到的数据内容，可能是文本或者二进制内容
     * @param   array $clientInfo 客户端信息包括 address/port/server_socket 等多项客户端信息数据
     */
    public static function onPacket($server, string $data, array $clientInfo) {}
    /**
     * TCP 客户端连接关闭后，在 Worker 进程中回调此函数
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $fd 连接的文件描述符
     * @param   int $reactorId 连接所在的 Reactor 线程 ID
     */
    public static function onClose($server, int $fd, int $reactorId) {}
    /**
     * 在 task 进程内被调用。worker 进程可以使用 task 函数向 task_worker 进程投递新的任务。
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $task_id    执行任务的 task 进程 id
     * @param   int $src_worker_id  投递任务的 worker 进程 id
     * @param   mixed $data 任务的数据内容
     */
    public static function onTask($server, int $task_id, int $src_worker_id, $data) {}
    /**
     * 此回调函数在 worker 进程被调用，当 worker 进程投递的任务在 task 进程中完成时， task 进程会通过 \Swoole\Server->finish() 方法将任务处理的结果发送给 worker 进程
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $task_id    执行任务的 task 进程 id
     * @param   mixed $data 任务的数据内容
     */
    public static function onFinish($server, int $task_id, $data) {}
    /**
     * 当工作进程收到由 $server->sendMessage() 发送的 unixSocket 消息时会触发 onPipeMessage 事件。worker/task 进程都可能会触发 onPipeMessage 事件
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $src_worker_id  消息来自哪个 Worker 进程
     * @param   mixed $message  消息内容，可以是任意 PHP 类型
     */
    public static function onPipeMessage($server, int $src_worker_id, $message) {}
    /**
     * 当 Worker/Task 进程发生异常后会在 Manager 进程内回调此函数
     * @param   \Swoole\Server $server \Swoole\Server 对象
     * @param   int $worker_id  异常 worker 进程的 id
     * @param   int $worker_pid 异常 worker 进程的 pid
     * @param   int $exit_code  退出的状态码，范围是 0～255
     * @param   int $signal 进程退出的信号
     */
    public static function onWorkerError($server, int $worker_id, int $worker_pid, int $exit_code, int $signal) {}
    /**
     * 当管理进程启动时触发此事件
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onManagerStart($server) {}
    /**
     * 当管理进程结束时触发
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onManagerStop($server) {}
    /**
     * Worker 进程 Reload 之前触发此事件，在 Manager 进程中回调
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onBeforeReload($server) {}
    /**
     * Worker 进程 Reload 之后触发此事件，在 Manager 进程中回调
     * @param   \Swoole\Server $server \Swoole\Server 对象
     */
    public static function onAfterReload($server) {}
}