<?php 
    //Mandar datos para busqueda con opciones require("./Connection_db/classConecction.php");
    error_reporting(E_ERROR | E_PARSE);
    require("../Connection_db/classConecction.php");
    $newConn2 = new ConnectionMySQL();
    

    // Variables
    $Opcion = $_POST['Opcion'];
    $titulo = $_POST['Titulo'];
    $categoria = $_POST['Categ'];
    $profesor_name = $_POST['User'];

  
    // BUSQUEDA POR TITULO
    if($Opcion == 1){
        $newConn2->CreateConnection(); 
        $query = "CALL sp_busqueda (1, '$titulo', null, null);";
        $result = $newConn2->ExecuteQuery($query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($row == NULL) {
            echo "<p> No hay resultados <p>";
        }  else {
            if (count($row) != 0) {
                foreach ($row as $key => $value) {
                    // $listaUsuarios[] = $value;
                    $convert = base64_encode($value['imagen']);
                        echo "<div class='item'>
                    
                        <a href='CursoPrev.php?id=$value[id_curso]'><img class='imgCursoBusqueda' src='data:image/png|jpg|jpeg;base64, $convert'></a>

                        <div class='description'>
                            <span> $value[titulo] </span>
                            <span> $value[descripcion] </span>
                            <span> $value[username] </span>
                        </div>

                        <div class='total-price'>$ $value[costo] .00MX</div>
                        </div>";
                }
            }
        }
        $newConn2->CloseConnection(); 
    }

    // BUSQUEDA POR CATEGORIA
    if($Opcion == 2){
        $newConn2->CreateConnection(); 
        echo "categoria buscado";
        $query = "CALL sp_busqueda (3, null, null, '$categoria');";
        $result = $newConn2->ExecuteQuery($query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($row == NULL) {
            echo "<p> No hay resultados <p>";
        }  else {
            if (count($row) != 0) {
                foreach ($row as $key => $value) {
                    // $listaUsuarios[] = $value;
                    $convert = base64_encode($value['imagen']);
                        echo "<div class='item'>
                    
                        <a href='CursoPrev.php?id=$value[id_curso]'><img class='imgCursoBusqueda' src='data:image/png|jpg|jpeg;base64, $convert'></a>

                        <div class='description'>
                            <span> $value[titulo] </span>
                            <span> $value[descripcion] </span>
                            <span> $value[username] </span>
                        </div>

                        <div class='total-price'>$ $value[costo] .00MX</div>
                        </div>";
                }
            }
        }
        $newConn2->CloseConnection(); 
    }

    // BUSQUEDA POR USUARIO
    if($Opcion == 3){
        $newConn2->CreateConnection(); 
        echo "Profesor buscado";
        $query = "CALL sp_busqueda (2, null, '$profesor_name', null);";
        $result = $newConn2->ExecuteQuery($query);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if ($row == NULL) {
            echo "<p> No hay resultados <p>";
        }  else {
            if (count($row) != 0) {
                foreach ($row as $key => $value) {
                    // $listaUsuarios[] = $value;
                    $convert = base64_encode($value['imagen']);
                        echo "<div class='item'>
                    
                        <a href='CursoPrev.php?id=$value[id_curso]'><img class='imgCursoBusqueda' src='data:image/png|jpg|jpeg;base64, $convert'></a>

                        <div class='description'>
                            <span> $value[titulo] </span>
                            <span> $value[descripcion] </span>
                            <span> $value[username] </span>
                        </div>

                        <div class='total-price'>$ $value[costo] .00MX</div>
                        </div>";
                }
            }
        }
        $newConn2->CloseConnection(); 
    }


    // $query = "CALL sp_cursos(6, null, $userId,  null, null, null, null, null, null, null);";
    // $result = $newConn2->ExecuteQuery($query);
    // $rowCursosC = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>