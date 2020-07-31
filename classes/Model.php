<?php

class Model {

	public function getMenu() {
		$array = array();
		//$array[""] => "Home";
		$array["contacts"] => "Contacts";
		$array["about"] => "About";
		return $array; 	
	}
	//////
	public function getRows($id, $factor) {
		$array = array();
		$length = $id * $factor;
		for ($x = $id; $x <= $length; $x++) {
			$array[] = $x;
		}
		return $array; 	
	}
	
}
