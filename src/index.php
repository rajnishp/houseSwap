<?php
include_once "controllers/HouseController.class.php";
include_once "controllers/HomeController.class.php";


require_once 'utils/Util.php';
require_once 'utils/Timer.php';
require_once 'utils/ShopbookLogger.php';
require_once 'cache/AppCacheRegistry.class.php';


/* Setting up the app-configurations globally for use across classes */
global $configs;
$configs = json_decode (file_get_contents('house-swap-configs.json'), true);

/* Setting up the logger globally for use across classes */
global $logger;
$logger = new ShopbookLogger();
$logger -> enabled = true;
$logger -> debug ("Setting up ...");

$route = explode("/",$_SERVER[REQUEST_URI]);
//var_dump($route);

if ( ! isset($_SESSION['user_id']) && count($route) <= 1  ){
	//langing page of collap
	$homeController = new HomeController();
	$homeController -> render ();
}else {

		$page = explode("?", $route[1] );
		
		//single page app
		switch ($page[0]) {
			case "house":
										
					$houseController = new HouseController();
					$houseController -> render($route[2]);
				break;

			case "search":
					$homeController = new HomeController();
					$homeController -> processForm ();	
				break;

			case "postHouse":
					$homeController = new HomeController();
					$homeController -> postHouse ();	
				break;

			default:
						//langing page of houseswap 
					$homeController = new HomeController();
					$homeController -> render ();				
				break;
		}

	
}

?>