<?php
namespace asbamboo\logger\handler;

use asbamboo\logger\HandlerInterface;
use asbamboo\logger\LogLevel;

abstract class HandlerAbstract implements HandlerInterface
{

    /**
     * 日志输出级别
     * 如果 $level 等于 null，那么等同于所有级别的日志都输出
     *
     * @var array|null
     */
    private $level;

    /**
     * 应该会被输出日志的级别
     *
     * @var array
     */
    private $supported_levels;

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::setHandlerLevels()
     */
    public function setHandlerLevel(string $level) : HandlerInterface
    {
        $this->level                = $level;
        $this->supported_levels     = LogLevel::getHighers($level);
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::getSupportedLevels()
     */
    public function getSupportedLevels() : ?array
    {
        return $this->supported_levels;
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::isSupported()
     */
    public function isSupported(string $level, array $context = []) : bool
    {
        if((is_null($this->getSupportedLevels()) || in_array($level, $this->getSupportedLevels()))){
            return true;
        }
        return false;
    }
}