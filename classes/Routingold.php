<?php
spl_autoload_register(function ($class_name) {
    include '../controllers/'.$class_name . '.php';
});
class Routing {
	/*
	 * todo 
	 * transfer into the config file
	 * */
	private static $basePagesArray = array("search", "contacts", "about", "termsAndConditions");
	private	static $routingArray = array("shop" => ["catalog", "subcatalog", "itemdetail"], "blog" => ["article"]);
	
	
	public static function setRoute($uri) {
		$arg = array();
		$arg["index"] = "home";
		$i = 2;
		$basePagesArray = self::$basePagesArray;
		$routingArray = self::$routingArray;
		$route = explode("/", $uri);
		$firstLevelUri = $route[$i];
		$secondLevelUri = $route[++$i];
		$thirdLevelUri = $route[++$i];
		$forthLevelUri = $route[++$i];
		$controllerName = "IndexController";
		$actionName = "index";
		//self::$breadcrums[] = "index";
		if($firstLevelUri != '') {
			if(in_array($firstLevelUri, $basePagesArray)) {
				/*
				* one base pages uri from the config: each name - is a method in the IndexController 
				* for example "contacts", "about", "termsAndConditions" etc.
				* */
				$actionName = $firstLevelUri;
				$arg[$actionName] = $firstLevelUri;
			}else{
				/*
				* one uri: a controller name, when a method index is called automatically
				* for example "shop", "blog", etc
				 * */
				$controllerName = ucfirst($firstLevelUri. "Controller");
				$arg["second"] = $firstLevelUri;
				if($secondLevelUri != '') {
					
					/*
					 * two uri: the first part of the uri: is a controller name, the second one - a method is set in the config*
					 * for example "shop/TVsets", "blog/aboutTVsets", etc
					 * */
					$actionName = $routingArray[$firstLevelUri][0];
					$arg[$routingArray[$firstLevelUri][0]] = $secondLevelUri;
					//echo "controllerName".$controllerName."<br>";
					//echo "actionName".$actionName."<br>";
					if($thirdLevelUri != '') {						
						/*
						 * third uri: the first part of the uri: is a controller name, the second one - a method is set in the config, the third - if a shop is subcatalog, if a blog is an article name
						 * for example "shop/TVsets/plasma", "blog/aboutTVsets/how_to_define_tvset_quality", etc
						 * */
						$actionName = $routingArray[$firstLevelUri][1];
						$arg[$routingArray[$firstLevelUri][1]] = $thirdLevelUri;
						if($forthLevelUri != '') {
							/*
							 * forth uri: the first part of the uri: is a controller name, the second one - a method is set in the config, the fourth - a item slug
							 * for example "shop/TVsets/plasma/samsungA310"
							 * */
							$actionName = $routingArray[$firstLevelUri][2];
							$arg[$routingArray[$firstLevelUri][2]] = $forthLevelUri;
						}
					}
				}
			}
		}	
		
		echo "<pre>";
		print_r($arg);
		echo "</pre>";	
			
		if (class_exists($controllerName)) {
			$controller = new $controllerName($arg);
			$controller->$actionName();
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
