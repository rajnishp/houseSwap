<?php
/**
 * Class that operate on table 'houses'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-07-08 01:14
 */
class HousesMySqlExtDAO extends HousesMySqlDAO{

	/**
	 * Get all search records from table house
	 */
	public function getSearchResult( $keywords ){
		$sql = "SELECT * FROM houses WHERE address LIKE '%$keywords%' LIMIT 0, 30; ";
		$sqlQuery = new SqlQuery($sql);
		//$sqlQuery -> set($keywords);
		return $this->getList($sqlQuery);
	}

	public function loadLastTen(){
		$sql = 'SELECT * FROM houses order by id desc LIMIT 0, 10; ';
		$sqlQuery = new SqlQuery($sql);
		
		return $this->getList($sqlQuery);
	}
	
}
?>