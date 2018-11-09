<?php namespace Ney\Helpers;

class File {

//https://www.douban.com/note/268776598/

	public static function scandir($dir)
	{
		$files=array();
		if(is_dir($dir)) {
			if($handle=opendir($dir)) {
				while(($file=readdir($handle))!==false) {
					if($file != "." && $file != "..") {
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
	public static function exportCsv($fileName, $datas, $tableHead)
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

	/**
     * 创建json数据流,供浏览器直接下载
     *
     * @param string $name 文件名
     * @param array  $data 数据
     * @param string $ext 文件后缀名
     * @return json
	 * @issue 在导出的json文件会产生BOM头
     */
    public static function exportJson($name, $data, $ext = "json")
	{
		$data = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        header("Content-Type: application/json");
        header("Content-Disposition: attachment;filename='{$name}.{$ext}'");
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Cache-Control: cache, must-revalidate');
        header('Pragma: public');
        file_put_contents('php://output', $data);
        exit;
	}

	/**
	 *	UTF8 去掉文本中的 bom头
	 * 
	 */
	public static function clearbom($contents)
	{    
		$BOM = chr(239).chr(187).chr(191); 
		return str_replace($BOM,'',$contents);
	}

}
