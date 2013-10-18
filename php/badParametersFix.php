<?php 

$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");

//$sQuery =  "';DROP DATABASE testme;#'";
$sQuery = "POP"; 

if(isset($_GET['Genre']))
{
	$sQuery = $_GET['Genre'];
}

$stmt = $db->prepare("SELECT * FROM `cds` WHERE genre = ?");

$stmt->execute(array($sQuery));

$results = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($results);


?>
