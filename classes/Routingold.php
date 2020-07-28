<?php
spl_autoload_register(function ($class_name) {
    include '../controllers/'.$class_name . '.php';
});
class Routing {
	public static function setRoute($uri) {
		$i = 2;
		$arg = array();
		$basePagesArray = array("contacts", "about", "termsAndConditions");
		$routingArray = array("shop" => ["catalog", "subcatalog", "itemdetail"], "blog" => ["section", "article"]);
		
		$route = explode("/", $uri);
		$routes = $route;
		$firstLevelUri = $route[$i];
		$secondLevelUri = $route[++$i];
		$thirdLevelUri = $route[++$i];
		$forthLevelUri = $route[++$i];
		$controllerName = "IndexController";
		$actionName = "index";
		/*if($firstLevelUri != '') {
			if(in_array($firstLevelUri, $basePagesArray)) {
				/*первый уровень базовые страницы: каждое название - метод в IndexController */
				$actionName = $firstLevelUri;
			}else{
				/*первый уровень: название контроллера, а метод автоматически ставится - индекс*/
				$controllerName = ucfirst($firstLevelUri. "Controller");
				if($secondLevelUri != '') {
					/*второй уровень: первая часть - контроллер, вторая - обусловленный в конфиге метод*/
					$actionName = $routingArray[$firstLevelUri][0];
					$arg[$routingArray[$firstLevelUri][0]] = $secondLevelUri;
					if($thirdLevelUri != '') {
						/*третий уровень: первая часть - контроллер, вторая - обусловленный в конфиге метод, третий - параметр*/
						$actionName = $routingArray[$firstLevelUri][1];
						$arg[$routingArray[$firstLevelUri][1]] = $thirdLevelUri;
						if($forthLevelUri != '') {
							/*четвертый уровень: первая часть - контроллер, вторая - обусловленный в конфиге метод, четвертый - slug товара*/
							$actionName = $routingArray[$firstLevelUri][2];
							$arg[$routingArray[$firstLevelUri][2]] = $forthLevelUri;
						}
					}
				}
			}
		}*/
		$start = 2;
		for($i=2; $i<count($routes); $i++){
			if(in_array($routes[$start], $basePagesArray)){
				echo "eeeeeee<br>";
				/*первый уровень базовые страницы: каждое название - метод в IndexController */
				$actionName = $firstLevelUri;
			}
			 echo "routes:: ".$routes[$i]."<br>";
		}	
			
		
		echo "<pre>";
			print_r($route);
			echo "</pre>";
		$controller = new $controllerName();
		$controller->$actionName($arg);
			echo "!!!!!";
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
