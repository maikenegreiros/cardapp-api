<?php
namespace Tests\Unit\Domains\Order\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\ZipCodes\ZipCode;
use Model\Entities\ZipCodes\BrazilianZipCode;
use Model\Exceptions\InvalidZipCode;

class BrazilianZipCodeTest extends TestCase {

    /**
     *
     * @dataProvider validZipCodeProvider
     */

    public function testZipCodeInstance($zipCode)
    {
        $zipCode = new BrazilianZipCode($zipCode);

        $this->assertTrue($zipCode instanceof ZipCode);
    }

    /**
     *
     * @dataProvider invalidZipCodeProvider
     */

    public function testThrowsExceptionWhenZipCodeIsInvalid($zipCode)
    {
        $this->expectException(InvalidZipCode::class);

        new BrazilianZipCode($zipCode);
    }

    public function validZipCodeProvider()
    {
        return [
            ["63475-000"],
            ["63475000"],
            [63475000]
        ];
    }

    public function invalidZipCodeProvider()
    {
        return [
            ["63-47520"],
            ["63475-00"],
            ["89"],
            ["456123"],
            [456123]
        ];
    }
}
