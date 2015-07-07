<?php
include_once "controllers/HousesController.class.php";


require_once 'utils/Util.php';
require_once 'utils/Timer.php';
require_once 'utils/ShopbookLogger.php';
require_once 'cache/AppCacheRegistry.class.php';


/* Setting up the app-configurations globally for use across classes */
global $configs;
$configs = json_decode (file_get_contents('collap-configs.json'), true);

/* Setting up the logger globally for use across classes */
global $logger;
$logger = new ShopbookLogger();
$logger -> enabled = true;
$logger -> debug ("Setting up ...");


$_SESSION['type'] = "admin";
$route = explode("/",$_SERVER[REQUEST_URI]);

if ( ! isset($_SESSION['user_id']) && count($route) <= 1  ){
	//langing page of collap
	$homeController = new HomeController();
	$homeController -> render ();
}else {

		$page = $route[1];
		
		//single page app
		switch ($page) {
			case "houses":
										
					$housesController = new HousesController();
					$HousesController -> render($route[2]);
				break;

			case "search":

					$searchController = new SearchController($route[2]);
					$searchController -> render();
				break;

			default:
						//langing page of houseswap 
					$homeController = new HomeController();
					$homeController -> render ();				
				break;
		}

	
}

?>