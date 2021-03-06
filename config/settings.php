<?php

/**
 * settings class - System settings
 *
 */

namespace leantime\core;

class settings {

	/**
	 * @access private
	 * @var string - 1 debugmodus
	 */
	private $debug = 0;

	public $appVersion = "2.1.0-Beta5";

    public $dbVersion = "2.1.1";

	/**
	 * __construct
	 *
	 */
	public function __construct(){
	}

	/**
	 * loadSettings - load all settings and set ini
	 *
	 */
	public function loadSettings(){

		date_default_timezone_set('America/Los_Angeles');
        error_reporting(E_ALL);

		if($this->debug === 1){
			ini_set('display_errors', 1);
		}else{
			ini_set('display_errors', 0);
		}

		ini_set('session.use_cookies',1);
		ini_set('session.use_only_cookies',1);
        ini_set('session.cookie_httponly',1);
		ini_set('session.use_trans_sid',0);

		ini_set("log_errors", 1);
        ini_set('error_log', ROOT.'/../resources/logs/error.log');

	}

	public function getBaseURL () {

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'].'';
        return $protocol.$domainName;

	}

    public function getFullURL () {

        return $this->getBaseURL().rtrim($this->getRequestURI(),"/");

    }
	
    public function getRequestURI () {

        return $_SERVER['REQUEST_URI'];

    }

}

$settings = new settings();
$settings->loadSettings();

