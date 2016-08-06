<?php namespace Ney\Helpers;

use Illuminate\Support\Str as IlluminateStr;

class Str extends IlluminateStr 
{
	/**
	 * Hide the string by mask strings at the end of the string
	 *
	 * @param $str
	 * @param $mask
	 * @param $times
	 * @return string
	 */
	public static function hide_with_end($str, $mask='*', $times=3)
	{
		return substr_replace($str, str_repeat($mask, $times), 0-$times, $times);
	}

	/**
	 * Hide the string by mask strings at the head of the string
	 *
	 * @param $str
	 * @param $mask
	 * @param $times
	 * @return string
	 */
	public static function hide_with_head($str, $mask='*', $times=3)
	{
		return substr_replace($str, str_repeat($mask, $times), 0, $times);
	}

	/**
	 * Hide the string by mask strings at the center of the string
	 *
	 * @param $str
	 * @param $mask
	 * @param $times
	 * @return string
	 */
	public static function hide_with_center($str, $mask='*', $times=3)
	{
		$index = ceil(mb_strlen($str) /2) - ceil(mb_strlen($times) / 2);
		return substr_replace($str, str_repeat($mask, $times), $index, $times);
	}

	/**
	 * Create an unique string and the string's length equal 32
	 *
	 * @return string
	 */
	public static function create_uniq_key()
	{
		return md5(microtime().rand());
	}

}