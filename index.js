const registros = document.querySelector("#registros");
const docente = document.querySelector("#docente");

docente.addEventListener("change", (e) => {
  fetch("acciones/registros.php?docente=" + e.target.value)
    .then((res) => {
      return res.json();
    })
    .then((res) => {
      actualizarTabla(res);
    });
});

function borrarDatosDeTabla() {
  while (registros.firstChild) {
    registros.removeChild(registros.firstChild);
  }
}

function actualizarTabla(datos) {
  borrarDatosDeTabla();
  datos.forEach((dato) => {
    registros.innerHTML += `<tr>
        <td>${dato.nombre}</td>
        <td>${dato.clave}</td>
        <td>${dato.materia}</td>
        <td>${dato.grupo}</td>
        <td>${dato.periodo}</td>
        <td>
            <a href="https://drive.google.com/file/d/${dato.id}"target="_blank">
                ${dato.nombre_archivo}
            </a>
        </td>
        <td>
            <a href="entrega.php?id=${dato.id}" class="button">Ver más</a>
        </td>
    </tr>'`;
  });
}
