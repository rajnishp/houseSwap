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
			//require_once 'views/landing/index.php';
			echo "hello";

		} catch (Exception $e) {

			echo "File missing at server";
		}

	}

	function processForm($keywords){


		$this->houseDAO->getSearchResult( $keywords );



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