<?php

use PHPUnit\Framework\TestCase;
use model\Foo;

class FooTest extends TestCase {

    public function testIsTrue()
    {
        $foo = new Foo;
        $this->assertTrue($foo->isTrue());
    }

    public function testIsFalse()
    {
        $foo = new Foo;
        $this->assertFalse($foo->isFalse());
    }

    public function testMyName()
    {
        $foo = new Foo;
        $this->assertEquals($foo->myName(), "Ulrica");
    }
}