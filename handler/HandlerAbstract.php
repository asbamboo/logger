<?php
namespace asbambo\logger\handler;

use asbamboo\logger\HandlerInterface;

abstract class HandlerAbstract implements HandlerInterface
{

    /**
     * 日志输出级别
     * 如果 $levels 等于 null，那么等同于所有级别的日志都输出
     *
     * @var array|null
     */
    private $levels;

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::setHandlerLevels()
     */
    public function setHandlerLevels(array $levels) : HandlerInterface
    {
        $this->levels   = $levels;
        return $this;
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::getHandlerLevels()
     */
    public function getHandlerLevels() : array
    {
        return $this->levels;
    }
}