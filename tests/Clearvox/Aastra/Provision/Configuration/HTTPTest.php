<?php

use Clearvox\Aastra\Provision\Configuration\HTTP;

class HTTPTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var HTTP
     */
    protected $http;

    public function setUp()
    {
        $this->http = new HTTP('web.server.org', '/example/path');
    }

    public function testGetters()
    {
        $this->assertSame('web.server.org', $this->http->getServer());
        $this->assertSame('/example/path', $this->http->getPath());
        $this->assertSame(80, $this->http->getPort());
    }

    public function testSetPort()
    {
        $this->http->setPort(8080);
        $this->assertSame(8080, $this->http->getPort());
    }

    public function testMakeSecure()
    {
        $this->http->makeSecure();
        $this->assertTrue($this->http->isSecure());
    }

    public function testToArray()
    {
        $this->assertEquals(
            [
                'http server' => 'web.server.org',
                'http port' => 80,
                'http path' => '/example/path',
            ],
            $this->http->toArray()
        );

        $this->http->makeSecure();

        $this->assertEquals(
            [
                'https server' => 'web.server.org',
                'https port' => 80,
                'https path' => '/example/path',
            ],
            $this->http->toArray()
        );
    }
}