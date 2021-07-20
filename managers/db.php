<?php

class DB{
    private $conn;

    function __construct(){
        $this->conn = new mysqli('127.0.0.1', 'root', '', 'administrador_de_entregas');
        if($this->conn->connect_error){
            die("La conexión a la base de datos falló: ". $this->conn->connect_error);
        }
    }
    
    function __destruct(){
        $this->conn->close();
    }

    function insertarRegistroDeEntrega($nombre, $clave, $materia, $grupo, $periodo, $nombre_archivo, $id_archivo){
        $stmt = $this->conn->prepare("INSERT INTO entregas VALUES(DEFAULT,SYSDATE(),?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $nombre, $clave, $materia, $grupo, $periodo, $nombre_archivo, $id_archivo);
        $stmt->execute();
        return $this->conn->insert_id;
    }
    
    function obtenerRegistros(){
        $sql = "SELECT * FROM entregas";
        $result = $this->conn->query($sql);
        $filas = array();
        if ($result->num_rows > 0) {
            while($fila = $result->fetch_assoc()) {
                array_push($filas, $fila);
            }
            return $filas;
        } else {
            return array();
        }
    }

    function obtenerDocentes(){
        $sql = "SELECT DISTINCT nombre FROM entregas";
        $result = $this->conn->query($sql);
        $filas = array();
        if ($result->num_rows > 0) {
            while($fila = $result->fetch_assoc()) {
                array_push($filas, $fila);
            }
            return $filas;
        } else {
            return array();
        }
    }

    function obtenerRegistrosDeDocente($docente){
        if($docente == 'todos'){
            return $this->obtenerRegistros();
        }
        $sql = "SELECT * FROM entregas WHERE nombre=?"; // SQL with parameters
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("s", $docente);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $filas = array();
        if ($result->num_rows > 0) {
            while($fila = $result->fetch_assoc()) {
                array_push($filas, $fila);
            }
            return $filas;
        } else {
            return array();
        }
    }

    function obtenerRegistroPorId($id){
        $sql = "SELECT * FROM entregas WHERE id=?"; // SQL with parameters
        $stmt = $this->conn->prepare($sql); 
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result(); // get the mysqli result
        $filas = array();
        if ($result->num_rows > 0) {
            while($fila = $result->fetch_assoc()) {
                array_push($filas, $fila);
            }
            return $filas;
        } else {
            return array();
        }
    }

}

?>