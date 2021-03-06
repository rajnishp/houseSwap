<?php

/**
 * DAOFactory
 * @author: rahul lahoria
 * 
 */
require_once('utils/sql/Connection.class.php');
require_once('utils/sql/ConnectionFactory.class.php');
require_once('utils/sql/ConnectionProperty.class.php');
require_once('utils/sql/QueryExecutor.class.php');
require_once('utils/sql/Transaction.class.php');
require_once('utils/sql/SqlQuery.class.php');
require_once('utils/ArrayList.class.php');
class DAOFactory{
	
	/**
	 * @return HousesDAO
	 */
	public static function getHousesDAO(){
		require_once('HousesDAO.class.php');
		require_once('models/House.class.php');
		require_once('mysql/HousesMySqlDAO.class.php');
		require_once('mysql/ext/HousesMySqlExtDAO.class.php');

		return new HousesMySqlExtDAO();
	}


}
?>