<?php 

$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");



$stmt = $db->prepare("SELECT * FROM `cds` WHERE genre = '';DROP DATABASE testme;#';");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($results);


?>


