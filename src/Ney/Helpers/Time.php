<?php namespace Ney\Helpers;

use Carbon\Carbon;

class Time {
	/**
   	 * @link http://sjolzy.cn/php-set-the-time-zone-of-the-two-methods.html
     *
     */
	public static function set_time_zone($timezone = 'Asia/Shanghai')
  	{
    	date_default_timezone_set($timezone);//'Asia/Shanghai'   亚洲/上海
    	// date_default_timezone_set('Asia/Chongqing');//其中Asia/Chongqing'为“亚洲/重庆”
    	// date_default_timezone_set('PRC');//其中PRC为“中华人民共和国”
    	// ini_set('date.timezone','Etc/GMT-8');
    	// ini_set('date.timezone','PRC');
    	// ini_set('date.timezone','Asia/Shanghai');
    	// ini_set('date.timezone','Asia/Chongqing');
    	// or
    	//在PHP.INI中设置时区
    	//date.timezone = PRC
  	}

  	public static function get_time_zone()
  	{
  		return date_default_timezone_get();
  	}

  	public static function now()
  	{
  		return Carbon::now();
  	}

  	public static function today()
  	{
  		return Carbon::today();
  	}

  	public static function tomorrow()
  	{
  		return Carbon::tomorrow();
  	}

  	public static function now_year()
  	{
  		return getdate()['year'];
  	}

  	public static function now_month_number()
  	{
  		return getdate()['mon'];
  	}

  	public static function now_month_text()
  	{
  		return getdate()['month'];
  	}

  	public static function now_yday()
  	{
  		return getdate()['yday'];
  	}

  	public static function now_mday()
  	{
  		return getdate()['mday'];
  	}

  	public static function now_wday()
  	{
  		return getdate()['wday'];

  	}

  	public static function now_weekday()
  	{
  		return getdate()['weekday'];
  	}

  	public static function now_hours()
  	{
  		return getdate()['hours'];
  	}

  	public static function now_minutes()
  	{
  		return getdate()['minutes'];
  	}

  	public static function now_seconds()
  	{
  		return getdate()['seconds'];
  	}

  	// http://php.net/manual/en/function.strtotime.php
		/**
		 * Get the remain seconds from now
		 *
		 * @return integer
		 */
		public static function remain_time($str_time)
		{
			 return \DateTime::createFromFormat("Y-m-d H:i:s", $str_time)->getTimestamp() - time();
		}

		public static function get_millseconds()
		{
				list($t1, $t2) = explode(' ', microtime());
        return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
		}
 }
