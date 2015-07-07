<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return HousesDAO
	 */
	public static function getHousesDAO(){
		return new HousesMySqlExtDAO();
	}


}
?>