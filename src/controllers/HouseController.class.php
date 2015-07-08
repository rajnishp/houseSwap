<?php

require_once 'dao/DAOFactory.class.php';
//require_once 'components/xxx.class.php';
//require_once '.class.php';

class HouseController {

	

	function __construct (  ){
		
		

	}

	function render (){
		// here its shower that user is not in session
		global $configs; 
		$baseUrl = $configs["COLLAP_BASE_URL"];
		try{
			//$topProjects = $this -> projectDAO -> getTopProjects(); // have not found the function find and replace
			//require_once 'views/landing/index.php';
			echo "house";

		} catch (Exception $e) {

			echo "File missing at server";
		}

	}


}



?>