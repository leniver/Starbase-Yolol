<?php

$distances = array_keys(array_fill(14,28,1));
$LL=23.67; // Distance between laser and turret
$LR=8.74; // Radius

$j=0;
$lineByChip=3;

foreach($distances as $d){
    for($i=0;$i<5;$i++){
      $j++;
      if ($j%$lineByChip) {
        $add = "\n";
      }else{
        $add = " goto1\n";
      }
      echo "if (:RF>=".$d.") and (:RF<" . ($d+0.2) . ") then :SMTP=". number_format(rad2deg(atan(($LL-$d)/$LR))+90, 2) . " end" . $add;
      $d += 0.2;
    }
}
