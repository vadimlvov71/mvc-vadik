<?php
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
class Model {

	public function getMenu() {
		$array = array();
		$array["index"] = "Home";
		//$array["search"] = "Domain Zone Search";
		$array["contacts"] = "Contacts";
		$array["about"] = "About";
		$array["blog"] = "Blog";
		$array["shop"] = "Shop";
		return $array; 	
	}
	public function getBlogRows() {
		$array = array("first_blog" => "First Blog", "second_blog" => "Second Blog", "third_blog" => "Third Blog");

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
	public function getDetail($slug) {
		$result = array();
		if($slug == "first_blog"){
			$result['title'] = "First blog";
			$result['text'] = "First blog: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		}else if($slug == "second_blog"){
			$result['title'] = "Second blog";
			$result['text'] = "Second blog: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		}else{
			$result['title'] = "Third Blog";
			$result['text'] = "Third Blog: Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
		}
		
		return $result; 	
	}
	public function getShopCatalogs() {
		$array = array("first_catalog" => "First Catalog", "second_catalog" => "Second Catalog", "third_catalog" => "Third Catalog");
		return $array; 	
	}
	public function getShopSubCatalogs($catalog) {
		$array = array();
		if($catalog == "first_catalog"){
			$array = array("first_subcatalog" => "First subCatalog of First Catalog", "second_subcatalog" => "Second subCatalog of First Catalog", "third_subcatalog" => "Third subCatalog of First Catalog");
		}else if($catalog == "second_catalog"){
			$array = array("first_subcatalog" => "First subCatalog of Second Catalog", "second_subcatalog" => "Second subCatalog of Second Catalog", "third_subcatalog" => "Third subCatalog of Second Catalog");
		}else{
			$array = array("first_subcatalog" => "First subCatalog of Third Catalog", "second_subcatalog" => "Second subCatalog of Third Catalog", "third_subcatalog" => "Third subCatalog of Third Catalog");
		}
		return $array; 	
	}
	public function getShopItems($subCatalog) {
		$array = array();
		if($subCatalog == "first_subcatalog"){
			$array = array("item_one" => "Item One", "item_two" => "Item Two", "item_third" => "Item Three");
		}else if($subCatalog == "second_subcatalog"){
			$array = array("item_four" => "Item Four", "item_five" => "Item Five", "item_six" => "Item Six");
		}else{
			$array = array("item_seven" => "Item Seven", "item_eight" => "Item Eight", "item_nine" => "Item Nine");
		}
		return $array; 	
	}
}
