## Swoole 服务器

swoole-server 对swoole的各类服务器进行一个简单的封装，让使用的时候更加方便。

已对以下服务器进行封装  
* TCP/UDP
* HTTP
* WebSocket
* MQTT

### 配置类 `\swoole\Config`

`\swoole\Config` 包含swoole服务器的所有配置项，详情参考 [配置](https://wiki.swoole.com/#/server/setting)  

**`\swoole\Config` 类有三种使用方法**  
第一种：
```php
$config = new \swoole\Config([
    'host' => '0.0.0.0',
    'port' => 9501,
    'mode' => Options::MODE_PROCESS,
    'sock_type' => Options::SOCK_TYPE_TCP,
]);
$config->setConfig([
  'worker_num' => 1
]);
```
第二种：
```php
$config = new \swoole\Config();
$config->setHost('0.0.0.0')
    ->setPort(9501)
    ->setMode(Options::MODE_PROCESS);
```
第三种：
```php
<?php

class Config extends \swoole\Config
{
    protected $host = '0.0.0.0';
    protected $port = 9501;
    protected $reactorNum = 1;
    protected $workerNum = 4;
}
```
> 参数需要参考[swoole官方文档](https://wiki.swoole.com/#/server/setting)，前两种方法采用下划线命名，第三种类属性需要采用小驼峰命名

### 常量参数类 `\swoole\Options`
`\swoole\Options` 包含了一些常用的swoole常量,比如：运行模式、Server类型、Task 进程与 Worker 进程之间通信的方式等。

### 事件类
所有的事件类都在 `\swoole\event` 命名空间下，每个服务器有相对应的事件类，开发时，可以继承事件类，重写对应的事件；然后在 `Config` 中设置 `event_class` 为事件类的名称，注意，必须包含完整的命名空间。

MQTT 的事件类中 为了不与 swoole 的 `onConnect` 事件冲突，MQTT业务的连接事件为 `onMqttConnect`。
```php
<?php

use swoole\event\Mqtt;

class MqttEvent extends Mqtt
{
    public static function onMqttConnect($server, int $fd, int $reactorId, array $data)
    {
        // 验证客户端信息

        //发送确认包
        $server->send($fd, self::encode([
            'cmd' => MQTT::CONNACK, // CONNACK固定值为2
            'code' => 0, // 连接返回码 0表示连接已被服务端接受
            'session_present' => 0
        ]));
    }
}
```

### 服务器类
所有的服务器类都在 `\swoole\server` 命名空间下  
通过几行代码就可以启动一个服务器：  
```php
<?php

// 创建配置类
$config = new \swoole\Config();
// 设置事件类
$config->setEventClass('TcpUdpEvent');
// 初始化并启动服务器
\swoole\server\TcpUdp::instance($config)->initServer()->start();
```

如果你想在启动之前做一些其他事情，可以这样操作

```php
<?php
// 创建配置类
$config = new \swoole\Config();
// 设置事件类
$config->setEventClass('TcpUdpEvent');
// 初始化服务器
$server = \swoole\server\TcpUdp::instance($config)->initServer();
/**
 * 用户进程实现了广播功能，循环接收unixSocket的消息，并发给服务器的所有连接
 */
$process = new Swoole\Process(function ($process) use ($server) {
    $server = $server->getServer();
    $socket = $process->exportSocket();
    while (true) {
        $msg = $socket->recv();
        foreach ($server->connections as $conn) {
            $server->send($conn, $msg);
        }
    }
}, false, 2, 1);
// 添加一个用户自定义的工作进程
$server->getServer()->addProcess($process);
// 启动服务器
$server->start();
```
> 服务类的 `getServer` 方法会返回 swoole 的 Server 实例，可以进行其他的操作。

如果你不喜欢启动、停止时默认输出的消息的话，你也可以自定义消息。如：
```php
function stop()
{
  // 创建配置类
  $config = new \swoole\Config();
  $server = \swoole\server\TcpUdp::instance($config);
  $masterPid = $server->getMasterPid();
  if (!$server->isRunimg($masterPid)) {
    echo "没有正在运行的服务器\n";
    return;
  }
  \Swoole\Process::kill($master, SIGTERM);
  echo "操作成功\n";
}
```
`getMasterPid` 可以获取服务器管理进程的pid，注意：必须是和启动时相同的配置。  
`isRuning` 可以获取指定服务器的运行状态。

### 文件监控
文件监控需要配置 `Config` 的 `file_moniotr` 和 `file_list` 选项；**文件必须是绝对路径。**
```php
<?php
$config = new \swoole\Config();
$config->setFileMoniotr(true);
$config->setFileList([
    __DIR__ . '/func.php',
]);
```
> 有几点要注意：

>首先要注意新修改的代码必须要在 `OnWorkerStart` 事件中重新载入才会生效，比如某个类在 `OnWorkerStart` 之前就通过 composer 的 autoload 载入了就是不可以的。

>其次 reload 还要配合这两个参数 `max_wait_time` 和 `reload_async`，设置了这两个参数之后就能实现异步安全重启。

## 定时器服务

### 配置
```php
<?php
    $config = [
        'port' => 9503, // 端口
        'task_worker_num' => 1, // 任务工作进程数
        'pid_file' => '', // PID文件地址
        'task_file_path' => '', // 任务列表文件地址
        'log_path' => '', // 日志文件地址
        'daemonize' => false, // 以守护进程的方式运行
        'hit_update' => true, // 热更新
    ];
>
```

### 任务类
任务类继承 `\swoole\extend\abstcats` 抽象类，需要完成 `hanndle` 方法
```php
<?php
namespace timer;

use swoole\extend\abstracts\Timer;

class Test extends Timer
{
    /**
     * 定时任务 秒 分 时 天 月 周
     * @var string
     */
    public $crontab = "*/3 * * * * *";
    /**
     * 是否启用
     * @var boolean
     */
    public $enable = false;

    public function handle()
    {
        // 业务
    }
}
>
```
`crontab` 属性参照 Linux 的 Crontab 配置

> 注意：这里比 Linux 的 Crontab 多了一个秒

### 启动
```php
<?php
swoole\extend\server\Timer::instance([
    'task_file_path' => __DIR__ . "/crontab.php",
    'log_path' => __DIR__ . "/log/timer/",
])->start();
>
```
除了 `start` 之外，还有 `stop`、`reload`和`restart`方法。