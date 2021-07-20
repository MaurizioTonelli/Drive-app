<?php
    require __DIR__ .'/../vendor/autoload.php';
    use Dompdf\Dompdf;


?>

<?php ob_start();?>
    <!DOCTYPE html>
    <html>
    <head>
    <meta charset='utf-8'>
    <style>
        .contenedor-centro{
            font-family: sans-serif;
        }
        .registro {
            box-shadow: 5px 5px 5px rgb(185, 183, 183);
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 10px;
            width: 100%;
        }
        .registro .fila {
            background-color: #ddd;
            text-align: center;
        }
        .registro .fila strong {
            font-family: sans-serif;
            font-weight: 600;
        }
        .registro .fila a, .registro .fila p{
            margin-left: 10px;
        }
    </style>
    <title>Title</title>
    </head>
    <body>
    <div class="contenedor-centro">
        <h3>Comprobante de entrega de archivo</h3>

        <div class="registro">
            <div class="fila"><strong>Id de entrega:</strong><p><?php echo $_GET['id'] ?></p></div>
            <div class="fila"><strong>Fecha de entrega:</strong><p><?php echo $_GET['fecha'] ?></p></div>
            <div class="fila"><strong>Nombre del docente:</strong><p><?php echo $_GET['nombre'] ?></p></div>
            <div class="fila"><strong>Clave</strong><p><?php echo $_GET['clave'] ?></p></div>
            <div class="fila"><strong>Materia</strong><p><?php echo $_GET['materia'] ?></p></div>
            <div class="fila"><strong>Grupo</strong><p><?php echo $_GET['grupo'] ?></p></div>
            <div class="fila"><strong>Periodo</strong><p><?php echo $_GET['periodo'] ?></p></div>
            <div class="fila"><strong>Nombre del archivo</strong><p><?php echo $_GET['nombre_archivo'] ?></p></div>
            <div class="fila"><strong>Link de archivo en Google Drive</strong><a href="<?php echo 'https://drive.google.com/file/d/'.$_GET['id_archivo'] ?>" target="_blank"><?php echo 'https://drive.google.com/file/d/'.$_GET['id_archivo'] ?></a></div>
        </div>
    </div>
    </body>
    </html>
<?php
    $html = ob_get_clean();

    // instantiate and use the dompdf class
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('comprobante.pdf');
?>