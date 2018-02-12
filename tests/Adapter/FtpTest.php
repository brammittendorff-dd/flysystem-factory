<?php

namespace MJRider\FlysystemFactory\Adapter;

use PHPUnit\Framework\TestCase;

/**
 * @requires PHP 5.4
 */
class FtpTest extends TestCase
{
    protected $root = '';

    public function setup()
    {
        $this->root = getenv('TEST_FTP_LOCATION');
        if ($this->root === false) {
            $this->markTestSkipped('no ftp endpoint available, test skipped');
        }
    }

    public function testFtp()
    {
        $filesystem = \MJRider\FlysystemFactory\create($this->root);
        $this->assertInstanceOf('\League\Flysystem\Filesystem', $filesystem);
        $this->assertInstanceOf('\League\Flysystem\Adapter\Ftp', $filesystem->getAdapter());
    }
}
