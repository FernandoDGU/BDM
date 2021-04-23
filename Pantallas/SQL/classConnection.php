<?php
   
   class ConnectionMySQL{
    private $host;
    private $user;
    private $password;
    private $database;
    private $conn;

    public function __construct()
    {
        require("config.db.php");
        $this->host= HOST;
        $this->user= USER;
        $this->password=PASSWORD;
        $this->database=DATABASE;
    }

    public function CreateConnection(){
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($this->conn->connect_errno){
              die("Error al conecatrse a MySQL: (" . $this->conn->connect_errno . ")" . $this->conn->connect_errno);
            }
    }

    public function CloseConnection(){
        $this->conn->close();
    }

    public function ExecuteQuery($sql){
        $result = $this->conn->query($sql);
        return $result;
    }

    public function GetCountAffectedRows(){
        /* Metodo que retorna la cantidad de filas
         afectadas con el ultimo query realizado.*/
         return $this->conn->affected_rows;
    }
          
    public function GetRows($result){
        /*Metodo que retorna la ultima fila
         de un resultado en forma de arreglo.*/
         return $result->fetch_row();
    }

    public function SetFreeResult($result){
        //Metodo que libera el resultado del query.
         $result->free_result();
    }
    //Falta lo otro pero me da weba

   }

?>