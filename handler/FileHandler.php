<?php
namespace asbamboo\logger\handler;

use asbamboo\logger\HandlerInterface;
use asbamboo\logger\RecordInterface;

class FileHandler implements HandlerInterface
{
    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::isSupported()
     */
    public function isSupported(string $level, array $context = []) : bool
    {
        if(isset($context['Record']) && $context['Record'] instanceof RecordInterface){
            return true;
        }
        return false;
    }

    public function process(string $level, string $message, array $context = []) : void
    {
        if($this->isSupported($level, $context) == false){
//             throw
        }
    }
}