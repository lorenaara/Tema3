<?php

$datos= [2,5,9,7,6,3,1,5,4,8,3,2,6,9,3,5,1,2,3];
foreach ($datos as $key => $value) {
    if($value==3){
        $value =$key;
    }
    echo  $value . ' ';
}
?>
