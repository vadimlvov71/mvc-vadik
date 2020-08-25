<?php
spl_autoload_register(function ($class_name) {
    include '../models/'.$class_name . '.php';
});
class IndexController extends BaseController {

	
	public function index() {
		$this->pageData['title'] = "Home";
		//$this->pageData['title'] = "Пaaaaaaaaaa";
		
		$this->pageData['row'] = $this->model->getRows(1, 10);
		$this->view->render("index", $this->pageData);
	}
	public function search() {
		$this->pageData['title'] = "Search";
		$str = $_POST["zone"];
		$array = Index::getTLD();
		$this->pageData['result'] = Index::striStrArray($array, $str, "dbs");
		$this->view->render('search', $this->pageData);
	}
	public function contacts($request) {
		$this->pageData['title'] = "Contacts";
		$this->pageData['request'] = $request;
		$this->pageData['row'] = $this->model->getRows(10, 2);
		$this->view->render('contacts', $this->pageData);
	}
	public function about() {
		$this->pageData['title'] = "About";
		$this->pageData['row'] = $this->model->getRows(1, 1);
		$this->view->render('about', $this->pageData);
	}
}
