<?php
	/**
	 * Object represents table 'houses'
	 *
     	 * @author: http://phpdao.com
     	 * @date: 2015-07-08 01:14	 
	 */
	class House{
		
		private $id;
		private $name;
		private $contact;
		private $address;
		private $description;
		private $type;

		function __construct ($id, $name, $contact, $address, $description, $type) {
			$this -> id = $id;
			$this -> name = $name;
			$this -> contact = $contact;
			$this -> address = $address;
			$this -> description = $description;
			$this -> type = $type;
		}
		
	}
?>