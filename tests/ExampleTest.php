<?php

namespace Tnapf\Package\Test;

use PHPUnit\Framework\TestCase;
use Tnapf\Package\ExampleClass;

class ExampleTest extends TestCase
{
    public function testExample()
    {
        $this->assertTrue((new ExampleClass())->returnTrue());
    }
}
