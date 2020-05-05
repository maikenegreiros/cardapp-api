<?php
namespace Test\Unit\Model\Entities\PhoneNumbers;

use PHPUnit\Framework\TestCase;
use Model\Entities\PhoneNumbers\PhoneNumber;
use Model\Entities\PhoneNumbers\BrazilianPhoneNumber;
use Model\Exceptions\InvalidPhoneNumber;

class PhoneNumberTest extends TestCase {

    public function testGetInstance()
    {
        $number = 996450440;
        $ddd = 88;
        $phoneNumber = new BrazilianPhoneNumber($ddd, $number);
        $this->assertTrue($phoneNumber instanceof PhoneNumber);
    }

    /**
     *
     * @dataProvider validPhoneNumbersProvider
     */

    public function testValidNumbers($ddd, $phoneNumber)
    {
        $brazilianPhoneNumber = new BrazilianPhoneNumber($ddd, $phoneNumber);
        $this->assertEquals($ddd, $brazilianPhoneNumber->getDDD());
        $this->assertEquals($phoneNumber, $brazilianPhoneNumber->getPhoneNumber());
    }

    /**
     *
     * @dataProvider invalidPhoneNumbersProvider
     */

    public function testThrowsExceptionWhenInvalidNumberIsProvided($ddd, $phoneNumber)
    {
        $this->expectException(InvalidPhoneNumber::class);
        new BrazilianPhoneNumber($ddd, $phoneNumber);
    }

    public function validPhoneNumbersProvider()
    {
        return [
            [88, 996310440],
            [88, 96310440],
            [31, 88965663],
            [21, 988965663],
        ];
    }

    public function invalidPhoneNumbersProvider()
    {
        return [
            [88, 299310440],
            [88, 9310440],
            [8, 99310440],
            [100, 99310440],
        ];
    }
}
