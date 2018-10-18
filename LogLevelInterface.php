<?php
namespace asbamboo\logger;

/**
 * 日志级别接口
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月18日
 */
interface LogLevelInterface
{
    /**
     * 返回比参数$level级别更高的级别集合
     *
     * @param string $level
     * @return array
     */
    public static function getHighers(string $level) : array;
}