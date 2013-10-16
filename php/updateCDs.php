<?php 

$db = new PDO("mysql:host=localhost;dbname=cds", "root", "");



$stmt = $db->prepare("UPDATE cds SET genre = ? WHERE arranger = ?");

$stmt->execute(array('Hip-Hop', 'Knaan'));

$count = $stmt->rowCount();
echo '{"update":{"rows":'. $count .'}}';


?>