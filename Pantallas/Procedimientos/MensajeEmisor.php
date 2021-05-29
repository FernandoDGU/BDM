<?php

// Se supone que esto te debe de traer los mensajes del usuario emisor osea tu
require("./Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();
$usuarioR = $_POST['usuarioReceptor'];
$idR = $_POST['idReceptor'];
$idE = $_POST['idEmisor'];

// Mensajes carga
$query2 = "CALL sp_mensajes(2, null, $idE , $idR, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowusermessage = mysqli_fetch_all($result2, MYSQLI_ASSOC);
 echo "<li class='sent'> 
       <p>When you're backed against the wall, break the god damn thing down.</p>
       </li>";
if ($rowusermessage == NULL) {
    echo "1";
} else {
    if (count($rowusermessage) != 0) {
        foreach ($rowusermessage as $key => $value) {
            $listaUsuarios[] = $value;

           
        }
    }
}
?>