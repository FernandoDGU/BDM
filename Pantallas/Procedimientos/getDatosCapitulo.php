<?php 

require("../Connection_db/classConecction.php");
$newConn = new ConnectionMySQL();
$newConn->CreateConnection();

$id_capitulo = $_POST['idCapitulo'];

$query2 = "Call sp_curso_niveles(3, $id_capitulo, null, null, null, null, null, null);";
$result2 = $newConn->ExecuteQuery($query2);
$rowuserdata = mysqli_fetch_all($result2, MYSQLI_ASSOC);

if ($rowuserdata == NULL) {
    echo "1";
} else {
    if (count($rowuserdata) != 0) {
        foreach ($rowuserdata as $key => $value) {
            // $listaUsuarios[] = $value;
            if($value['tipo_archivo'] == "link"){
                echo "<li>
                <a class='archivoCurso' href='$value[direccion_archivo]' target='_blank'> $value[nombre_archivo] </a>
                </li>";
            }else{
                echo "<li>
                <a class='archivoCurso' href='/Procedimientos/download.php?id=$value[id_multimedia]' target='_blank'> $value[nombre_archivo] </a>
                </li>";
            }
               
            
        }

        // echo "<li class='sent'> 
        //     <p> $value[mensaje] </p>
        //     </li>";
    }
}

?>