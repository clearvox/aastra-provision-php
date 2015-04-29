<?php
namespace Clearvox\Aastra\Provision\SIP;

use Clearvox\Aastra\Provision\ProvisionGroupInterface;

class SIP implements ProvisionGroupInterface
{
    /**
     * @var int|null
     */
    protected $lineNumber;

    /**
     * @var string
     */
    protected $screenName;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $displayName;

    /**
     * @var string
     */
    protected $vmail;

    /**
     * @var string
     */
    protected $authName;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var int
     */
    protected $mode;

    const MODE_GENERIC = 0;
    const MODE_BROADSOFT = 1;
    const MODE_RESERVED = 2;

    /**
     * @var string
     */
    protected $proxyIp;

    /**
     * @var int
     */
    protected $proxyPort;

    /**
     * @var string
     */
    protected $registrarIp;

    /**
     * @var int
     */
    protected $registrarPort;

    /**
     * @var int
     */
    protected $registrationPeriod;

    public function __construct($lineNumber = null)
    {
        $this->lineNumber = $lineNumber;
    }

    /**
     * @return int|null
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @param int|null $lineNumber
     * @return SIP
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * @param string $screenName
     * @return SIP
     */
    public function setScreenName($screenName)
    {
        $this->screenName = $screenName;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return SIP
     */
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $displayName
     * @return SIP
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
        return $this;
    }

    /**
     * @return string
     */
    public function getVmail()
    {
        return $this->vmail;
    }

    /**
     * @param string $vmail
     * @return SIP
     */
    public function setVmail($vmail)
    {
        $this->vmail = $vmail;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthName()
    {
        return $this->authName;
    }

    /**
     * @param string $authName
     * @return SIP
     */
    public function setAuthName($authName)
    {
        $this->authName = $authName;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return SIP
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return int
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param int $mode
     * @return SIP
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
        return $this;
    }

    /**
     * @return string
     */
    public function getProxyIp()
    {
        return $this->proxyIp;
    }

    /**
     * @param string $proxyIp
     * @return SIP
     */
    public function setProxyIp($proxyIp)
    {
        $this->proxyIp = $proxyIp;
        return $this;
    }

    /**
     * @return int
     */
    public function getProxyPort()
    {
        return $this->proxyPort;
    }

    /**
     * @param int $proxyPort
     * @return SIP
     */
    public function setProxyPort($proxyPort)
    {
        $this->proxyPort = $proxyPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegistrarIp()
    {
        return $this->registrarIp;
    }

    /**
     * @param string $registrarIp
     * @return SIP
     */
    public function setRegistrarIp($registrarIp)
    {
        $this->registrarIp = $registrarIp;
        return $this;
    }

    /**
     * @return int
     */
    public function getRegistrarPort()
    {
        return $this->registrarPort;
    }

    /**
     * @param int $registrarPort
     * @return SIP
     */
    public function setRegistrarPort($registrarPort)
    {
        $this->registrarPort = $registrarPort;
        return $this;
    }

    /**
     * @return int
     */
    public function getRegistrationPeriod()
    {
        return $this->registrationPeriod;
    }

    /**
     * @param int $registrationPeriod
     * @return SIP
     */
    public function setRegistrationPeriod($registrationPeriod)
    {
        $this->registrationPeriod = $registrationPeriod;
        return $this;
    }

    /**
     * Return all possible 'lines' in the config are
     * values in the array.
     *
     * @return array
     */
    public function toArray()
    {
        $values = array();

        $prefix = 'sip' . (is_null($this->lineNumber) ? '': " line{$this->lineNumber}") . ' ';

        if(isset($this->screenName)) {
            $values[$prefix . 'screen name'] = $this->screenName;
        }

        if(isset($this->username)) {
            $values[$prefix . 'user name'] = $this->username;
        }

        if (isset($this->displayName)) {
            $values[$prefix . 'display name'] = $this->displayName;
        }

        if (isset($this->vmail)) {
            $values[$prefix . 'vmail'] = $this->vmail;
        }

        if (isset($this->authName)) {
            $values[$prefix . 'auth name'] = $this->authName;
        }

        if (isset($this->password)) {
            $values[$prefix . 'password'] = $this->password;
        }

        if (!is_null($this->mode)) {
            $values[$prefix . 'mode'] = $this->mode;
        }

        if (isset($this->proxyIp)) {
            $values[$prefix . 'proxy ip'] = $this->proxyIp;
        }

        if (isset($this->proxyPort)) {
            $values[$prefix . 'proxy port'] = $this->proxyPort;
        }

        if (isset($this->registrarIp)) {
            $values[$prefix . 'registrar ip'] = $this->registrarIp;
        }

        if (isset($this->registrarPort)) {
            $values[$prefix . 'registrar port'] = $this->registrarPort;
        }

        if (isset($this->registrationPeriod)) {
            $values[$prefix . 'registration period'] = $this->registrationPeriod;
        }

        return $values;
    }
}