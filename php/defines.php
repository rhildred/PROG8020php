<?php
define("HSTRATE", .13);

$nPriceBefore = 12.95;

echo $nPriceBefore, " with HST is ", (HSTRATE + 1) * $nPriceBefore; 