<?php 
$sResult = "";
if(count($_POST) == 2)
{
	$number1 = $_POST["number1"];
	$number2 = $_POST["number2"];
	
	$sResult = sprintf("The sum of %d and %d is %d", $number1, $number2, $number1 + $number2);
}
echo $sResult;
?>
