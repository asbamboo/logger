<?php
namespace asbamboo\logger\handler;

use asbamboo\logger\RecordInterface;
use asbamboo\logger\exception\LoggerException;

/**
 * 写文件方式日志处理器
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月17日
 */
class FileHandler extends HandlerAbstract implements HandlerInterface
{
    /**
     * 指定日志文件路径
     * 如果该日志文件不存在，则尝试创建它
     *
     * @var string
     */
    private $path;

    /**
     *
     * @param string $path
     */
    public function __construct(string $path, array $levels = null)
    {
        $this->path     = $path;
        $this->setHandlerLevels($levels);
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::isSupported()
     */
    public function isSupported(string $level, array $context = []) : bool
    {
        if(     (is_null($this->getHandlerLevels()) || in_array($level, $this->getHandlerLevels()))
            &&  (isset($context['Record']) && $context['Record'] instanceof RecordInterface)
        ){
            return true;
        }
        return false;
    }

    /**
     *
     * {@inheritDoc}
     * @see \asbamboo\logger\HandlerInterface::process()
     */
    public function process(string $level, string $message, array $context = []) : void
    {
        if($this->isSupported($level, $context) == false){
            throw new LoggerException('发生写文件日志处理器不支持的日志内容。');
        }
        /**
         *
         * @var RecordInterface $Record
         */
        $Record     = $context['Record'];
        $data       = [];
        $data[]     = "时间:" . date('Y-m-d H:i:s');
        $data[]     = "日志级别:{$level}";
        $data[]     = "渠道:{$Record->getChannel()}";
        $data[]     = "消息:{$message}";
        if($Record->getData()){
            $data[] = '数据信息:' . var_export($Record->getData(), true);
        }
        file_put_contents($this->getPath(), implode(' ', $data), FILE_APPEND|LOCK_EX);
    }

    public function getLogPath() : string
    {
        if(!is_file($this->path)){
            $dir    = dirname($this->path);
            @mkdir($dir, 0644, true);
        }
        return $this->path;
    }
}