<?php
namespace asbamboo\logger;

/**
 * 日志记录接口
 * 本接口的实例被作为LoggerInterface::log()方法的$context['Record']
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月17日
 */
interface RecordInterface
{
    /**
     * 日志渠道名称
     *
     * @return string
     */
    public function getChannel() : string;
}