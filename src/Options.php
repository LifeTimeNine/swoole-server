<?php

namespace swoole;

/**
 * swoole常量参数类
 * @class Options
 */
class Options
{
    /**
     * 多进程模式
     */
    const MODE_PROCESS = SWOOLE_PROCESS;
    /**
     * 基本模式
     */
    const MODE_BASE = SWOOLE_BASE;
    /**
     * tcp ipv4 socket
     */
    const SOCK_TYPE_TCP = SWOOLE_SOCK_TCP;
    /**
     * tcp ipv6 socket
     */
    const SOCK_TYPE_TPC6 = SWOOLE_SOCK_TCP6;
    /**
     * udp ipv4 socket
     */
    const SOCK_TYPE_UDP = SWOOLE_SOCK_UDP;
    /**
     * udp ipv6 socket
     */
    const SOCK_TYPE_UDP6 = SWOOLE_SOCK_UDP6;
    /**
     * unix socket dgram
     */
    const SOCK_TYPE_UNIX_DGRAM = SWOOLE_UNIX_DGRAM;
    /**
     * unix socket stream
     */
    const SOCK_TYPE_UNIX_STREAM = SWOOLE_UNIX_STREAM;
    /**
     * 使用 Unix Socket 通信【默认模式】
     */
    const TASK_IPC_MODE_1 = 1;
    /**
     * 使用 sysvmsg 消息队列通信
     */
    const TASK_IPC_MODE_2 = 2;
    /**
     * 使用 sysvmsg 消息队列通信，并设置为争抢模式
     */
    const TASK_IPC_MODE_3 = 3;
    /**
     * 轮循模式
     */
    const DISPATCH_MODE_1 = 1;
    /**
     * 固定模式
     */
    const DISPATCH_MODE_2 = 2;
    /**
     * 抢占模式
     */
    const DISPATCH_MODE_3 = 3;
    /**
     * IP分配
     */
    const DISPATCH_MODE_4 = 4;
    /**
     * UID分配
     */
    const DISPATCH_MODE_5 = 5;
    /**
     * stream模式
     */
    const DISPATCH_MODE_7 = 7;
    /**
     * 不启用
     */
    const LOG_ROTATION_SINGLE = SWOOLE_LOG_ROTATION_SINGLE;
    /**
     * 每月
     */
    const LOG_ROTATION_MONTHLY = SWOOLE_LOG_ROTATION_MONTHLY;
    /**
     * 每日
     */
    const LOG_ROTATION_DAILY = SWOOLE_LOG_ROTATION_DAILY;
    /**
     * 每小时
     */
    const LOG_ROTATION_HOURLY = SWOOLE_LOG_ROTATION_HOURLY	;
    /**
     * 每小时
     */
    const LOG_ROTATION_EVERY_MINUTE = SWOOLE_LOG_ROTATION_EVERY_MINUTE;
    /**
     * 有符号、1 字节
     */
    const PACKAGE_LENGTH_TYPE_c = 'c';
    /**
     * 无符号、1 字节
     */
    const PACKAGE_LENGTH_TYPE_C = 'C';
    /**
     * 有符号、主机字节序、2 字节
     */
    const PACKAGE_LENGTH_TYPE_s = 's';
    /**
     * 无符号、主机字节序、2 字节
     */
    const PACKAGE_LENGTH_TYPE_S = 'S';
    /**
     * 无符号、网络字节序、2 字节
     */
    const PACKAGE_LENGTH_TYPE_n = 'n';
    /**
     * 无符号、网络字节序、4 字节
     */
    const PACKAGE_LENGTH_TYPE_N = 'N';
    /**
     * 有符号、主机字节序、4 字节
     */
    const PACKAGE_LENGTH_TYPE_l = 'l';
    /**
     * 	无符号、主机字节序、4 字节
     */
    const PACKAGE_LENGTH_TYPE_L = 'L';
    /**
     * 无符号、小端字节序、2 字节
     */
    const PACKAGE_LENGTH_TYPE_v = 'v';
    /**
     * 无符号、小端字节序、4 字节
     */
    const PACKAGE_LENGTH_TYPE_V = 'V';
}