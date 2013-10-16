<?php
$aAssociative = [1 => "August", 0 => "March", 4 => "April", 256 => "May"];

echo json_encode($aAssociative);

echo "\n";

echo "the month with the short-form 4 is ", $aAssociative[4];

echo "\n";

echo json_encode(array_keys($aAssociative));
