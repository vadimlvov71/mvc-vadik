<?php

class BlogController extends BaseController {



/*
	public function __construct() {
		////
	}
*/

	public function index() {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "index";
	}
	public function section($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "blog:::section";
	}
	
	public function article($arg) {
		//$this->pageData['title'] = "Вход в личный кабинет";
		//$this->view->render('index', $content);
		echo "arg:<pre>";
		print_r($arg);
		echo "</pre>";
		echo "blog:::article";
	}
}
