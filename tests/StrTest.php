<?php

use Ney\Helpers\Str;

class StrTest extends PHPUnit_Framework_TestCase 
{
	public function test_hide_with_end()
	{

		$this->assertEquals('t***', Str::hide_with_end('test'));
		$this->assertEquals('***', Str::hide_with_end('t'));
		$this->assertEquals('***', Str::hide_with_end('tt'));
		$this->assertEquals('***', Str::hide_with_end('ttt'));
		$this->assertEquals('+++', Str::hide_with_end('ttt', '+'));
		$this->assertEquals('t++', Str::hide_with_end('ttt', '+', 2));
		// $this->assertEquals('t++', Str::hide_with_end('我是谁', '+', 2));
	}

	public function test_hide_with_head()
	{

		$this->assertEquals('***t', Str::hide_with_head('test'));
		$this->assertEquals('***', Str::hide_with_head('t'));
		$this->assertEquals('***', Str::hide_with_head('tt'));
		$this->assertEquals('***', Str::hide_with_head('ttt'));

	}


	public function test_hide_with_center()
	{

		$this->assertEquals('t***', Str::hide_with_center('test'));
		$this->assertEquals('t-st', Str::hide_with_center('test', '-', 1));
		$this->assertEquals('tt***t', Str::hide_with_center('tttttt'));
		// $this->assertEquals('***', Str::hide_with_center('tt'));
		// $this->assertEquals('***', Str::hide_with_center('ttt'));

	}

	public function test_create_uniq_key()
	{
		$this->assertEquals(32, strlen(Str::create_uniq_key()));
	}


}