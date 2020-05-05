<?php
namespace Tests\Unit\Model\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\Email;
use Model\Exceptions\InvalidEmail;

class EmailTest extends TestCase {

    public function testGetEmailAddress()
    {
        $emailAddress = "maike@negreiros.com";
        $email = new Email($emailAddress);

        $this->assertEquals($emailAddress, $email->getAddress());
    }

    /**
     *
     * @dataProvider validEmailAddressProvider
     */

    public function testValidEmail(string $emailAddress)
    {
        $email = new Email($emailAddress);

        $this->assertTrue($email instanceof Email);
    }

    /**
     *
     * @dataProvider invalidEmailAddressProvider
     */

    public function testThrowsExceptionWhenProvidingInvalidAddress(string $address)
    {
        $this->expectException(InvalidEmail::class);
        new Email($address);
    }

    public function validEmailAddressProvider()
    {
        return [
            ["maike-negreiros@gmail.com"],
            ["maike_negreiros@gmail.com"],
            ["maike.negreiros@gmail.com"],
            ["maike.123@gmail.com"],
            ["maike123@gmail.com"],
            ["maike@neg.com.br"],
            ["maike@ce.gov.br"]
        ];
    }

    public function invalidEmailAddressProvider()
    {
        return [
            ["maike.negreiros"],
            ["maike@neg"],
            ["maike@neg."],
            ["maike@neg..com"],
            ["contato@saopaulo.ce.gov.br.wt"],
            ["contato"],
            ["@"],
        ];
    }
}
