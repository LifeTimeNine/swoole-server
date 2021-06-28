<?php

namespace swoole;

/**
 * 控制台输出类
 * @class Output
 */
class Output
{
    /**
     * 标签集合
     * @var array
     */
    protected $tags = [
        'success' => ['32'],
        'warning' => ['33'],
        'error' => ['41', '37'],
        'link' => ['4', '1']
    ];

    public static function instance()
    {
        return new static;
    }
    /**
     * 解析标签
     * @param   string  $string
     * @return  string
     */
    protected function parseTag($string)
    {
        foreach ($this->tags as $k => $v) {
            $string = preg_replace_callback("/\<({$k})\>(.*)\<\/({$k})\>/", function($e) {
                return "\033[" . implode(';', $this->tags[$e[1]]) . "m{$e[2]}\033[0m";
            }, $string);
        }
        return $string;
    }
    public function write($string)
    {
        echo $this->parseTag($string);
    }
    public function writeln($string)
    {
        echo $this->parseTag($string) . "\n";
    }
}