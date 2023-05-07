<?php

namespace Tests\Unit;

use App\Exceptions\ConfigFileNotFoundException;
use App\Helpers\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testGetContentReturnsArray()
    {
        $config = Config::getFileConents('database');
        $this->assertIsArray($config);
    }

    public function testItThrowExceptionIfFileNotFound()
    {
        $this->expectException(ConfigFileNotFoundException::class);
        $config = Config::getFileConents('jhdsgf');
    }

    public function testGetMethodReturnsValidData()
    {
        $config = Config::get('database', 'pdo');

        $expectedData = [
            'driver2' => 'mysql',
            'host' => '127.0.0.1',
            'database' => 'orm_project',
            'db_user' => 'root',
            'db_password' => ''
        ];

        $this->assertEquals($config, $expectedData);
    }
}
