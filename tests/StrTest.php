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

    public function test_is_blank()
    {
        $this->assertTrue(Str::is_blank("\n"));
        $this->assertTrue(Str::is_blank("\t"));
    }

    public function test_is_chinese()
    {
        $this->assertTrue(Str::is_chinese('我'));
        $this->assertFalse(Str::is_chinese('test'));
        $this->assertFalse(Str::is_chinese('我是neo'));
    }

    public function test_contain_chinese()
    {
        $this->assertTrue(Str::contain_chinese('我'));
        $this->assertFalse(Str::contain_chinese('test'));
        $this->assertTrue(Str::contain_chinese('我是neo'));
        $this->assertTrue(Str::contain_chinese('neo是我'));
    }

    public function test_is_version_code()
    {
        $this->assertTrue(Str::is_version_code("3"));
        $this->assertFalse(Str::is_version_code("0"));
        $this->assertFalse(Str::is_version_code("kl"));
    }

    public function test_is_version_number()
    {
        $this->assertTrue(Str::is_version_number("3.4.5"));

        $this->assertFalse(Str::is_version_number("a"));

    }

}
