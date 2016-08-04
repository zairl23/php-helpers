<?php

use Ney\Helpers\Str;

class StrTest extends PHPUnit_Framework_TestCase 
{
	public function test_foo()
	{
		$this->assertEquals('bar', Str::foo());
	}
}