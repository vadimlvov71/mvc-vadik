<?php

class BlogController extends BaseController {
	public $blogList;
	public function __construct() {
		parent::__construct(); 
		$this->blogList = $this->model->getBlogRows();
	}	
	public function index() {
		$this->pageData['title'] = "The first page of Blog";
		$this->pageData['rows'] = $this->blogList;
		$this->view->render("index", $this->pageData);
	}

	public function article($slug) {
		echo "<pre>";
		print_r($slug);
		echo "</pre>";
		$this->pageData['content'] = $this->model->getDetail($slug["article"]);
		$this->pageData['title'] = $this->pageData['content']['title'];
		$this->pageData['secondmenu'] = $this->blogList;
		$this->pageData['suburi'] = "blog/";
		$this->view->render('article', $this->pageData);
	}
	
}
