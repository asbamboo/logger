<?php
namespace asbamboo\logger;

/**
 * 日志处理程序接口
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月16日
 */
interface HandlerInterface
{
    /**
     * 返回该处理程序实例是否支持当前日志信息的处理
     *
     * @see \Psr\Log\LogLevel $level
     * @param string $level 日志级别 LoggerInterface::log() 方法的参数 $level
     * @param array $context 日志内容 LoggerInterface::log() 方法的参数 $context
     * @return bool
     */
    public function isSupported(string $level, array $context = []) : bool;

    /**
     * 处理日志信息
     *  - 比如将日志写入写入文件
     *
     * @param string $level 日志级别 LoggerInterface::log() 方法的参数 $level
     * @param string $message 日志内容 LoggerInterface::log() 方法的参数 $message
     * @param array $context 日志内容 LoggerInterface::log() 方法的参数 $context
     */
    public function process(string $level, string $message, array $context = []) : void;

    /**
     * 设置日志处理程序支持的日志级别
     *
     * $levels 是 psr log中定义的日志级别
     * @see \Psr\Log\LogLevel
     *
     * @param array $levels
     * @return HandlerInterface
     */
    public function setHandlerLevels(array $levels) : HandlerInterface;

    /**
     * 返回日志处理程序支持的日志级别
     * 返回psr log中定义的日志级别
     * @see \Psr\Log\LogLevel
     *
     * @return array
     */
    public function getHandlerLevels() : array;
}