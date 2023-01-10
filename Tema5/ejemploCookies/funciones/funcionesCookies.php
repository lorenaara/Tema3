<?
    function productoVisto($id){
        //Si no existe ninguna cookie 
        //creamos [0]
        if(!$_COOKIE['visto']){
            setcookie('visto[0]',$id);
        }else{
            //el array como maximo va a tener 3
            //si existe en el array 
            $array= $_COOKIE['visto'];
            //si el producto ya ha sido visto
            if(in_array($id, $array)){
                //quitar del array el valor $id
                $key = array_search($id, $array);
                unset($array[$key]);
                array_push($array,$id);
            }else{
                //si ya tiene 3 y no existe en el array
                if(count($array)==3){
                    unset($array[0]); 
                }
                array_push($array,$id);
            }
            actualizar($array);
        }
        //guardar en un array

        print_r($_COOKIE['visto']);
    }

    function actualizar($array){
        $cont=0;
        foreach($array as $id){
            setcookie('visto['.$cont.']', $id);
            $cont++;
        }
    }

    function mostrarUltimos(){
        if(isset($_COOKIE['visto'])){
            $array= $_COOKIE['visto'];
            $array=array_reverse($array);
            foreach($array as $id){
                $producto=findById($id);
                $producto = $producto[0];
                echo '<article class="card">';
                echo "<a href='./verProducto.php?producto=".$producto['codigo']. "'><img src='./webroot/".$producto['baja']."'></a>";
                echo "<p>". $producto['nombre']. "</p>";
                echo '</article>';
            }
        }
    }
?>