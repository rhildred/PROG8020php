<?php 

$db = null;
try {
	
	// take nrow as a parameter
	if(!isset($_GET['nrow'])) throw new Exception("must delete a row number");

	$nRow = $_GET['nrow'];
	
	// Create a new connection to database cds on server localhost
	$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");
	
	// $stmDEL gets a reference to the DELETE clause
	$stmtDEL = $db->prepare("DELETE FROM cds WHERE id = ?");
	
	
	// use the $stmtDEL reference to execute query with $nRow 
	$stmtDEL->execute(array($nRow));
	
	// check to see if I deleted any rows
	$count = $stmtDEL->rowCount();
	
	// print results
	echo '{"delete":{"rows":'. $count .'}}';

}
catch(Exception $e)
{
	// print error message
	echo "{\"error\" : \"", $e->getMessage(), "\"}";
}


?>