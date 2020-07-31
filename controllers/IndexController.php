<?php

class IndexController extends BaseController {

	
	public function index() {
		//$this->pageData['title'] = "Первая страница сайта - название сайта";
		$this->pageData['title'] = "Пaaaaaaaaaa";
		
		$this->pageData['row'] = $this->model->getRows(1, 10);
		$this->view->render("index", $this->pageData);
	}

	public function contacts() {
		$this->pageData['title'] = "Page: contacts";
		$this->pageData['row'] = $this->model->getRows(10, 2);
		$this->view->render('contacts', $this->pageData);
	}
	public function about() {
		$this->pageData['title'] = "Page: about";
		$this->view->render('about', $this->pageData);
	}
}
