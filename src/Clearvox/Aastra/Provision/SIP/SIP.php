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

    /**
     * Set the Line number for this configuration, or if blank will prepare it
     * for the Global Sip settings.
     *
     * @param int $lineNumber
     */
    public function __construct($lineNumber = null)
    {
        $this->lineNumber = $lineNumber;
    }

    /**
     * Get the line number this sip config is going to be loaded into. If this is null
     * then the config is for Global Sip.
     *
     * @return int|null
     */
    public function getLineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * Set the line number to have this sip configuration loaded for.
     *
     * @param int|null $lineNumber
     * @return SIP
     */
    public function setLineNumber($lineNumber)
    {
        $this->lineNumber = $lineNumber;
        return $this;
    }

    /**
     * Name that displays on the idle screen.
     *
     * @return string
     */
    public function getScreenName()
    {
        return $this->screenName;
    }

    /**
     * Name that displays on the idle screen.
     *
     * Valid values are up to 20 alphanumeric characters.
     *
     * @web Screen Name
     *
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
     * User name used in the name field of the SIP URI for the IP phone and for
     * registering the phone at the registrar.
     *
     * Valid values are up to 20 alphanumeric characters.
     *
     * @web Phone Number
     *
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
     * Name used in the display name field of the "From SIP" header field.
     * Some IP PBX systems use this as the caller’s ID, and some may overwrite
     * this with the string that is set at the PBX system.
     *
     * Valid values are up to 20 alphanumeric characters.
     *
     * @web Caller ID
     *
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
     * Authorization name used in the username field of the Authorization header
     * field of the SIP REGISTER request.
     *
     * Valid values are up to 20 alphanumeric characters.
     *
     * @web Authentication Name
     *
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
     * Password used to register the IP phone with the SIP proxy.
     *
     * Valid values are up to 20 alphanumeric characters.
     *
     * Passwords are encrypted and display as asterisks when entering.
     *
     * @web Password
     *
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
     * The mode-type that you assign to the IP phone.
     *
     * Valid values are Generic (0), BroadSoft SCA (1), Reserved for (2), or BLA (3).
     *
     * Default is Generic (0).
     *
     * @web Line Mode
     *
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
     * IP address of the SIP proxy server.
     *
     * Up to 64 alphanumeric characters.
     *
     * @web Proxy Server
     *
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
     * SIP proxy server’s port number. Default is 0.
     *
     * @web Proxy Port
     *
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
     * IP address of the SIP registrar. Up to 64 alphanumeric characters. Enables or disables
     * the phone to be registered with the Registrar. When Register is disabled globally,
     * the phone is still active and you can dial using username and IP address of the phone.
     *
     * A message "No Service" displays on the idle screen and the LED is steady ON.
     * If Register is disabled for a single line, no messages display and LEDs are OFF.
     *
     * @web Registrar Server
     *
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
     * SIP registrar’s port number. Default is 0.
     *
     * @web Registrar Port
     *
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
     * The requested registration period, in seconds, from the registrar.
     *
     * @web Registration Period
     *
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