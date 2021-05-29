<?php 
require("./Connection_db/classConecction.php");
$newConn2 = new ConnectionMySQL();
$newConn2->CreateConnection(); 
// Obtener el id del usuario registrado que obviamente es el emisor, es decir el que manda mensajes
// $id_emisor = $_SESSION['idUser'];

// Lista de usuarios
$query = "CALL sp_mensajes(3, null, 22, null, null, null);";
$result = $newConn2->ExecuteQuery($query);

$rowuser = mysqli_fetch_all($result, MYSQLI_ASSOC);
if($rowuser == NULL){
    echo "1";
}else{
    if(count($rowuser) != 0){
        foreach($rowuser as $key => $value){
            $listaUsuarios[] = $value;
            // echo $listaUsuarios;
        }
    }
    
}

?>