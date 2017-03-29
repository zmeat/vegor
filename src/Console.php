<?php

namespace Voger\Console;

use Requests;

Class Console
{
    // 输出信息到控制台
    private function writeConsole()
    {
        $args = func_get_args();
        $funcName = end($args);
        $data = array_pop($args);
        foreach($data as $item) {
            $this->emitData($item, $funcName);
        }
    }

    // 输出信息到web控制台
    private function writeWebConsole()
    {
        $args = func_get_args();
        $funcName = end($args);
        $data = array_pop($args);
        ob_start();
        foreach($data as $item) {
            $item = $this->stringify($item);
            $html = "<script type='text/javascript'> console.$funcName($item); </script>";
            echo $html;
        }
        ob_end_flush();
    }

    // json字符串序列化
    private function stringify($data)
    {
        if(is_array($data) || is_object($data)) {
            return json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        } else {
            return $data;
        }
    }

    // 发送请求信息到web控制台，如果未打开控制台，消息不会输出到控制台 但是不影响输出到web控制
    private function emitData(...$args)
    {
        try{
            $url = 'http://127.0.0.1:3334/';
            $headers = array('Accept' => 'application/json');
            Requests::post($url, $headers, ['data' => $args[0], 'func' => $args[1]]);
        }catch (\Exception $e) {

        }
    }

    public static function __callStatic($method, $args)
    {
        $instance = new self();
        $mapMethod = [
            'log',
            'info',
            'warn',
            'error',
        ];

        if(in_array($method, $mapMethod)) {
            $method = 'veger_'.$method;
            return $instance->$method(...$args);
        } else {
            return $instance->veger_log(...$args);
        }
    }

    public function __call($name, $args)
    {
        if(strpos($name, 'veger_') > 0) {
            $subName = explode('_', $name)[1];
            $args[] = $subName;
            $this->writeConsole(...$args);
            $this->writeWebConsole(...$args);
        }

        return $this->$name(...$args);
    }
}
