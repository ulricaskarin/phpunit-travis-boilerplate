<?php

use PHPUnit\Framework\TestCase;
use model\Foo;

class FooTest extends TestCase {

    public function testIsTrue()
    {
        $foo = new Foo;

        // Starting off with a faulty test to assure a faulty travis build.
        $this->assertFalse($foo->isTrue());
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