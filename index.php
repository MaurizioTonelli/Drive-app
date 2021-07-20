<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de entregas</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php 
        include_once __DIR__ . '/managers/db.php';
        $db = new DB();
        $registros = $db->obtenerRegistros();
        $docentes = $db->obtenerDocentes();
    ?>
    <div class="encabezado">
        <div class="contenedor-centro">
            <h1>Administrador de Entregas</h1>
        </div>
    </div>
    <div class="link-drive">
        <div class="contenedor-centro">
            <a href="https://drive.google.com/drive/u/2/folders/1jNL_ro_2FdAgG8ZUaw0q7ecWD8FQ1WYO" target="_blank">Abrir la carpeta de Google Drive</a>
        </div>
    </div>
    <div class="mensaje-exito">
        <div class="contenedor-centro">
            <?php 
                if(isset($_GET['success'])){
                    echo '<p>El registro se añadió con éxito</p>';
                }
            ?>
        </div>
    </div>
    <div class="mensaje-error">
        <div class="contenedor-centro">
            <?php 
                if(isset($_GET['error'])){
                    echo '<p>'.$_GET['error'].'</p>';
                }
            ?>
        </div>
    </div>
    <div class="contenedor-centro">
        <div class="formulario">
            <h3>Añadir nuevo archivo</h3>
            <form action="acciones/subir-entrega.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
                <div class="grupo">
                    <label for="clave">Clave</label>
                    <input type="text" name="clave" id="clave" required>
                    <label for="materia">Materia</label>
                    <input type="text" name="materia" id="materia" required>
                </div>
                
                <label for="grupo">Grupo</label>
                <input type="number" name="grupo" id="grupo" required>
                <label>Periodo (ejemplo: 2021-2)</label>
                <div class="grupo">
                    <label>Año</label>
                    <input type="number" name="periodo-yyyy" id="periodo-yyyy" placeholder="YYYY" required>
                    <label>Semestre</label>
                    <input type="number" name="periodo-semestre" id="periodo-semestre" placeholcer="1" min="1" max="2" required>
                </div>
                <label for="archivo">Archivo</label>
                <input type="file" name="archivo" id="archivo" accept="application/pdf" required>
                <input type="submit" value="Subir archivo" name="subir-archivo">
            </form>
        </div>
    </div>
    <div class="contenedor-centro">

        <h2 class="entregas-titulo">Entregas guardadas</h2>
    </div>
    <div class="contenedor-centro">
        <div class="entregas">

            <select name="docente" id="docente">
                <option value="todos">Todos los docentes</option>
                <?php
                    foreach($docentes as $docente){
                        echo '<option value="'.$docente['nombre'].'">'.$docente['nombre'].'</option>';
                    }
                ?>
            </select>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Clave</th>
                        <th>Materia</th>
                        <th>Grupo</th>
                        <th>Periodo</th>
                        <th>Archivo (Dar clic para ver en Drive)</th>
                        <th>Detalles de entrega</th>
                    </tr>
                </thead>
                <tbody id="registros">

                    <?php
                        foreach($registros as $registro){
                            echo '<tr><td>'.$registro['nombre'].'</td>'.
                                '<td>'.$registro['clave'].'</td>'.
                                '<td>'.$registro['materia'].'</td>'.
                                '<td>'.$registro['grupo'].'</td>'.
                                '<td>'.$registro['periodo'].'</td>'.
                                '<td><a href="https://drive.google.com/file/d/'.$registro['id_archivo'].'"target="_blank">'.$registro['nombre_archivo'].'</a></td>'.
                                '<td><a href="entrega.php?id='.$registro['id'].'" class="button">Ver más</a></td></tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>