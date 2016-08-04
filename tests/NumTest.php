<?php

use Ney\Helpers\Num;

class NumTest extends PHPUnit_Framework_TestCase 
{
	public function test_gen_verify_code()
	{
		$result = Num::gen_verify_code(4);
		$this->assertGreaterThan(1000, $result);
		$this->assertLessThan(9999, $result);

		$result = Num::gen_verify_code(6);
		$this->assertGreaterThan(100000, $result);
		$this->assertLessThan(999999, $result);
	}
}