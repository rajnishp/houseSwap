<?php
	/**
	 * Object represents table 'houses'
	 *
     	 * @author: rajnish
     	 * @date: 2015-07-08 01:14	 
	 */
	class House{
		
		private $id;
		private $name;
		private $contact;
		private $address;
		private $description;
		private $from;
		private $type;

		function __construct ($name, $contact, $address, $description, $from, $type, $id = null) {
			$this -> id = $id;
			$this -> name = $name;
			$this -> contact = $contact;
			$this -> address = $address;
			$this -> description = $description;
			$this -> from = $from;
			$this -> type = $type;
		}

		function setId ( $id ) {
			$this -> id = $id;
		}

		function getId ( ) {
			return $this -> id;
		}

		function setName ( $name ) {
			$this -> name = $name;
		}

		function getName ( ) {
			return $this -> name;
		}

		function setContact ( $contact ) {
			$this -> contact = $contact;
		}

		function getContact ( ) {
			return $this -> contact;
		}

		function setAddress ( $address ) {
			$this -> address = $address;
		}

		function getAddress ( ) {
			return $this -> address;
		}

		function setDescription ( $description ) {
			$this -> description = $description;
		}

		function getDescription ( ) {
			return $this -> description;
		}

		function setFrom ( $from ) {
			$this -> from = $from;
		}

		function getFrom ( ) {
			return $this -> from;
		}
		
		function setType ($type) {
			$this -> type = $type;
		}

		function getType ( ) {
			return $this -> type;
		}
	}
?>