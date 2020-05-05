<?php
namespace Tests\Unit\Model\Entities;

use PHPUnit\Framework\TestCase;
use Model\Entities\Name;

class NameTest extends TestCase {
    public function testNameInstance()
    {
        $name = new Name("Peter", "Parker");
        $this->assertTrue($name instanceof Name);
    }

    public function testLastNameOptional()
    {
        $name = new Name("Peter");
        $this->assertEquals(null, $name->getLastName());
    }

    public function testGetFirstName()
    {
        $firstName = "Peter";
        $name = new Name($firstName);
        $this->assertEquals($firstName, $name->getFirstName());
    }

    public function testGetFullNameWithLastName()
    {
        $firstName = "Peter";
        $lastName = "Parker";
        $name = new Name($firstName, $lastName);
        $this->assertEquals($firstName . " " . $lastName, $name->getFullName());
    }

    public function testGetFullNameWithoutLastName()
    {
        $firstName = "Peter";
        $name = new Name($firstName);
        $this->assertEquals($firstName, $name->getFullName());
    }

    public function testToStringMethod()
    {
        $firstName = "Peter";
        $lastName = "Parker";
        $name = new Name($firstName, $lastName);
        $this->assertEquals($firstName . " " . $lastName, "".$name);
    }
}
