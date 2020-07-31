<?php
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
class BaseController {

	public $model;
	public $view;
	protected $pageData = array();

	public function __construct() {
		$this->view = new View();
		$this->model = new Model();
		$this->pageData['menu'] = $this->model->getMenu();
		$className = get_class($this);
		$catalog = substr($className, 0, strpos($className, 'Controller'));
		$controllerName = strtolower($catalog);
		$this->pageData['controllerName'] = $controllerName;
	}	
	public function error404(){
		echo "404 page";
	}
}
