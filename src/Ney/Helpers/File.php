<?php namespace Ney\Helpers;

class File {

//https://www.douban.com/note/268776598/

	public static function scandir($dir)
	{
		$files=array();
		if(is_dir($dir)) {
			if($handle=opendir($dir)) {
				while(($file=readdir($handle))!==false) {
					if($file!=”.” && $file!=”..”) {
						if(is_dir($dir.”/”.$file))	{
							$files[$file] = scandir($dir.”/”.$file);
						} else {
							$files[]=$dir.”/”.$file;
						}
					}
				}
				closedir($handle);
				return $files;
			}
		}
	}

	/**
	 * Export the datas to csv file for downloading
	 *
	 * @param string $fileName
	 * @param array  $datas
	 * @param string $tableHead
	 * @return file stream
	 * @link https://mp.weixin.qq.com/s?timestamp=1509880911&src=3&ver=1&signature=ryMORtyG6dZ-9u6JNVMXgYYkDDuEYMmmkK8tZIoSvbLEWOQj7ZRwhO5KIbBuM3HDLYvKhFB-sHDz2S-qwSjlA7Pus-AGOvuJi*4mfvIGOGQQkTJz4v2YmwxWVzki2DMU327o-bsaIk0DbMdyyqaQENFFnkNW5PYi61jfQm3k374=
	 */
	public static function exportcsv($fileName, $datas, $tableHead)
	{

			set_time_limit(0);
			ini_set('memory_limit', '512M');

			$output = fopen('php://output', 'w') or die("can't open php://output");

			header("Content-Type: application/csv");
			header("Content-Disposition: attachment; filename=$fileName.csv");
			header('Expires: 0');
  		header('Cache-Control: must-revalidate');
  		header('Pragma: public');

			//Windows下使用BOM来标记文本文件的编码方式,防止中文乱码
			fwrite($output,chr(0xEF).chr(0xBB).chr(0xBF));

			fputcsv($output, $tableHead);

			foreach ($datas as $data) {
					$data = (array) $data;
					fputcsv($output, array_values($data));
			}

			unset($datas);
			ob_flush();
			flush();

			fclose($output) or die("can't close php://output");

	}

}
