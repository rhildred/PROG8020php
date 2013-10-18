<?php

$aList = array("item0", "item1", "item2", "item3");

foreach ($aList as $i => $sItem)
{
      if($i != 0)
      {
            echo ", ";
      }
      echo $sItem;
}

?>