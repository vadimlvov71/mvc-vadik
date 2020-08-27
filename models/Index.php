<?php

class Index  {

	public static function getTLD() {
			
		$array = array('a1' => 'aaa', 'a2' => 'bbb', 'a3' => 'ccc', 'a4' => 'dddd', 'a5' => 'abc', 'a6' => 'abb', 'a7' => 'ccb', 'a8' => 'ddc', 'a9' => 'bbc', 'a10' => 'aab');
		
		return $array; 	
	}
	
	public static function striStrArray($array, $str, $type){
		$indexes = array();
		foreach($array as $key => $value){
			
			if(stristr($value, $str)){
				
				if($type == "dbs"){
					$result = $value;
				}else{
					$result = $key;
				}
				$indexes[] = $result;
			}
		}
		return $indexes;
	}
	
	public static function getText($page) {
		$result = "";	
		if($page == "index"){
			$result = "It`s the first page of the site";
		}else if($page == "contacts"){
			$result = "It`s the page of contacts";
		}else if($page == "about"){
			$result = "about of us";
		}
		return $result; 	
	}
}
