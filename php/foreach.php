<?php
$aAssociative = ["mr" => "March", "ap" => "April", "my" => "May"];


foreach($aAssociative as $sShort => $sMonth)
{
	echo $sMonth, " is the month with the short form of ", $sShort, "\n";
}