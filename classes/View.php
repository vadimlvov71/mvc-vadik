<?php

class View {

	public $controllerName;
	public $pageName;
	public $data;
	public $parts;
	//////
	public function render($view, $data) {
		$this->controllerName = $data["controllerName"];
		$this->pageName = $view;
		$this->data = $data;
		$this->parts = $data['parts'];
		include_once '../layout/main.php';
		
	}
	public function content($path) {
		//echo $path."<br>";
		$controllerName = $this->controllerName;
		$pageName = $this->pageName;
		$data = $this->data;
		include_once '../views/'.$controllerName.'/'.$pageName.'.php';
	}
	public function breadcrums() {
		foreach($this->parts as $url => $part){
			echo $part."/";
		}
	}
}
