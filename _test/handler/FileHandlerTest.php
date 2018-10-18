<?php
namespace asbamboo\logger\_test\handler;

use PHPUnit\Framework\TestCase;
use asbamboo\logger\handler\FileHandler;
use Psr\Log\LogLevel;
use asbamboo\logger\exception\LoggerException;

/**
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月18日
 */
class FileHandlerTest extends TestCase
{
    public $path;

    public function setUp()
    {
        $this->path = dirname(__DIR__). '/fixtures/cache/test/log.file';
    }

    public function tearDown()
    {
        @unlink($this->path);
    }

    public function testProcess()
    {
        $FileHandler    = new FileHandler($this->path);
        $FileHandler->process(LogLevel::INFO, 'test');
        $this->assertContains(LogLevel::INFO, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testProcessException()
    {
        $this->expectException(LoggerException::class);
        $FileHandler    = new FileHandler($this->path, LogLevel::ERROR);
        $FileHandler->process(LogLevel::INFO, 'test');
    }
}