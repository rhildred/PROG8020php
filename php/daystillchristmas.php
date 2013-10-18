<?php
date_default_timezone_set ( "America/Toronto" );

$tChristmas = mktime ( 0, 0, 0, 12, 25 );

$aChristmas = getDate ( $tChristmas );
$tNow = time ();

$aNow = getDate ( $tNow );

$nDaysTillChristmas = $aChristmas ["yday"] - $aNow ["yday"];

printf ( "There are %d days till Christmas", $nDaysTillChristmas );

?>