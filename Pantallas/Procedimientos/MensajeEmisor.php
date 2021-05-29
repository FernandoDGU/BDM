<?php 
// Se supone que esto te debe de traer los mensajes del usuario emisor osea tu
require("./Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection(); 
// Mensajes carga
$query2 = "CALL sp_mensajes(2, null, 22, 20, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowusermessage = mysqli_fetch_all($result2, MYSQLI_ASSOC);

if($rowusermessage == NULL){
    echo "1";
}else{
    if(count($rowusermessage) != 0){
        foreach($rowusermessage as $key => $value){
            $listaUsuarios[] = $value;
            // echo $listaUsuarios;
        }
    }
    
}


?>