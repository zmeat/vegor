<?php

use Carbon\Carbon;

Class Console
{
    private $baseDir = __DIR__ . '../../../../';

    public function log($data, $where = 2)
    {

        $this->writeLog($data);

    }

    function __callStatic($method, $args)
    {
        $instance = new self();

        return $instance->$method(...$args);
    }

    private static function getTimeStr()
    {
        return (Carbon::now())->toTimeString();
    }

    private function writeLog($data)
    {
        if(is_array($data) || is_object($data)) {
            $data = json_encode($data, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        }

        if (! file_exists($this->baseDir . 'console')) {
            touch($this->baseDir . 'console');
        }

        $logStr = '[ ' . $this::getTimeStr() . ' ] \n';
        $logStr .= $data;

        $fp = fopen($this->baseDir . 'console', '+w');

        fwrite($fp, $logStr);
        fclose($fp);
    }
}