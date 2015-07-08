<?php

require_once 'dao/DAOFactory.class.php';
//require_once 'components/xxx.class.php';
//require_once '.class.php';

class HomeController {

	private $houseDAO;

	function __construct (  ){
		
		$DAOFactory = new DAOFactory();
		$this -> houseDAO = $DAOFactory->getHousesDAO();

	}

	function render (){
		// here its shower that user is not in session
		global $configs; 
		$baseUrl = $configs["COLLAP_BASE_URL"];
		try{
			//$topProjects = $this -> projectDAO -> getTopProjects(); // have not found the function find and replace
			$houses = $this->houseDAO->loadLastTen();
			var_dump($houses);
			require_once 'views/landing/landing.php';
			

		} catch (Exception $e) {

			echo "File missing at server";
		}

	}

	function processForm(){
		echo "search Restuls";
		
		$houses = $this->houseDAO->getSearchResult( $_GET["search"] );
		if(count($houses) == 0)
			echo "sorry, Now House";
		else
			var_dump($houses);

		try{
			//$topProjects = $this -> projectDAO -> getTopProjects(); // have not found the function find and replace
			require_once 'views/landing/landing.php';
			

		} catch (Exception $e) {

			echo "File missing at server";
		}




	}

	function postHouse(){
		//insert($house)
		$house = new House(
				$_POST['name'], 
				$_POST['contact'], 
				$_POST['address'], 
				$_POST['description'], 
				0, 
				null);
		
		$this -> houseDAO ->insert($house);

	}


}



?>