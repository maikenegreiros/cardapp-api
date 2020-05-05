<?php
namespace Model\Entities\ZipCodes;

use Exception;

abstract class ZipCode {

    protected string $zipCode;

    public function __construct(string $zipCode)
    {
        $this->validate($zipCode);
        $this->zipCode = $zipCode;
    }

    /**
     *
     * @throws InvalidZipCode if the required rule is not attended
     */
    protected function validate(string $zipCode)
    {
        throw new Exception(self::class."::validate method must me override");
    }
}
