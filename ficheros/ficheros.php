<?php
/*
    //abrir un fichero SI EXISTE
    //Si se va a abrir para lectura con r
    //comprobar que exista antes

    //Leer
    if(!file_exists('miarchivo.txt')){
        echo "<br>No Existe";
    }else{
        echo "<br>Existe";
            if(!$fp = fopen('miarchivo.txt', 'r')){
                echo "<br>Ha habido un problema al abrir el archivo";
            }else{
                //leer el fichero entero
                $leido= fread($fp, filesize('miarchivo.txt'));
                echo "<br>". $leido ;
                fclose($fp); //cerrar el fichero
            }
    }
    echo "<h2>Leer linea por linea </h2>";
    //leer linea por linea
    if(!file_exists('miarchivo.txt')){
        echo "<br>No Existe";
    }else{
        echo "<br>Existe";
            if(!$fp = fopen('miarchivo.txt', 'r')){
                echo "<br>Ha habido un problema al abrir el archivo";
            }else{
                //leer el fichero entero
               while($lea = fgets($fp, filesize('miarchivo.txt'))){
                echo "<br>";
                echo $lea;
               }
                fclose($fp); //cerrar el fichero
            }
    }

    //Escribir
    //abrir el fichero para escribir w
   //Escribir al principio borrando lo que estaba escrito
    if($fp=fopen('miarchivo.txt', 'w')){
        $escribir = '08/11/22';
        fwrite($fp, $escribir, strlen($escribir)); //de esa manera escribe toda la cadena
        fclose($fp);
    }else{
        echo "<br> Ha habido un error al abrir el fichero";
    }
*/
    //cambiar la fecha de 22 a 2022
    //replace str_replace
    //para poder leer y escribir r+
    if(!file_exists('miarchivo.txt')){
        echo "<br>No Existe";
    }else{
        echo "<br>Existe";
            if(!$fp = fopen('miarchivo.txt', 'r+')){
                echo "<br>Ha habido un problema al abrir el archivo";
            }else{
                $leido = fread($fp, filesize('miarchivo.txt'));
                $remplaza= str_replace('/22', '/2022', $leido);
                //fseek pone el punto donde le indiques
                //rewind siempre pone el puntero en 0
                fseek($fp, 0);
                fwrite($fp,$remplaza, strlen($remplaza));
                fclose($fp); 
            }
    }
?>