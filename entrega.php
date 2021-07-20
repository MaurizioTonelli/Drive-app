<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de entrega</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php
    include_once __DIR__ . '/managers/db.php';
    $db = new DB();
    $registro = NULL;
    if(isset($_GET['id'])){
        $registro = $db->obtenerRegistroPorId($_GET['id']);
        if($registro != NULL){
            $registro = $registro[0];
        }
    }
?>

<div class="encabezado">
    <div class="contenedor-centro">
        <h1>Administrador de Entregas</h1>
    </div>
</div>
<div class="link-drive">
    <div class="contenedor-centro">
        <a href="index.php">Volver a la página principal</a>
    </div>
</div>
<div class="contenedor-centro">
    <h2 class="entregas-titulo">Detalles de entrega</h2>
</div>
<div class="contenedor-centro">
    <?php
        if($registro == NULL){
            echo '<h2 class="entregas-error">No hay registros</p>';
            return;
        }
    ?>
</div>

<div class="contenedor-centro">
    <div class="registro">
        <div class="fila"><strong>Id de entrega:</strong><p><?php echo $registro['id'] ?></p></div>
        <div class="fila"><strong>Fecha de entrega:</strong><p><?php echo $registro['fecha'] ?></p></div>
        <div class="fila"><strong>Nombre del docente:</strong><p><?php echo $registro['nombre'] ?></p></div>
        <div class="fila"><strong>Clave</strong><p><?php echo $registro['clave'] ?></p></div>
        <div class="fila"><strong>Materia</strong><p><?php echo $registro['materia'] ?></p></div>
        <div class="fila"><strong>Grupo</strong><p><?php echo $registro['grupo'] ?></p></div>
        <div class="fila"><strong>Periodo</strong><p><?php echo $registro['periodo'] ?></p></div>
        <div class="fila"><strong>Nombre del archivo</strong><p><?php echo $registro['nombre_archivo'] ?></p></div>
        <div class="fila"><strong>Link de drive</strong><a href="<?php echo 'https://drive.google.com/file/d/'.$registro['id_archivo'] ?>" target="_blank"><?php echo 'https://drive.google.com/file/d/'.$registro['id_archivo'] ?></a></div>
    </div>
    <form class="descargar-form" action="acciones/generar-pdf.php">
        <button class="descargar">Descargar comprobante</button>
        <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
        <input type="hidden" name="fecha" value="<?php echo $registro['fecha'] ?>">
        <input type="hidden" name="nombre" value="<?php echo $registro['nombre'] ?>">
        <input type="hidden" name="clave" value="<?php echo $registro['clave'] ?>">
        <input type="hidden" name="materia" value="<?php echo $registro['materia'] ?>">
        <input type="hidden" name="grupo" value="<?php echo $registro['grupo'] ?>">
        <input type="hidden" name="periodo" value="<?php echo $registro['periodo'] ?>">
        <input type="hidden" name="nombre_archivo" value="<?php echo $registro['nombre_archivo'] ?>">
        <input type="hidden" name="id_archivo" value="<?php echo $registro['id_archivo'] ?>">
    </form>
</div>

    
    
</body>
</html>