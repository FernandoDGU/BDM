<?php
    session_start();

    require("../Connection_db/classConecction.php");
    $newConn = new ConnectionMySQL();
    $newConn->CreateConnection();

    $correo = $_POST["correoLogin"];
    $password = $_POST["passwordLogin"];

    $query = "CALL spUsuarios (6, null, null, null,'$correo', '$password', null, null, null);";

    $result = $newConn->ExecuteQuery($query);

    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if($row == NULL){
        echo "No hay registros";
    }else{
        if(count($row) != 0){
            foreach ($row as $key => $value) {
                $arreglo[] = $value;
                // echo "$value<br />";
                // echo "$key=$value<br />";
               }
        }

        $_SESSION['idUser'] = $arreglo[0];
        $_SESSION['nombrecomp'] = $arreglo[1];
        $_SESSION['username'] = $arreglo[2];
        $_SESSION['correo'] = $arreglo[3];
        header("Location: ../index.php");
        // echo $arreglo[0];
    }


?>