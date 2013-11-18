<?php

$db = new PDO ( "mysql:host=localhost;dbname=swag", "root", "" );

// check if last part of url is numeric
$aUrls = explode('/', $_SERVER['REQUEST_URI']);
$nId =  array_pop($aUrls);

if (is_numeric ( $nId )) {
	// get a single cd
	$stmt = $db->prepare("SELECT * FROM categories WHERE id = ?");
	$stmt->execute(array($nId));
	$result = $stmt->fetchObject();
	echo json_encode($result);
} else {
	
	// prepare with 3 placeholders
	$stmt = $db->prepare ( "SELECT * FROM categories" );
	
	// execute with 3 parameters
	$stmt->execute ();
	
	$results = $stmt->fetchAll ( PDO::FETCH_OBJ );
	
	echo json_encode ( $results );
}

?>