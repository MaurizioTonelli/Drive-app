<?php

include_once __DIR__ . '/../managers/db.php';
include_once __DIR__ . '/../managers/administrador-drive.php';

$db = new DB();
$drive_admin = new AdministradorDrive();

function validarFormulario(){
    if(trim($_POST['nombre']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere el nombre de docente'");
        return FALSE;
    }
    if(trim($_POST['clave']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere la clave de la materia'");
        return FALSE;
    }
    if(trim($_POST['materia']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere la materia'");
        return FALSE;
    }
    if(trim($_POST['grupo']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere el grupo'");
        return FALSE;
    }
    if(trim($_POST['periodo-yyyy']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere el año del periodo'");
        return FALSE;
    }
    if(trim($_POST['periodo-semestre']) == ''){
        header("Refresh:0; url=../index.php?error='Se requiere el semestre del periodo'");
        return FALSE;
    }
    if(empty($_FILES)){
        header("Refresh:0; url=../index.php?error='No se selecciono un archivo'");;
        return FALSE;
    }
    if($_FILES['archivo']['size'] > 150000000){
        header("Refresh:0; url=../index.php?error='El archivo a subir no puede ser mayor a 150 MB'");;
        return FALSE;
    }
    if($_FILES['archivo']['type'] != 'application/pdf'){
        header("Refresh:0; url=../index.php?error='Se requiere un documento de tipo PDF'");;
        return FALSE;
    }
    return TRUE;
    //AGREGAR VALIDACIÓN DE TIPO Y TAMAÑO DE ARCHIVO

}

function guardarArchivo(){
    $ds = DIRECTORY_SEPARATOR;
    $folder_archivos = '../uploads';   
    $temporal = $_FILES['archivo']['tmp_name'];   
    $mime_type = $_FILES['archivo']['type'];             
    $ruta = dirname( __FILE__ ) . $ds. $folder_archivos . $ds;  
    $nombre_archivo = $_FILES['archivo']['name'];
    $archivo_elegido =  $ruta. $nombre_archivo;
    move_uploaded_file($temporal,$archivo_elegido);
    $datos_archivo = array('mime_type'=>$mime_type, 'archivo_elegido'=>$archivo_elegido);
    return $datos_archivo;
}

if(isset($_POST['subir-archivo']) && validarFormulario()){
    $nombre = trim($_POST['nombre']);
    $clave = trim($_POST['clave']);
    $materia = trim($_POST['materia']);
    $grupo = trim($_POST['grupo']);
    $periodo_yyyy = trim($_POST['periodo-yyyy']);
    $periodo_semestre = trim($_POST['periodo-semestre']);
    $periodo = $periodo_yyyy . '-' . $periodo_semestre;
    $datos_archivo = guardarArchivo();
    $nombre_archivo = $clave . "_" .$nombre."_".$materia."_".$periodo_yyyy."-".$periodo_semestre."_".$_FILES['archivo']['name'];
    $id_insertado = $drive_admin->subirArchivo($datos_archivo['archivo_elegido'], $nombre_archivo, $datos_archivo['mime_type']);
    $id_db_insertado = $db->insertarRegistroDeEntrega($nombre, $clave, $materia, $grupo, $periodo, $nombre_archivo, $id_insertado);
    header('Refresh:0; url=../entrega.php?id='.$id_db_insertado);
}
//$drive_admin->borrarArchivosDeDrive();

?> 