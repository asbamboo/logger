<?php
namespace asbamboo\logger\handler;

use asbamboo\logger\exception\LoggerException;

/**
 * 写文件方式日志处理器
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月17日
 */
class FileHandler extends HandlerAbstract implements FileHandlerInterface
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
    public function __construct(string $path, string $level = null)
    {
        $this->path     = $path;
        if($level){
            $this->setHandlerLevel($level);
        }
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
        $data       = [];
        $data[]     = date('Y-m-d H:i:s');
        $data[]     = "[{$level}]";
        $data[]     = $message;
        if(!empty($context)){
            $data[] = var_export($context, true);
        }
        file_put_contents($this->getLogPath(), implode(' ', $data) . "\r\n", FILE_APPEND|LOCK_EX);
    }

    /**
     * 返回日志文件路径
     *  - 如果文件路劲不存在会尝试创建它
     *
     * @return string
     */
    public function getLogPath() : string
    {
        if(!is_file($this->path)){
            $dir    = dirname($this->path);
            @mkdir($dir, 0744, true);
        }
        return $this->path;
    }
}