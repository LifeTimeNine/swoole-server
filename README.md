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
(new \swoole\server\TcpUdp($config))->initServer()->start();
```

如果你想在启动之前做一些其他事情，可以这样操作

```php
<?php
// 创建配置类
$config = new \swoole\Config();
// 设置事件类
$config->setEventClass('TcpUdpEvent');
// 初始化并启动服务器
$server = (new \swoole\server\TcpUdp($config))->initServer();
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
  $server = new \swoole\server\TcpUdp($config);
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
