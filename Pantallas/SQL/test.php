<?php

require("classConnection.php");

$newConn = new ConnectionMySQL();

$newConn->CreateConnection();

// $query = "select * from Usuarios";
$query = "CALL spUsuarios (1, null,'Itzel' ,'Itzel@gmail', 'Itzel', 'Itzel.jpg', 1, '1998-06-15');";
$result = $newConn->ExecuteQuery($query);

if(!$result){
    echo "No se ha podido realizar la consulta";
}else{
    $RowCount =  $newConn->GetCountAffectedRows();
    if($RowCount > 0){
        echo "Query ejecutado exitosamente";
    }
    echo "Query realizado con exito";
}
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "id: " . $row["id_usuario"]. " - Name: " . $row["username"]. " " . $row["correo"]. "<br>";
//     }
//   } else {
//     echo "0 results";
//   }
  $newConn->CloseConnection();
?>