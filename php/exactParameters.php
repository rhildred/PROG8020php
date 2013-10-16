<?php 

$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");



$stmt = $db->prepare("SELECT * FROM cds WHERE genre = ? ");

$stmt->execute(array('POP'));

$results = $stmt->fetchAll(PDO::FETCH_OBJ);

echo json_encode($results);


?>