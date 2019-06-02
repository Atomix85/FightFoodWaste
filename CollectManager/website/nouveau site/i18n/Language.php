<?php
class Lang
{
	private $currentLanguage;
	private $currentFile;
	private $data;
	private static $langManager;
	
	public static function initLang(string $language){
		if(!isset(self::$langManager)){
			self::$langManager = new Lang($language);
		}else{
			self::$langManager = new Lang("fr");
		}
	}

	public static function i18n(string $prop){
		foreach (self::$langManager->getData() as $key => $value) {
			if($prop == $key){
				echo $value;
				return $value;
			}
		}
		echo $prop;
		return $prop;
	}

	public static function valueof(string $prop){
		foreach (self::$langManager->getData() as $key => $value) {
			if($prop == $key){
				return $value;
			}
		}
		return $prop;
	}


	public function __construct(string $language )
	{
		$this->currentLanguage = $language;
		$this->currentFile = fopen("i18n/".$language.".properties", "r");
		$this->data = array();
		self::load();
	}
	public function getData(){
		return $this->data;
	}
	public function load(){
		if($this->currentFile){
			while (($buffer = fgets($this->currentFile,4096)) !== false) {
				list($key,$value) = explode('=',$buffer);
        		$this->data[$key] = $value;
    		}
		}
	}

	public function __destruct(){
		fclose($this->currentFile);
	}

}?>