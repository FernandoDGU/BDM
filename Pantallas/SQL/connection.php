<?php 

//Este ya no 
$servername = "localhost";
$username = "root";
$password = "1726916";

//Crear conexion 
$conn = new mysqli($servername, $username, $password);

//Checar conexion 
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_errno);
}

echo "Conexion completada <br>";

$datab = "Prouge";

$db = mysqli_select_db($conn, $datab);

if(!$db){
    echo "No se ha podido conectar";
}else{
    echo "Tabla encontrada"; echo "<br>";
}

$consulta = "select * from Usuarios";
$result = mysqli_query($conn, $consulta);

if(!$result){
    echo "No se ha podido realizar la consulta";
}else{
    echo "Usuarios encontrados";
}


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id_usuario"]. " - Name: " . $row["username"]. " " . $row["correo"]. "<br>";
    }
  } else {
    echo "0 results";
  }
  $conn->close();

?>