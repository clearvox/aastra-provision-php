<?php

use Clearvox\Aastra\Provision\SIP\SIP;

class SIPTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var SIP
     */
    protected $sip;

    protected $screenName;

    protected $username;

    protected $displayName;

    protected $vmail;

    protected $authName;

    protected $password;

    protected $mode;

    protected $proxyIp;

    protected $proxyPort;

    protected $registrarIp;

    protected $registrarPort;

    protected $registrationPeriod;

    public function setUp()
    {
        $this->sip = new SIP();

        $this->screenName         = 'TestingScreenName';
        $this->username           = 'username';
        $this->displayName        = 'Testing Display Name';
        $this->vmail              = '*999';
        $this->authName           = 'authname';
        $this->password           = 'hunter2';
        $this->mode               = SIP::MODE_GENERIC;
        $this->proxyIp            = 'proxy.example.com';
        $this->proxyPort          = 8080;
        $this->registrarIp        = 'sip.example.com';
        $this->registrarPort      = 4545;
        $this->registrationPeriod = 50;


        $this->sip
            ->setScreenName($this->screenName)
            ->setUsername($this->username)
            ->setDisplayName($this->displayName)
            ->setVmail($this->vmail)
            ->setAuthName($this->authName)
            ->setPassword($this->password)
            ->setMode($this->mode)
            ->setProxyIp($this->proxyIp)
            ->setProxyPort($this->proxyPort)
            ->setRegistrarIp($this->registrarIp)
            ->setRegistrarPort($this->registrarPort)
            ->setRegistrationPeriod($this->registrationPeriod);
    }

    public function testGetterSetters()
    {
        $this->assertEquals($this->screenName, $this->sip->getScreenName());
        $this->assertEquals($this->username, $this->sip->getUsername());
        $this->assertEquals($this->displayName, $this->sip->getDisplayName());
        $this->assertEquals($this->vmail, $this->sip->getVmail());
        $this->assertEquals($this->authName, $this->sip->getAuthName());
        $this->assertEquals($this->password, $this->sip->getPassword());
        $this->assertEquals($this->mode, $this->sip->getMode());
        $this->assertEquals($this->proxyIp, $this->sip->getProxyIp());
        $this->assertEquals($this->proxyPort, $this->sip->getProxyPort());
        $this->assertEquals($this->registrarIp, $this->sip->getRegistrarIp());
        $this->assertEquals($this->registrarPort, $this->sip->getRegistrarPort());
        $this->assertEquals($this->registrationPeriod, $this->sip->getRegistrationPeriod());
    }

    public function testToArray()
    {
        $expected = array();
        foreach(['sip', 'sip line1'] as $prefix) {
            $expected[] = [
                "$prefix screen name" => $this->screenName,
                "$prefix user name" => $this->username,
                "$prefix display name" => $this->displayName,
                "$prefix vmail" => $this->vmail,
                "$prefix auth name" => $this->authName,
                "$prefix password" => $this->password,
                "$prefix mode" => $this->mode,
                "$prefix proxy ip" => $this->proxyIp,
                "$prefix proxy port" => $this->proxyPort,
                "$prefix registrar ip" => $this->registrarIp,
                "$prefix registrar port" => $this->registrarPort,
                "$prefix registration period" => $this->registrationPeriod
            ];
        }

        $this->assertEquals($expected[0], $this->sip->toArray());

        $this->sip->setLineNumber(1);

        $this->assertEquals($expected[1], $this->sip->toArray());
    }
}