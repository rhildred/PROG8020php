<?php

header('Content-type: application/json');
$db = new PDO ( "mysql:host=localhost;dbname=cds", "root", "" );

// check if last part of url is numeric
$aUrls = explode('/', $_SERVER['REQUEST_URI']);
$nId =  array_pop($aUrls);

if (is_numeric ( $nId )) {
	// get a single cd
	$stmt = $db->prepare("SELECT * FROM cds WHERE id = ?");
	$stmt->execute(array($nId));
	$result = $stmt->fetchObject();
	echo json_encode($result);
} else {
	// initialize to wildcards
	$sGenre = '%';
	$sArranger = '%';
	$sTitle = '%';
	
	// make them specific if data
	if (isset ( $_GET ['Genre'] )) {
		$sGenre = $_GET ['Genre'];
	}
	
	if (isset ( $_GET ['Arranger'] )) {
		$sArranger = $_GET ['Arranger'];
	}
	
	if (isset ( $_GET ['Title'] )) {
		$sTitle = $_GET ['Title'];
	}
	
	// prepare with 3 placeholders
	$stmt = $db->prepare ( "SELECT * FROM cds WHERE genre LIKE CONCAT('%', ?, '%') AND arranger LIKE CONCAT('%', ?, '%') AND title LIKE CONCAT('%', ?, '%')" );
	
	// execute with 3 parameters
	$stmt->execute ( array (
			$sGenre,
			$sArranger,
			$sTitle 
	) );
	
	$results = $stmt->fetchAll ( PDO::FETCH_OBJ );
	
	echo json_encode ( $results );
}

?>