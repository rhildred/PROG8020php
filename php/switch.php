<?php

$nTestScore = 'A';

switch($nTestScore)
{
	case 'A':
		echo "You got an a";
		
	case 'B':
		echo "Solid effort";
		break;
		
	case 'C':
		echo "You should have studied more";
		break;
	default:
		echo "You failed";
		break;
}