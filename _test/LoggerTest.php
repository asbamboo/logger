<?php
namespace asbamboo\logger\_test;

use PHPUnit\Framework\TestCase;
use asbamboo\logger\Logger;
use asbamboo\logger\handler\FileHandler;
use asbamboo\logger\LogLevel;

/**
 * 测试用例
 *  - 测试各个日志方法的写入功能
 *  - 测试没有handler的时候log方法执行状况
 *
 * @author 李春寅 <licy2013@aliyun.com>
 * @since 2018年10月18日
 */
class LoggerTest extends TestCase
{
    public $path;

    public function setUp()
    {
        $this->path = __DIR__ . '/fixtures/cache/test/log.file';
    }

    public function tearDown()
    {
        @unlink($this->path);
    }

    public function testEmergency()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->emergency('test');
        $this->assertContains(LogLevel::EMERGENCY, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testAlert()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->alert('test');
        $this->assertContains(LogLevel::ALERT, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testCritical()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->critical('test');
        $this->assertContains(LogLevel::CRITICAL, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testError()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->error('test');
        $this->assertContains(LogLevel::ERROR, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testWarning()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->warning('test');
        $this->assertContains(LogLevel::WARNING, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testNotice()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->notice('test');
        $this->assertContains(LogLevel::NOTICE, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testInfo()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->info('test');
        $this->assertContains(LogLevel::INFO, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testDebug()
    {
        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->debug('test');
        $this->assertContains(LogLevel::DEBUG, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }

    public function testLog()
    {
        $Logger         = new Logger();
        $Logger->log(LogLevel::DEBUG, 'test');
        $this->assertFalse(file_exists($this->path));

        $FileHandler    = new FileHandler($this->path, LogLevel::INFO);
        $Logger         = new Logger();
        $Logger->log(LogLevel::DEBUG, 'test');
        $this->assertFalse(file_exists($this->path));

        $FileHandler    = new FileHandler($this->path);
        $Logger         = new Logger($FileHandler);
        $Logger->log(LogLevel::DEBUG, 'test');
        $this->assertContains(LogLevel::DEBUG, file_get_contents($this->path));
        $this->assertContains('test', file_get_contents($this->path));
    }
}