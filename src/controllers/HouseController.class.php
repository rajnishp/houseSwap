<?php

require_once 'dao/DAOFactory.class.php';
//require_once 'components/xxx.class.php';
//require_once '.class.php';

class HouseController {

	

	function __construct (  ){
		$DAOFactory = new DAOFactory();
		$this -> houseDAO = $DAOFactory->getHousesDAO();
		

	}

	function render ($id){
		// here its shower that user is not in session
		global $configs; 
		$baseUrl = $configs["COLLAP_BASE_URL"];
		try{
			//$topProjects = $this -> projectDAO -> getTopProjects(); // have not found the function find and replace
			//require_once 'views/landing/index.php';

			$house = $this->houseDAO->load($id);
			if(isset($house) || $house == null){
				echo "404, Add page";
			}else{
			var_dump($house);

			echo "house";
		}

		} catch (Exception $e) {

			echo "404, Add page";
		}

	}


}



?>