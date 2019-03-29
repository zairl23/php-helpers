<?php

namespace Ney\Helpers;

use Illuminate\Support\Str as IlluminateStr;

class Str extends IlluminateStr
{
    /**
     * Hide the string by mask strings at the end of the string.
     *
     * @param $str
     * @param $mask
     * @param $times
     *
     * @return string
     */
    public static function hide_with_end($str, $mask = '*', $times = 3)
    {
        return substr_replace($str, str_repeat($mask, $times), 0 - $times, $times);
    }

    /**
     * Hide the string by mask strings at the head of the string.
     *
     * @param $str
     * @param $mask
     * @param $times
     *
     * @return string
     */
    public static function hide_with_head($str, $mask = '*', $times = 3)
    {
        return substr_replace($str, str_repeat($mask, $times), 0, $times);
    }

    /**
     * Hide the string by mask strings at the center of the string.
     *
     * @param $str
     * @param $mask
     * @param $times
     *
     * @return string
     */
    public static function hide_with_center($str, $mask = '*', $times = 3)
    {
        $index = ceil(mb_strlen($str) / 2) - ceil(mb_strlen($times) / 2);

        return substr_replace($str, str_repeat($mask, $times), $index, $times);
    }

    /**
     * Create an unique string and the string's length equal 32.
     *
     * @return string
     */
    public static function create_uniq_key()
    {
        return md5(microtime().rand());
    }

    /**
     * Check the given string is a url format.
     *
     * @return bool
     */
    public static function is_url($str)
    {
        return preg_match("^http(s)?:\/\/.+", $str) === 1;
    }

    /**
     * Check the given string is a blank string.
     *
     * @return bool
     */
    public static function is_blank($str)
    {
        return preg_match("/^[\s]*$/", $str) === 1;
    }

    /**
     * Check the given string is a chinese words.
     *
     * @param string $str str
     *
     * @return bool
     */
    // preg_match("/^[\x{4e00}-\x{9fa5}a-zA-z0-9]{1,}([\x{4e00}-\x{9fa5}a-zA-Z0-9_?%&*,;= ]){1,}$/u
    public static function is_chinese($str)
    {
        return preg_match("/^[\x{4e00}-\x{9fa5}]$/u", $str) === 1;
    }

    /**
     * Check the given string contain chinese string.
     *
     * @param string $str str
     *
     * @return bool
     */
    public static function contain_chinese($str)
    {
        return preg_match("/[\x{4e00}-\x{9fa5}]+/u", $str) === 1;
    }

    /**
     * Check the given string is version code format.
     *
     * @param string $str str
     *
     * @return bool
     */
    public static function is_version_code($str)
    {
        return preg_match('/^[1-9]{1}[0-9]*$/', $str) === 1;
    }

    /**
     * Check the given string is version number format.
     *
     * @param string $str str
     *
     * @return bool
     */
    public static function is_version_number($str)
    {
        return preg_match('/^[0-9]{1}.[0-9.]*[0-9]$/', $str) === 1;
    }

    /**
     * Check the given string is price format.
     *
     * @param string $str str
     *
     * @return bool
     */
    public static function is_price($str)
    {
        return preg_match('/^\d+(\.\d{1})?(\.\d{2})?$/', $str) === 1;
    }
}
