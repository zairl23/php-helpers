<?php namespace Ney\Helpers;

class Num {

	/**
	 * Generate the code in sms message for verifying
	 */
	public static function gen_verify_code($length= 4)
	{
		return mt_rand((int)('1' . str_repeat('0', $length-1)), (int)(str_repeat('9', $length)));
	}

}
