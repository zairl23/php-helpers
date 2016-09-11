<?php namespace Ney\Helpers;

class Http {
	
	/**
         * Detect the http request is https or http
         *
         */
	public static function isSSL() {
		if(!isset($_SERVER['HTTPS'])) {  
			return false;
 		} elseif($_SERVER['HTTPS'] === 1){  //Apache  
  			return true;  
 		}elseif($_SERVER['HTTPS'] === 'on'){ //IIS  
  			return true;  
 		}elseif($_SERVER['SERVER_PORT'] == 443){ //其他  
  			return true;  
 		}  
 		return false;  
	}
}
