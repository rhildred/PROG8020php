<?php

$sName = "Bruce";

if(isset($_GET["name"]))
{
	$sName = $_GET["name"];
}

echo json_encode(["greeting"=>"hello", "name"=>$sName] );

?>