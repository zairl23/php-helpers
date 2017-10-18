<?php namespace Ney\Helpers;

use Illuminate\Support\Arr as IlluminateArr;

class Arr
{
	public static function sort_by($filedName, $data)
	{
		$filedsArr = static::pluck($data, $filedName);
		array_multisort($filedsArr, $data);
		return $data;
	}

	/**
	 * Pluck an array of values from an array.
	 *
	 * @param  array   $array
	 * @param  string  $value
	 * @param  string  $key
	 * @return array
	 */
	public static function pluck($array, $value, $key = null)
	{
		$results = [];

		foreach ($array as $item)
		{
			$itemValue = static::dataGet($item, $value);

			// If the key is "null", we will just append the value to the array and keep
			// looping. Otherwise we will key the array using the value of the key we
			// received from the developer. Then we'll return the final array form.
			if (is_null($key))
			{
				$results[] = $itemValue;
			}
			else
			{
				$itemKey = static::dataGet($item, $key);

				$results[$itemKey] = $itemValue;
			}
		}

		return $results;
	}

	public static function dataGet($target, $key, $default = null)
	{
		if (is_null($key)) return $target;

		foreach (explode('.', $key) as $segment)
		{
			if (is_array($target))
			{
				if ( ! array_key_exists($segment, $target))
				{
					return value($default);
				}

				$target = $target[$segment];
			}
			elseif ($target instanceof \ArrayAccess)
			{
				if ( ! isset($target[$segment]))
				{
					return value($default);
				}

				$target = $target[$segment];
			}
			elseif (is_object($target))
			{
				if ( ! isset($target->{$segment}))
				{
					return value($default);
				}

				$target = $target->{$segment};
			}
			else
			{
				return value($default);
			}
		}

		return $target;
	}

}
