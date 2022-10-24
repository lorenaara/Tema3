<?php
    require("./validaFormularioFunciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./formulario.php" method="post" enctype="multipart/form-data">
        <p>
            <label for="idNombre">Nombre</label>
            <input type="text" name="nombre" id="idNombre" placeholder="Nombre" value="<?php
            if(enviado() && !vacio("nombre"))
                echo $_REQUEST['nombre'];
            ?>">
            <?php
                //comprobar que no este vacio, si lo esta que ponga un error
                if(vacio("nombre") && enviado()){
                    ?>
                    <span style="color:red">Debe reñenar el nombre</span>
                    <?php
                }
            ?>
        </p>
        <p>
            <label for="idPass">Contraseña</label>
            <input type="password" name="pass" id="idPass" value="<?php
            if(enviado() && !vacio("pass"))
                echo $_REQUEST['pass'];
            ?>">
            <?php
                //comprobar que no este vacio, si lo esta que ponga un error
                if(vacio("pass") && enviado()){
                    ?>
                    <span style="color:red">Debe reñenar la contraseña</span>
                    <?php
                }
            ?>
        </p>
        <p><b>Genero</b>
            <label for="idMasculino">Masculico</label>
            <input type="radio" name="genero" id="idMasculino" value="masculino"
                <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]== "masculino")
                        echo "checked";
                ?>
            >
            <label for="idFemenino">Femenino</label>
            <input type="radio" name="genero" id="idFemenino" value="femenino"
            <?php
                    if(enviado() && existe("genero") && $_REQUEST["genero"]== "femenino")
                        echo "checked";
                ?>>
            <?php
                //comprobar que no este vacio, si lo esta que ponga un error
                if(!existe("genero") && enviado()){
                    ?>
                    <span style="color:red">Debe elegir un genero</span>
                    <?php
                }
            ?>
        </p>
        <p><b>Asignaturas</b>
            <label for="IdDWES">Desarrollo Web Servidor</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWES" value="DWES"
            >
            <label for="IdDWEC">Desarrollo Web Cliente</label>
            <input type="checkbox" name="asignaturas[]" id="IdDWEC" value="DWEC">
            <?php
                //comprobar que no este vacio, si lo esta que ponga un error
                if(!existe("asignaturas") && enviado()){
                    ?>
                    <span style="color:red">Debe elegir una asignatura</span>
                    <?php
                }
            ?>
        </p>
        <p><b>Curso</b>
            <select name="curso" id="idCurso">
                <option value="0">Selecciona una opcion</option>
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
            </select>
        </p>
        <p>
            <input type="file" name="fichero" id="idFichero">
        </p>
        <input type="submit" value="Enviar" name="enviar">
    </form>
</body>
</html>
