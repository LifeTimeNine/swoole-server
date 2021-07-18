<?php
/*
 * @Description   定时器事件
 * @Author        lifetime
 * @Date          2021-07-17 17:08:20
 * @LastEditTime  2021-07-18 18:37:37
 * @LastEditors   lifetime
 */
namespace swoole\extend\event;

use swoole\event\TcpUdp;
use swoole\Output;

/**
 * 定时器事件
 * @class Timer
 */
class Timer extends TcpUdp
{
    public static function onWorkerStart($server, int $workerId)
    {
        if (!$server->taskworker) {
            $taskFile = require($server->taskFilePath);
            if (is_array($taskFile) && count($taskFile) > 0) {
                $taskList = [];
                foreach($taskFile as $item) {
                    if (!class_exists($item)) continue;
                    $task = new $item;
                    if (!$task->enable) continue;
                    $crontab = preg_split("/(\s+)/", $task->crontab);
                    $taskList[] = [
                        'class' => $item,
                        'second' => self::parseCrontab($crontab[0], 0, 59),
                        'minute' => self::parseCrontab($crontab[1], 0, 59),
                        'hours' => self::parseCrontab($crontab[2], 0, 23),
                        'day' => self::parseCrontab($crontab[3], 1, 31),
                        'month' => self::parseCrontab($crontab[4], 1, 12),
                        'week' => self::parseCrontab($crontab[5], 0, 6)
                    ];
                    unset($task);
                }
                Output::instance()->writeln(count($taskList) . " tasks initialized");
                clearstatcache();
                $lastUpdateTime = filectime($server->taskFilePath);
                $server->tick(1000, function($timeId) use($server, $taskList, $lastUpdateTime) {
                    $time = time();
                    foreach($taskList as $item) {
                        if (
                            in_array(date('s', $time), $item['second']) &&
                            in_array(date('i', $time), $item['minute']) &&
                            in_array(date('H', $time), $item['hours']) &&
                            in_array(date('d', $time), $item['day']) &&
                            in_array(date('m', $time), $item['month']) &&
                            in_array(date('w', $time), $item['week'])
                        ) {
                            
                            $server->task(['class' => $item['class']]);
                        }
                    }
                    clearstatcache();
                    if ($lastUpdateTime <> filectime($server->taskFilePath)) {
                        $server->clearTimer($timeId);
                        $server->reload();
                    }
                });
            } else {
                Output::instance()->writeln("0 tasks initialized");
            }
        }
    }

    public static function onTask($server, int $task_id, int $src_worker_id, $data)
    {
        $finishData = [
            'class' => $data['class'],
            'result' => true,
            'message' => 'SUCCESS'
        ];
        try {
            $task = new $data['class'];
            $task->handle();
            unset($task);
        } catch(\Throwable $e) {
            $finishData['result'] = false;
            $finishData['message'] = $e->__toString();
        }
        $server->finish($finishData);
    }

    public static function onFinish($server, int $task_id, $data)
    {
        if (!empty($server->logPath)) {
            if (!is_dir($server->logPath)) {
                mkdir($server->logPath, 0777, true);
            }
            $date = date('Y-m-d H:i:s');
            $fileNmae = date('Y-m-d') . '.log';
            @file_put_contents($server->logPath . $fileNmae, "[{$date}] [{$data['class']}] {$data['message']}" . PHP_EOL, FILE_APPEND | LOCK_EX);
        }
    }

    private static function parseCrontab($param, $min, $max)
    {
        $result = [];
        $list = explode(',', $param);
        foreach($list as $item) {
            $stepList = explode('/', $item);
            $step = empty($stepList[1]) ? 1 : $stepList[1];
            $scopeList = explode('-', $stepList[0]);
            $scopeMin = count($scopeList) == 2 ? $scopeList[0] : ($scopeList[0] == '*' ? $min : $scopeList[0]);
            $scopeMax = count($scopeList) == 2 ? $scopeList[1] : ($scopeList[0] == '*' ? $max : $scopeList[0]);
            $result = array_merge($result, range($scopeMin, $scopeMax, $step));
        }
        sort($result);
        return $result;
    }
}