<?php

function autoLoader($class_name) {
	$class_path = 'class/'.$class_name.'.class.php';
	if (file_exists($class_path)) {
		include $class_path;
		return true;
	}
	throw new Exception('[AutoloadError] Class '.$class_name.' in '.$class_path.' not found');
}
spl_autoload_register('autoLoader');