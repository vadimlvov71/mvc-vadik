<?php

class ShopController extends BaseController {



/*
	public function __construct() {
		////
	}
*/

	public function index() {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "shop:::index";
	}
	public function catalog($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "shop:::catalog";
	}
	public function subcatalog($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "shop:::subcatalog";
	}
	public function itemdetail($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "shop:::itemdetail";
	}
}
