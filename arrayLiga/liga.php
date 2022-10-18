<?php
$liga =
array(
    "Zamora" =>  array(
        "Salamanca" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 1
        )
    ),
    "Salamanca" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "4-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 2, "Penalti" => 1
        )
    ),
    "Avila" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 2
        ),
        "Salamanca" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 3, "Penalti" => 0
        ),
        "Valladolid" => array(
            "Resultado" => "1-3", "Roja" => 1, "Amarilla" => 0, "Penalti" => 1
        )
    ),
    "Valladolid" =>  array(
        "Zamora" => array(
            "Resultado" => "3-2", "Roja" => 1, "Amarilla" => 0, "Penalti" => 0
        ),
        "Salamanca" => array(
            "Resultado" => "3-1", "Roja" => 0, "Amarilla" => 0, "Penalti" => 0
        ),
        "Avila" => array(
            "Resultado" => "1-2", "Roja" => 1, "Amarilla" => 1, "Penalti" => 2
        )
    ),
);

echo "<table style='border:1px solid black; border-collapse:collapse'>";
echo "<thead><tr ><th  style='border:1px solid black;background:red; padding:10px '>Equipos</th>";
$cont=0;
$locales=array();
foreach ($liga as $key => $value) {
    echo "<th  style='border:1px solid black;padding:10px'> ";
    echo $key. "</th>";
    array_push($locales, $key); 
}
echo "</thead>";
foreach ($liga as $local => $partidos) {
    echo "<tr><th  style='border:1px solid black; padding:10px'> ";
    echo $local. "</th>";
    $cont=0;
    foreach ($partidos as $visitante => $result) {
        if($local ==$locales[$cont]){
            echo "<td  style='border:1px solid black; padding:10px; text-align: center'></td>";
        }
        echo "<td  style='border:1px solid black;  padding:10px; text-align: center'>";
        foreach ($result as $tres => $numero) {
            if($tres =="Resultado"){
                echo "<span style='background:green'>". $numero . "</span><br>";
            }elseif($tres =="Roja"){
                echo "<span style='background:red'>". $numero ."</span>  ";
            }elseif($tres=="Amarilla"){
                echo "<span style='background:yellow'>".  $numero ." </span>  ";
            }else{
                echo "<span style='background:orange'>" . $numero ."</span> </td>";
            }
        }
       
        $cont++;
    }
    echo "</tr>";
}
echo "</table>";

//GOLES 
$resultado=array();
foreach ($locales as $key => $equipos) {
    $resultado[$equipos]['puntos']=0;
    $resultado[$equipos]['Goles a favor']=0;
    $resultado[$equipos]['Goles en contra']=0;
}



foreach($liga as $local => $partido){
    foreach($partido as $visitante => $resultad){
        foreach($resultad as $puntos => $value){
            if($puntos =="Resultado"){
                $result= explode("-", $value);
                $rl=$result[0];
                $rv=$result[1];
                if($rl>$rv){
                    $resultado[$local]['puntos']+=3;
                }elseif($rl<$rv){
                    $resultado[$visitante]['puntos']+=3;
                }else{
                    $resultado[$local]['puntos']+=1;
                    $resultado[$visitante]['puntos']+=1;
                }
                $resultado[$local]['Goles a favor']+=$rl;
                $resultado[$visitante]['Goles a favor']+=$rv;
                $resultado[$local]['Goles en contra']+=$rv;
                $resultado[$visitante]['Goles en contra']+=$rl;
            }
        }
    }
}
echo "<br><br>";
echo "<table style='border:1px solid black; border-collapse:collapse'>";
echo "<thead><tr ><th  style='border:1px solid black; padding:10px'>Equipos</th> <th style='border:1px solid black;padding:10px'>Puntos</th><th style='border:1px solid black;padding:10px'>Goles a favor</th><th style='border:1px solid black;padding:10px'>Goles en contra</th></tr>";
foreach ($resultado as $equipo => $value) {
    echo "<tr><th  style='border:1px solid black; padding:10px'> ";
    echo $equipo. "</th>";
    foreach($value as $key =>$valores){
        echo "<td  style='border:1px solid black;  padding:10px; text-align: center'>". $valores ."</td>";
    }
    echo "</tr>";
}

?>
