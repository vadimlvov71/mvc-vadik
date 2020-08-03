<?php
spl_autoload_register(function ($class_name) {
    include '../classes/'.$class_name . '.php';
});
class BaseController {

	public $model;
	public $view;
	public $className;
	public $catalog;
	public $controllerName;
	protected $pageData = array();

	public function __construct() {
		$this->view = new View();
		$this->model = new Model();
		$this->pageData['menu'] = $this->model->getMenu();
		$this->className = get_class($this);
		$this->catalog = substr($this->className, 0, strpos($this->className, 'Controller'));
		$this->controllerName = strtolower($this->catalog);
		$this->pageData['controllerName'] = $this->controllerName;
	}	
	public function error404(){
		echo "404 page";
	}
}
