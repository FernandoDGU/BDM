<?php 

$id_multimedia = isset($_GET["id"]) ? $_GET["id"] : 0;

if ($id_multimedia <= 0) {
    die("El identificador del archivo multimedia no es valido");
}

require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$query2 = "CALL sp_multimedia (3, $id_multimedia, null, null, null, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowuserdata = mysqli_fetch_all($result2, MYSQLI_ASSOC);

if ($rowuserdata == NULL) {
    echo "1";
} else {
    if (count($rowuserdata) != 0) {
        foreach ($rowuserdata as $key => $value) {
            // $listaUsuarios[] = $value;
               
                // header("Content-Transfer-Encoding: binary");

                if(!file_exists($value['direccion_archivo'])) {
                    die("El archivo multimedia esta registrado pero no se ha encontrado, es posible que se haya eliminado");
                }
                header("Content-Disposition: attachment; filename=" . $value['nombre_archivo']);
                header("Content-Type: " . $value['tipo_archivo']);
                
                readfile($value['direccion_archivo']);

                exit();
                    }
                }
}
?>