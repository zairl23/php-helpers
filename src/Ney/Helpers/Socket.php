<?php namespace Ney\Helpers;

class Socket {

	/**
	 * @link http://php.net/manual/zh/function.fsockopen.php
	 *
	 */
	public static function open($host, $port)
	{
		return fsockopen($host, $port, $errno, $errstr, 30);
	}

	// http://www.cnblogs.com/lmule/archive/2010/10/27/1862725.html

}