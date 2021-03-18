<?php

spl_autoload_register(function ($class_name) {
	$path = '../controllers/'.$class_name . '.php';
	if (file_exists($path)) {
		include_once $path;
	}
});
class Routing {
	/*
	 * todo 
	 * transfer into the config file
	 * */
	private static $basePagesArray = array("search", "contacts", "about", "termsAndConditions");
	private	static $routingArray = array("shop" => ["catalog", "subcatalog", "itemdetail"], "blog" => ["article"]);
	
	
	public static function setRoute($uri) {
		$request = new Request();
		$controllerName = "IndexController";
		$actionName = "index";

		$basePagesArray = self::$basePagesArray;
		$routingArray = self::$routingArray;
		$route = explode("/", $uri);

		if($_SERVER['SERVER_NAME'] == "localhost"){
			$limit = 2;
		}else{
			$limit = 1;
		}
		array_splice($route, 0, $limit);
		$numRouteParts = count($route);
		for ($y = 0; $y <= $numRouteParts; $y++) {
			if($numRouteParts == 1){
				if(in_array($route[$y], $basePagesArray)) {
					/*
				* one base pages uri from the config: each name - is a method in the IndexController 
				* for example "contacts", "about", "termsAndConditions" etc.
				* //*/
					$actionName = $route[$y];
				}else{
					//echo "route:: ".$route[$y]."<br>";
					if(empty($route[$y])){
						$name = "index";
					}else{
						$name = $route[$y];
					}
					$controllerName = ucfirst($name. "Controller");
				}
				$request->attributes->setAttribute($actionName, $actionName);
				break;
			}else{
				if($numRouteParts > 2){
					$index = $numRouteParts;
					$index -= 2;
					
					$actionName = $routingArray[$route[0]][$index];
					foreach($routingArray as $key => $items){
						if($key == $route[0]){
							for ($i = 0; $i <= count($items); $i++) {
								if($numRouteParts > $i){
									$x = $i;
									$request->attributes->setAttribute($items[$i], $route[++$x]);
								}
							}
						}
					}
				}else{
					$value = $route[1];
					$actionName = $routingArray[$route[0]][0];
					$request->attributes->setAttribute($actionName, $value);
				}
				$controllerName = ucfirst($route[0]. "Controller");
				break;
			}
		}
		//echo "controllerName".$controllerName."actionName".$actionName."";
		if (class_exists($controllerName)) {
			$controller = new $controllerName($request);
			$controller->$actionName($request);
		}else{
			self::ErrorPage404();
		}
	}
	public static function ErrorPage404()
	{
        $controller = new IndexController();
        $controller->error404();
    }
}
