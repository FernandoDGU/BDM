<?php
    require("./Connection_db/classConecction.php");
    $newConn = new ConnectionMySQL();
    $newConn->CreateConnection();
$query = "CALL sp_categorias (2, null, null, null);";
$result = $newConn->ExecuteQuery($query);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(!$result) 
{
        echo "No se ha podido realizar la consulta";
}else{
 
    if($row == NULL){
        // echo "No hay registros";
    }else{
             if(count($row) != 0){
                 foreach($row as $key => $value){
                     $array[] = $value;
                     $GLOBALS["array"];
                    //  echo $value['nombre'];
                 }
               
                 
            }
    }
}


