<?php
namespace asbamboo\logger;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月18日
 */
class Logger implements LoggerInterface
{
    /**
     * 用于写日志的处理器
     *
     * @var array
     */
    private $handlers   = [];

    public function __construct(HandlerInterface ...$Handlers)
    {
        foreach($Handlers AS $Handler){
            $this->addHandler($Handler);
        }
    }

    /**
     * 添加一个日志处理程序
     *
     * @param HandlerInterface $Handler
     * @return LoggerInterface
     */
    public function addHandler(HandlerInterface $Handler) : LoggerInterface
    {
        $this->handlers[]   = $Handler;
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::emergency()
     */
    public function emergency($message, array $context = array())
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::alert()
     */
    public function alert($message, array $context = array())
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::critical()
     */
    public function critical($message, array $context = array())
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::error()
     */
    public function error($message, array $context = array())
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::warning()
     */
    public function warning($message, array $context = array())
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::notice()
     */
    public function notice($message, array $context = array())
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::info()
     */
    public function info($message, array $context = array())
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    /**
     *
     * {@inheritDoc}
     * @see \Psr\Log\LoggerInterface::log()
     */
    public function log($level, $message, array $context = array())
    {
        /**
         * @var HandlerInterface $Handler
         */
        foreach($this->handlers AS $Handler){
            if($Handler->isSupported($level, $context)){
                $Handler->process($level, $message, $context);
            }
        }
    }
}