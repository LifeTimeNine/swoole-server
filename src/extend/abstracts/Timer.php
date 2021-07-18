<?php
/*
 * @Description   定时任务接口
 * @Author        lifetime
 * @Date          2021-07-17 17:29:44
 * @LastEditTime  2021-07-18 19:39:26
 * @LastEditors   lifetime
 */
namespace swoole\extend\abstracts;
/**
 * 定时任务接口
 * @interface   Timer
 */
abstract class Timer
{
    /**
     * 定时任务 秒 分 时 天 月 周
     * @var string
     */
    public $crontab = '* * * * * *';
    /**
     * 是否启用
     * @var boolean
     */
    public $enable = false;

    /**
     * 执行逻辑
     */
    abstract public function handle();
}

