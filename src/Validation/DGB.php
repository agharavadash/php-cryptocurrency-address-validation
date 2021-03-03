<?php

namespace Merkeleon\PhpCryptocurrencyAddressValidation\Validation;


use Merkeleon\PhpCryptocurrencyAddressValidation\Base58Validation;

class DGB extends Base58Validation
{
   const DEPRECATED_ADDRESS_VERSION = '05';

    protected $deprecatedAllowed = false;

    protected $base58PrefixToHexVersion = [
        'D' => '1e'
    ];

    protected function validateVersion($version)
    {
        if ($this->addressVersion == self::DEPRECATED_ADDRESS_VERSION && !$this->deprecatedAllowed) {
            return false;
        }
        return hexdec($version) == hexdec($this->addressVersion);
    }

    /**
     * @return boolean
     */
    public function isDeprecatedAllowed()
    {
        return $this->deprecatedAllowed;
    }

    /**
     * @param boolean $deprecatedAllowed
     */
    public function setDeprecatedAllowed($deprecatedAllowed)
    {
        $this->deprecatedAllowed = $deprecatedAllowed;
    }
}