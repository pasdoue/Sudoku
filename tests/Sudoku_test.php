<?php

include('../classes/Sudoku.php');

$grid_array = 
array(
	array(3,0,4,6,0,0,0,0,0),
	array(0,0,5,1,0,8,0,3,0),
	array(8,0,0,0,0,0,1,2,4),
	array(4,3,0,8,0,0,0,0,0),
	array(0,0,0,0,7,0,0,0,0),
	array(0,0,0,0,0,4,0,8,6),
	array(5,9,6,0,0,0,0,0,1),
	array(0,4,0,2,0,9,3,0,0),
	array(0,0,0,0,0,1,8,0,9)
);

$difficult_grid =
array(
		array(8,5,0,0,0,2,4,0,0),
		array(7,2,0,0,0,0,0,0,9),
		array(0,0,4,0,0,0,0,0,0),
		array(0,0,0,1,0,7,0,0,2),
		array(3,0,5,0,0,0,9,0,0),
		array(0,4,0,0,0,0,0,0,0),
		array(0,0,0,0,8,0,0,7,0),
		array(0,1,7,0,0,0,0,0,0),
		array(0,0,0,0,3,6,0,4,0)
);



echo '
initializing Sudoku grid  result expect to be 		empty grid <br><br>';
$basic_test = new Sudoku();
$basic_test->printGrid();


echo '
<br><br>initializing Sudoku grid  with $grid_array expect to be a non empty grid <br><br>';
$advanced_tests = new Sudoku($grid_array);
$advanced_tests->printGrid();


echo '
<br><br>Verify if column 5 contain 7  	result expect to be succeed<br>';

if ($advanced_tests->columnContain(5, 7)==true) echo 'succeed';
else echo 'fail';


echo '
<br><br>Verify if column 6 contain 3  	result expect to be fail<br>';

if ($advanced_tests->columnContain(6, 3)==true) echo 'succeed';
else echo 'fail';



echo '
<br><br>Verify if line 7 contain 9  	result expect to be succeed<br>';

if ($advanced_tests->lineContain(7, 9)==true) echo 'succeed';
else echo 'fail';



echo '
<br><br>Verify if square in left bottom contain 4   	result expect to be succeed<br>';

if ($advanced_tests->squareContain(4, 6, 2)==true) echo 'succeed';
else echo 'fail';


echo '
<br><br>Verify if square in right middle contain 2   	result expect to be fail<br>';

if ($advanced_tests->squareContain(2, 4, 7)==true) echo 'succeed';
else echo 'fail';


echo '
<br><br>Solving grid   	result expect to be correct sudoku grid answer<br>';

if ($advanced_tests->is_valid(0)) $advanced_tests->printGrid();
else echo 'fail';



set_time_limit(0);
$timestart=microtime(true);

echo '
<br><br>Solving difficult grid   	result expect to be correct sudoku grid answer<br>';

$difficult_grid_object = new Sudoku($difficult_grid);
if ($difficult_grid_object->is_valid(0)) $difficult_grid_object->printGrid();
else echo 'fail';

$timeend=microtime(true);
$time=$timeend-$timestart;

$page_load_time = number_format($time, 3);
echo "Debut du script: ".date("H:i:s", $timestart).'<br>';
echo "<br>Fin du script: ".date("H:i:s", $timeend).'<br>';
echo "<br>Script execute en " . $page_load_time . " sec <br>";








