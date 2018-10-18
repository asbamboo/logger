<?php
namespace asbamboo\logger;

class Logger implements LoggerInterface
{
    /**
     * 添加一个日志处理程序
     *
     * @param HandlerInterface $Handler
     * @return LoggerInterface
     */
    public function addHandler(HandlerInterface $Handler) : LoggerInterface
    {

    }

    public function emergency($message, array $context = array())
    {

    }

    public function alert($message, array $context = array())
    {

    }

    public function critical($message, array $context = array())
    {

    }

    public function error($message, array $context = array())
    {

    }

    public function warning($message, array $context = array())
    {

    }

    public function notice($message, array $context = array())
    {

    }

    public function info($message, array $context = array())
    {

    }

    public function debug($message, array $context = array())
    {

    }

    public function log($level, $message, array $context = array())
    {

    }
}