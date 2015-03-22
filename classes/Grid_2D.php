<?php

abstract class Grid_2D
{
	/**
	 * Text to encrypt/decrypt
	 * @var int
	 */
	protected $nbOfColumns;

	/**
	 * @var int
	 */
	protected $nbOfLines;
	
	/**
	 * @var void*
	 */
	protected $grid = array();
	
	/**
	 * @param int $new_nb_of_columns
	 * @return void
	 */
	public function set_nb_of_columns($new_nb_of_columns)
	{
		if (is_int($new_nb_of_columns)) {
			$this->nbOfColumns = $new_nb_of_columns;
		}
	}

	/**
	 * @return int $column_number
	 */
	public function get_nb_of_columns()
	{
		return $this->nbOfColumns;
	}

	/**
	 * @param int $new_nb_of_lines
	 * @return void
	 */
	public function set_nb_of_lines($new_nb_of_lines)
	{
		if (is_int($new_nb_of_lines)) {
			$this->nbOfLines = $new_nb_of_lines;
		}
	}

	/**
	 * @return void 
	 */
	public function get_nb_of_lines()
	{
		return $this->nbOfLines;
	}
	
	/**
	 * @return void
	 */
	public function setGrid($new_grid){
		if (is_array($new_grid)) {
			$this->grid = $new_grid;
		}
	}
	
	/**
	 * @return void*
	 */
	public function getGrid(){
		return $this->grid;
	}
	
	/**
	 * @abstract
	 */
 	abstract protected function printGrid();
 	
 	
 	/**
 	 * @param int $line_number
 	 * @param void* object
 	 * @return boolean
 	 */
 	public function lineContain($line_number, $object){
 		for($i=0;$i< $this->get_nb_of_columns();$i++){
 			if ($this->grid[$line_number-1][$i]==$object)
 			return true;
 		}
 		return false;
 	}
 	
 	/**
 	 * @param int $column_number
 	 * @param void* object
 	 * @return boolean
 	 */
 	public function columnContain($column_number, $object){
	 	for ($i = 0; $i < $this->get_nb_of_lines(); $i++) {
	 		if ($this->grid[$i][$column_number-1]==$object)
	 		return true;
	 	}
	 	return false;
 	}
	
	
}
?>