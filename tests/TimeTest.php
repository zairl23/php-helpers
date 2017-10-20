<?php

use Ney\Helpers\Time;

class TimeTest extends PHPUnit_Framework_TestCase {

	public function test_set_time_zone()
	{
		Time::set_time_zone('Asia/Shanghai');

		$this->assertEquals('Asia/Shanghai', Time::get_time_zone());
	}

	public function test_get_time_zone()
	{
		$this->assertEquals('Asia/Shanghai', Time::get_time_zone());
	}

	public function test_now()
	{
	//	$this->assertEquals('e', Time::now());
	}

	public function test_remain_time()
	{
		# code...
	}

	public function test_get_millseconds()
	{
		 
	}

}
