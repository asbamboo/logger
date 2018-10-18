<?php
namespace asbamboo\logger;

use Psr\Log\LogLevel AS PsrLevel;

/**
 * 日志级别
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月18日
 */
class LogLevel extends PsrLevel implements LogLevelInterface
{
    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\LogLevelInterface::getHighers()
     */
    public static function getHighers(string $level) : array
    {
        $order_key  = array_search($level, static::orderedLevels());
        return $order_key === false ? [] : array_slice(static::orderedLevels(), 0, $order_key + 1);
    }

    /**
     * 按日志级别高低从高到低排序的的日志级别数组
     *
     * @return string[]
     */
    private static function orderedLevels() : array
    {
        return [
            self::EMERGENCY,
            self::ALERT,
            self::CRITICAL,
            self::ERROR,
            self::WARNING,
            self::NOTICE,
            self::INFO,
            self::DEBUG,
        ];
    }
}