<?php

// Nueva adaptacion para clasificar si el mensaje es mío y ponerlo en diferentes 
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();
$usuarioR = $_POST['usuarioReceptor'];
$idR = $_POST['idReceptor'];
$idE = $_POST['idEmisor'];

// Mensajes carga
$query2 = "CALL sp_mensajes(4, null, $idE , $idR, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowusermessage = mysqli_fetch_all($result2, MYSQLI_ASSOC);

if ($rowusermessage == NULL) {
    echo "1";
} else {
    if (count($rowusermessage) != 0) {
        foreach ($rowusermessage as $key => $value) {
            // $listaUsuarios[] = $value;

            if($value['emisor'] == $idE){
                echo "<li class='sent'> 
                <p> $value[mensaje] </p>
                </li>";
               
            }else if($value['receptor'] == $idE){
                echo "<li class='replies'> 
                <p> $value[mensaje] </p>
                </li>";
            }
            
        }

        // echo "<li class='sent'> 
        //     <p> $value[mensaje] </p>
        //     </li>";
    }
}
?>