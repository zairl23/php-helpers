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

}