<?php

class View {

	public $controllerName;
	public $pageName;
	public $data;
	//////
	public function render($view, $data) {
		$this->controllerName = $data["controllerName"];
		$this->pageName = $view;
		$this->data = $data;
		include_once '../layout/main.php';
		
	}
	public function content($path) {
		echo $path."<br>";
		$controllerName = $this->controllerName;
		$pageName = $this->pageName;
		$data = $this->data;
		include_once '../views/'.$controllerName.'/'.$pageName.'.php';
	}
}
