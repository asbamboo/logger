<?php
namespace asbamboo\logger\handler;

use asbamboo\logger\HandlerInterface;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月17日
 */
interface FileHandlerInterface extends HandlerInterface
{
    /**
     * 日志文件路径
     *
     * @return string
     */
    public function getLogPath() : string;
}