<?php

include 'Grid_2D.php';

class Sudoku extends Grid_2D{


	public function __construct($new_grid=array())
	{
		$this->set_nb_of_columns(9);
		$this->set_nb_of_lines(9);
		
		if (!empty($new_grid)) {
			for ($i = 0; $i < $this->get_nb_of_lines(); $i++) {
				for ($j = 0; $j < $this->get_nb_of_columns(); $j++) {
					$this->grid[$i][$j] = $new_grid[$i][$j];
				}
			}
		}
		else
		{
			for ($i = 0; $i < $this->get_nb_of_lines(); $i++) {
				for ($j = 0; $j < $this->get_nb_of_columns(); $j++) {
					$this->grid[$i][$j] = 0;
				}
			}
		}
	}
	
	public function squareContain($number, $i, $j){
		$k=$i-($i%3);
		$l=$j-($j%3);
		for ($i=$k; $i<$k+3; $i++){
			for ($j=$l; $j<$l+3; $j++){
				if ($this->grid[$i][$j]==$number) return true;
			}
		}
		return false;
	}
	
	public function is_valid($position)
	{
		if ($position == 81)
		{
			return true;
		}
		$i=$position/9;
		$j=$position%9;
		if ($this->grid[$i][$j]!=0) 	return ($this->is_valid($position+1));
		for ($k=1; $k<=9;$k++)
		{
			if ((!$this->lineContain($i+1, $k)) && (!$this->columnContain($j+1, $k)) && (!$this->squareContain($k, $i, $j)))
			{
				$this->grid[$i][$j]=$k;
				if ( $this->is_valid($position+1) ) 	return true;
			}
		}
		$this->grid[$i][$j]=0;
		return false;
	}
	
	
	public function printGrid()
	{
		for($i=0; $i<$this->get_nb_of_lines(); $i++)
		{
			for($j=0; $j<$this->get_nb_of_columns();$j++)
			{
				if ( ($j+1)%3==0 )
				{
					if ($j==($this->get_nb_of_columns()-1))
					{
						if (($i==2) || ($i==5))
						{
							echo $this->grid[$i][$j]."<br>------------------<br>";
						}
						else
						{
							echo $this->grid[$i][$j]."<br>";
						}
					}
					else
					{
						echo $this->grid[$i][$j].' | ';
					}
				}
		  		else
		  		{
		  			echo $this->grid[$i][$j];
		  		}
		  	}
		}
	}
}