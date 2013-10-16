<?php 

//print_r($_GET);

$sGenre = '%';

if(isset($_GET['Genre']))
{
	$sGenre = $_GET['Genre'];
}

$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");



$stmt = $db->prepare("SELECT * FROM cds WHERE genre LIKE CONCAT('%', ?, '%')");

$stmt->execute(array($sGenre));

$results = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($results);


?>