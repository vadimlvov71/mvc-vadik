<?php
spl_autoload_register(function ($class_name) {
    include '../models/'.$class_name . '.php';
});
 
class IndexController extends BaseController {
	
	private $modelIndex;
	
	/*public function __construct($request) {
		parent::__construct($request);
		$this->modelIndex = new Index();
	}*/
	public function index($request) {
		$this->pageData['title'] = "Home";
		$this->pageData['row'] = $this->model->getRows(1, 10);
		$this->pageData['text'] = Index::getText("index");
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
		$this->pageData['text'] = Index::getText("contacts");
		$this->view->render('contacts', $this->pageData);
	}
	public function about() {
		$this->pageData['title'] = "About";
		$this->pageData['text'] = Index::getText("about");
		$this->view->render('about', $this->pageData);
	}
}
