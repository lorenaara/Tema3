<?php
$lado=4;
$a=array();
for($i=0; $i<$lado; $i++) $a[$i]=array();

for($i=0; $i<$lado; $i++){
        for($j=0; $j<$lado;$j++){
            if($i==0|| $j==0){
                echo $a[$i][$j]=1 . " ";
            }else{
                $a[$i][$j]= $a[$i-1][$j]+ $a[$i][$j-1];
                echo $a[$i][$j] . " ";
            }
        }
        echo "<br>";
    }
?>