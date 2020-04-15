<?php
spl_autoload_register(function($className) {
	$className=str_replace('\\','/',$className);
	$className=getRegisterSensitiveClassName($className);
	try{
		if(!file_exists($file=SITE_PATH.$className.".php")){
			throw new Exception("Class not founded");
		}
		require_once($file);
	}
	catch(Exception $e){
		http_response_code(400);
		echo $e->getMessage();
	}
});

function getRegisterSensitiveClassName($className){
	for ($i = 0; $i < strlen($className); $i++) {
		if (ctype_upper($className[$i])) {
			$className[$i] = strtolower($className[$i]);
			return $className;
		}
	}
}
?>
