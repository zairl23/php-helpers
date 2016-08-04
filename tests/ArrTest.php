<?php

use Ney\Helpers\Arr;

class ArrTest extends PHPUnit_Framework_TestCase 
{
	public function test_sort_by()
	{
		$data = [
			["name" => "chang", "age" => 23],
			["name" => "ney", "age" => 12]
		];

		$processByNameData = Arr::sort_by("name", $data);

		$this->assertEquals("chang", $processByNameData[0]["name"]);
		$this->assertEquals("ney", $processByNameData[1]["name"]);


		$processByAgeData = Arr::sort_by("age", $data);

		$this->assertEquals("ney", $processByAgeData[0]["name"]);
		$this->assertEquals("chang", $processByAgeData[1]["name"]);
	}
}
