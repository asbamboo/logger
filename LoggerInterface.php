<?php
namespace asbamboo\logger;

use Psr\Log\LoggerInterface AS PsrLoggerInterface;

/**
 * 日志处理器接口
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月16日
 */
interface LoggerInterface extends PsrLoggerInterface
{
    /**
     * 添加一个日志处理程序
     *
     * @param HandlerInterface $Handler
     * @return LoggerInterface
     */
    public function addHandler(HandlerInterface $Handler) : LoggerInterface;
}