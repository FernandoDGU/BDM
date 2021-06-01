<?php 

// TRAER LOS VIDEOS
require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();
$i = 0;
$id_capitulo = $_POST['idCapitulo'];

$query2 = "Call sp_curso_niveles(3, $id_capitulo, null, null, null, null, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowuserdata = mysqli_fetch_all($result2, MYSQLI_ASSOC);

if ($rowuserdata == NULL) {
    echo "1";
}  else {
    if (count($rowuserdata) != 0) {
        foreach ($rowuserdata as $key => $value) {
            // $listaUsuarios[] = $value;
                $i += 1;
                if($i == 1){
                    echo $value['video'];
                }
        }
    }
}

?>