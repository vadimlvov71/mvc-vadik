<?php
class Routing {

	public static function setRoute($uri) {
		echo "test";
		/*Контроллер и action по умолчанию*/
		
		$controllerName = "IndexController";
		$modelName = "IndexModel";
		$action = "index";

		$route = explode("/", $uri);
		echo "<pre>";
			print_r($route);
			echo "</pre>";
		/*Определяем контроллер*/
		/*
		if($route[1] != '') {
			$controllerName = ucfirst($route[1]. "Controller");
			$modelName = ucfirst($route[1]. "Model");
		}


		require_once CONTROLLER_PATH . $controllerName . ".php"; //IndexController.php
		require_once MODEL_PATH . $modelName . ".php"; //IndexModel.php

		if(isset($route[2]) && $route[2] !='') {
			$action = $route[2];
		}

		$controller = new $controllerName();
		$controller->$action(); // $controller->index();
*/
	}
	
	public function errorPage() {

	}


}
