<?php

class BlogController extends BaseController {
	public $blogList;
	public $request;
	
	
	public function __construct($request) {
		parent::__construct($request); 
		$this->blogList = $this->model->getBlogRows();
		$this->pageData['path_uri'] = "/".$this->controllerName."/";
		$this->pageData['rows'] = $this->blogList;
	}	
	public function index() {
		$this->pageData['title'] = "The first page of Blog";
		//$this->pageData['path_uri'] = "/".$this->controllerName."/";
		$this->view->render("index", $this->pageData);
	}

	public function article($request) {
		$article = $request->attributes->getAttribute("article");
		$articleName = $this->model->getDetail($article);
		$this->pageData['content'] = $this->model->getDetail($article);
		$this->pageData['title'] = $this->pageData['content']['title'];
		$this->pageData['secondmenu'] = $this->blogList;
		$this->pageData['breadcrumbs'][$article] = $this->pageData['title'];
		//$this->pageData['path_uri'] = "/".$this->controllerName."/";
		$this->view->render('article', $this->pageData);
	}
	
}
