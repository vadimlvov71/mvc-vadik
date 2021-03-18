<?php
spl_autoload_register(function ($class_name) {
	$path = '../classes/'.$class_name . '.php';
	if (file_exists($path)) {
		include_once $path;
	}
});
class Request {
	
	public $attributes;
	
	public function __construct() {
		$this->attributes = new Attributes();
	}
	//////
	
}
