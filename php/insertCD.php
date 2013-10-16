<?php 

try {
	if(!isset($_GET['title']) || !isset($_GET['arranger']) || !isset($_GET['genre']))
	{
		throw new Exception("missing information");
	}
	$sTitle = $_GET['title'];
	$sArranger = $_GET['arranger'];
	$sGenre = $_GET['genre'];
	$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");
	
	
	$stmt = $db->prepare("INSERT INTO cds(title, arranger, genre) VALUES (?,?,?)");
	
	
	
	$stmt->execute(array($sTitle, $sArranger, $sGenre));
	
	$count = $stmt->rowCount();
	echo '{"insert":{"rows":'. $count .'}}';
}
catch(Exception $e)
{
	echo "{\"error\" : \"", $e->getMessage(), "\"}";
}

?>