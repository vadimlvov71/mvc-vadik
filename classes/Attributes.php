<?php

class Attributes {
	
	public  $attributes = array();
	
	public function setAttribute($key,  $value){
		$this->attributes[$key] = $value;
		return $this->attributes;
	}
	public function getAttribute($key){
		$value = $this->attributes[$key];
		return $value;
	}
	
}
