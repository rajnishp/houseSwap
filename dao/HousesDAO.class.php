<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2015-07-08 01:14
 */
interface HousesDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return Houses 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param house primary key
 	 */
	public function delete($id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param Houses house
 	 */
	public function insert($house);
	
	/**
 	 * Update record in table
 	 *
 	 * @param Houses house
 	 */
	public function update($house);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByContact($value);

	public function queryByAddress($value);

	public function queryByDescription($value);

	public function queryByType($value);


	public function deleteByName($value);

	public function deleteByContact($value);

	public function deleteByAddress($value);

	public function deleteByDescription($value);

	public function deleteByType($value);


}
?>