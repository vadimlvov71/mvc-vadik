<?php
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
class Request {
	
	public $attributes;
	
	public function __construct() {
		$this->attributes = new Attributes();
	}
	//////
	
}
