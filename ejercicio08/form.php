<?php
    require("./validaciones.php");
?>

    <?php
    if(validarForm($_REQUEST['alfabetico'], $_REQUEST['numerico'], $_REQUEST['fecha'], $_REQUEST['radio'], $_REQUEST['elige'], $_REQUEST['check'], $_REQUEST['telefono'], $_REQUEST['email'], $_REQUEST['pass'], $_REQUEST['documento'])){

    }else{
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ejercicio 08</title>
        </head>
        <body>
            <h2>Formulario de registro</h2>
            <form action="./form.php" method="post" enctype="multipart/form-data">
            <p>
            <label for="alfabetico">Alfabetico</label>
            <input type="text" name="alfabetico" id="idAlfabetico" placeholder="Nombre" value="<?php
                if(enviado() && !vacio("alfabetico")) echo $_REQUEST['alfabetico'];
            ?>">
            <?php
                if(vacio("alfabetico") && enviado()){
                    ?>
                    <span style="color:red">Debes introducir el nombre</span>
                    <?php
                }
            ?>
            </p>
            <p>
            <label for="alfaOpcional">Alfabetico opcional</label>
            <input type="text" name="alfaOpcional" id="idAlfaOpcional" placeholder="Nombre" value="<?php
                if(enviado() && !vacio("alfaOpcional")) echo $_REQUEST['alfaOpcional'];
            ?>">
            </p>
            <p>
            <label for="numerico">Alfanumerico</label>
            <input type="text" name="numerico" id="idNumerico" placeholder="Apellido" value="<?php
                if(enviado() && !vacio("numerico")) echo $_REQUEST['numerico'];
            ?>">
            <?php
                if(vacio("numerico") && enviado()){
            ?>
                <span style="color:red">Debes introducir el Apellido</span>
            <?php
                }
            ?>
            </p>
            <p>
            <label for="numeOpcional">Alfanumerico Opcional</label>
            <input type="text" name="numeOpcional" id="idNumeOpcinal" placeholder="Apellido" value="<?php
                if(enviado() && !vacio("numOpcional")) echo $_REQUEST['numOpcional'];
            ?>">
            </p>
            <p>
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" id="idFecha" value="<?php
                if(enviado() && !vacio("fecha")) echo $_REQUEST['fecha'];
            ?>">
            <?php
                if(enviado()&& vacio("fecha")){
            ?>
            <span style="color:red;">Debes introducir la fecha</span>
            <?php
                }
            ?>
        
            </p>
            <p>
            <label for="fechaOpcional">Fecha Opcional</label>
            <input type="date" name="fechaOpcional" id="idFechaOpcional" value="<?php
                if(enviado() && !vacio("fechaOpcional")) echo $_REQUEST['fechaOpcional'];
            ?>">
            </p>
            <p>
            <p>Radio Obligatorio</p>    
            <input type="radio" name="radio" id="idUno" value="uno"
                <?php
                    if(enviado() && existe("radio")){
                     if($_REQUEST["radio"]=="uno"){
                         echo "checked";
                     }
                    }   
                ?>
            >
            <label for="idUno">Opcion1</label>
            <input type="radio" name="radio" id="idDos" value="dos"
                <?php
                    if(enviado() && existe("radio")){
                     if ($_REQUEST["radio"]== "dos"){ 
                        echo "checked";
                     }
                    } 
                ?>>
            <label for="idDos">Opcion2</label>
            <input type="radio" name="radio" id="idTres" value="tres" 
                <?php
                    if(enviado() && existe("radio")){
                        if($_REQUEST['radio']=="tres"){
                            echo "checked"; 
                        }
                    } 
                ?>
            >
            <label for="idTres">Opcion3</label>
            <?php
                if(enviado() && !existe("radio")){
            ?>
            <span style="color:red">Debes elegir una opcion</span>
            <?php
                }
            ?>
            </p>
            <p>
            <label for="elige">Elige una opcion</label>
            <select name="elige" id="elige">
                <option value="0">Seleccione</option>
                <option value="1"
                <?php
                    if(enviado() && existe("elige")){
                        if($_REQUEST['elige']==1){
                            echo "selected";
                        }
                    }
                ?>>Uno</option>
                <option value="2"
                <?php
                    if(enviado() && existe("elige")){
                        if($_REQUEST['elige']==2){
                            echo "selected";
                        }
                    }
                ?>
                >Dos</option>
                <option value="3"
                <?php
                    if(enviado() && existe("elige")){
                        if($_REQUEST['elige']==3){
                            echo "selected";
                        }
                    }
                ?>
                >Tres</option>
            </select>
            <?php
                if(enviado() && existe("elige") && $_REQUEST['elige']=='0'){
            ?>
                <span style="color:red;">Debes elegir una opcion</span>
            <?php
                }
            ?>
            </p>
            <p>Elige al menos 1 y maximo 3:</p>
            <input type="checkbox" name="check[]" id="idCheck1" value="1"
            <?php
                if(enviado()&& existe('check')){
                    //in_array comprueba que un valor existe en el array
                    //el primer valor es el valor que debe de comprobar que esta en el array y el sugundo es el array
                    if(in_array("1",$_REQUEST['check'])){
                        echo "checked";
                    }
                }
            ?>
            >
            <label for="idCheck1">Check1</label>
            <input type="checkbox" name="check[]" id="idCheck2" value="2" 
            <?php
                if(enviado() && existe("check")){
                    if(in_array("2",$_REQUEST['check'])){
                        echo "checked";
                    }
                }
            ?>
            >
            <label for="idCheck2">Check2</label>
            <input type="checkbox" name="check[]" id="idCheck3" value="3"
            <?php
                if(enviado() && existe("check")){
                    if(in_array("3",$_REQUEST['check'])){
                        echo "checked";
                    }
                }
            ?>>
            <label for="idCheck3">Check3</label>
            <input type="checkbox" name="check[]" id="idCheck4" value="4"
            <?php
                if(enviado() && existe("check")){
                    if(in_array("4",$_REQUEST['check'])){
                        echo "checked";
                    }
                }
            ?>
            >
            <label for="idCheck4">Check4</label>
            <input type="checkbox" name="check[]" id="idCheck5" value="5"
            <?php
                if(enviado() && existe("check")){
                    if(in_array("5",$_REQUEST['check'])){
                        echo "checked";
                    }
                }
            ?>>
            <label for="idCheck5">Check5</label>
            <?php
        
                if(enviado() && existe("check") ){
                    if(count($_REQUEST['check'])>3 || count($_REQUEST['check'])<1){
                    ?>
            <span style="color:red;">Debes reñenar elegir dentre 1 y 3</span>
            <?php
                }}
            
        
                    if(enviado() && !existe("check") ){
            ?>
            <span style="color:red;">Debes reñenar el campo</span>
            <?php
                }
            ?>
            </p>
            <p>
            <label for="telefono">Nº Telefono</label>
            <input type="tel" name="telefono" id="idTelefono" placeholder="654987321" value="<?php
                if(enviado() && !vacio("telefono")) 
                    echo $_REQUEST['telefono'];
            ?>">
            <?php
                if((vacio('telefono') || !is_numeric($_REQUEST['telefono']) )&& enviado()){
                    ?>
                    <span style="color:red">Debes reñenar el telefono con un telefono correcto</span>
                    <?php
        
                }
            ?>
            </p>
            <p>
            <label for="email">Email</label>
            <input type="email" name="email" id="idEmail" value="<?php
                if(enviado() && !vacio('email')) echo $_REQUEST['email'];
            ?>">
            <?php
                if(enviado() && vacio('email')){
                    ?>
                <span style="color:red">Debes reñenar el correo</span>
                <?php
                }
            ?>
            </p>
            <p>
            <label for="pass">Contraseña</label>
            <input type="password" name="pass" id="idPass" value="<?php
                if(enviado() && !vacio('pass')) echo $_REQUEST['pass'];
            ?>">
            <?php
                if(vacio('pass') && enviado()){
                ?>
                    <span style="color:red">Debes reñenar la contraseña</span>
                <?php
                }
            ?>
            </p>
            <p>
            <label for="documento">Subir documento</label>
            <input type="file" name="documento" id="idDocumento">
            <?php
            if(existeDoc('documento') && enviado()){
                fichero('documento');
            }
            if(enviado() && !existeDoc('documento')){
                ?>
                <span style="color:red">Debes seleccionar un documento</span>
            <?php
            }
            ?>
            </p>
            <input type="submit" value="Enviar" name="enviar">
            </form>
        </body>
    </html>
<?php
    }
    ?>
