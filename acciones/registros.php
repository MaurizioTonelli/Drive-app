<?php
    include_once __DIR__ . '/db.php';
    $db = new DB();

    if(isset($_GET['docente'])){
        $datos = $db->obtenerRegistrosDeDocente($_GET['docente']);
        header('Content-type: application/json');
        echo json_encode($datos);
    }
?>