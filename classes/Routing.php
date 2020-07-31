<?php
spl_autoload_register(function ($class_name) {
    include '../controllers/'.$class_name . '.php';
});
class Routing {
	/*
	 * todo 
	 * transfer into the config file
	 * */
	private static $basePagesArray = array("contacts", "about", "termsAndConditions");
	private	static $routingArray = array("shop" => ["catalog", "subcatalog", "itemdetail"], "blog" => ["section", "article"]);
		
	public static function setRoute($uri) {
		$i = 2;
		$arg = array();
		$basePagesArray = self::$basePagesArray;
		$routingArray = self::$routingArray;
		$route = explode("/", $uri);
		$firstLevelUri = $route[$i];
		$secondLevelUri = $route[++$i];
		$thirdLevelUri = $route[++$i];
		$forthLevelUri = $route[++$i];
		$controllerName = "IndexController";
		$actionName = "index";
		if($firstLevelUri != '') {
			if(in_array($firstLevelUri, $basePagesArray)) {
				/*
				* one uri base pages from config: each name - method in IndexController 
				* for example "contacts", "about", "termsAndConditions"
				* */
				$actionName = $firstLevelUri;
			}else{
				/*
				* one uri: a controller name, when a method index is called automatically
				* for example "shop", "blog", etc
				 * */
				$controllerName = ucfirst($firstLevelUri. "Controller");
				if($secondLevelUri != '') {
					/*
					 * two uri: the first part of the uri: is a controller name, the second one - a method is set in the config*
					 * for example "shop/TVsets", "blog/aboutTVsets", etc
					 * */
					$actionName = $routingArray[$firstLevelUri][0];
					$arg[$routingArray[$firstLevelUri][0]] = $secondLevelUri;
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
		if (class_exists($controllerName)) {
			$controller = new $controllerName();
			$controller->$actionName($arg);
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
