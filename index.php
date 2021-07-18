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
    <div class="encabezado">
        <div class="contenedor-centro">
            <h1>Administrador de Entregas</h1>
        </div>
    </div>
    <div class="link-drive">
        <div class="contenedor-centro">
            <a href="/">Ir a la carpeta de Google Drive</a>
        </div>
    </div>
    <div class="contenedor-centro">
        <div class="formulario">
            <h3>Añadir nuevo archivo</h3>
            <form action="" method="POST" autocomplete="off">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
                <div class="grupo">
                    <label for="nombre">Clave</label>
                    <input type="text" name="clave" id="clave">
                    <label for="nombre">Materia</label>
                    <input type="text" name="materia" id="materia">
                </div>
                <div class="grupo">
                    <label for="nombre">Grupo</label>
                    <input type="text" name="grupo" id="grupo">
                    <label for="nombre">Periodo</label>
                    <input type="text" name="periodo" id="periodo">
                </div>
                <label for="nombre">Archivo</label>
                <input type="file" name="archivo" id="archivo">
                <input type="submit" value="Subir archivo">
            </form>
        </div>
    </div>
    <div class="contenedor-centro">

        <h2 class="entregas-titulo">Entregas guardadas</h2>
    </div>
    <div class="contenedor-centro">
        <div class="entregas">

            <select name="docente" id="docente">
                <option value="docente1">Docente 1</option>
                <option value="docente2">Docente 2</option>
                <option value="docente3">Docente 3</option>
            </select>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Clave</th>
                    <th>Materia</th>
                    <th>Grupo</th>
                    <th>Periodo</th>
                    <th>Archivo (Dar clic para ver en Drive)</th>
                    <th>Comprobante</th>
                </tr>
                <tr>
                    <td>Docente 1</td>
                    <td>30003</td>
                    <td>Materia 1</td>
                    <td>Grupo 80</td>
                    <td>2019-2</td>
                    <td><a href="/">archivo.pdf</a></td>
                    <td><button>Descargar (PDF)</button></td>
                </tr>
                <tr>
                    <td>Docente 1</td>
                    <td>30003</td>
                    <td>Materia 1</td>
                    <td>Grupo 80</td>
                    <td>2019-2</td>
                    <td><a href="/">archivo.pdf</a></td>
                    <td><button>Descargar (PDF)</button></td>
                </tr>
                <tr>
                    <td>Docente 1</td>
                    <td>30003</td>
                    <td>Materia 1</td>
                    <td>Grupo 80</td>
                    <td>2019-2</td>
                    <td><a href="/">archivo.pdf</a></td>
                    <td><button>Descargar (PDF)</button></td>
                </tr>
                <tr>
                    <td>Docente 1</td>
                    <td>30003</td>
                    <td>Materia 1</td>
                    <td>Grupo 80</td>
                    <td>2019-2</td>
                    <td><a href="/">archivo.pdf</a></td>
                    <td><button>Descargar (PDF)</button></td>
                </tr>
            </table>
        </div>
    </div>
    
</body>
</html>