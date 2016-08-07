<?php namespace Ney\Helpers;

class Curl {
	/**
 	 * Get remote data
 	 *
	 * @param  string $url
	 * @return   string $response
 	 */
	public static function get($url)
	{
		if (!function_exists('curl_init')) {
			die('You have not installed the curl module in the server');
		}

		$go = curl_init();
		curl_setopt($go, CURLOPT_URL, $url);
		curl_setopt($go, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($go, CURLOPT_MAXREDIRS, 30);
		curl_setopt($go, CURLOPT_HEADER, 0);
		curl_setopt($go, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($go, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($go, CURLOPT_TIMEOUT, 30);

		$response = curl_exec($go);
		curl_close($go);
		return $response;
	}

	/**
 	 * Post data to remote server
 	 *
	 * @param   string $url
	 * @param   string $json
	 * @return   string $response
 	 */
	public static  function post($url, $json='')
	{
		if (!function_exists('curl_init')) {
			die('You have not installed the curl module in the server');
		}

		$go = curl_init();
		curl_setopt($go, CURLOPT_URL, $url);
		// curl_setopt($go, CURLOPT_FOLLOWLOCATION, 1);
		// curl_setopt($go, CURLOPT_MAXREDIRS, 30);
		// curl_setopt($go, CURLOPT_NOBODY, true);
		// curl_setopt($go, CURLOPT_HEADER, 0);
		// if ($type == 'json') {
		// 	curl_setopt( $go, CURLOPT_HTTPHEADER, array(
		// 		'Accept: application/json',
		// 		'Content-Type: application/json',
		// 		'User-Agent: Ney API Client-PHP/',
		// 	));
		// }

		curl_setopt($go, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($go, CURLOPT_SSL_VERIFYHOST, false);
		// curl_setopt($go, CURLOPT_TIMEOUT, 30);
		if(!empty($json)){//POST Data
			curl_setopt($go, CURLOPT_POST, 1);
			curl_setopt($go, CURLOPT_POSTFIELDS ,$json);
		}
		curl_setopt($go, CURLOPT_RETURNTRANSFER, 1);
		$response = curl_exec($go);
		curl_close($go);
		return $response;
	}

	/**
 	 * Upload data to remote server
 	 *
	 * @param   string $url
	 * @param   string $json
	 * @return   string $response
 	 */
	public static uploadFile($url, $file)
	{
		// form-data中媒体文件标识，有filename、filelength、content-type等信息@todo

		$data = array(
			'file' => '@' . realpath($file)
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true );
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$return_data = curl_exec($ch);
		curl_close($ch);
		return $return_data;
	}
}