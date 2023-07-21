function consulta() {

    fetch("asesorc/dt.json", {})
        .then(response => response.json())
        .then(response => {
            response.forEach(cliente => {
                console.log(cliente.SEXO);
            });
        });

}
$(document).ready(function() {
    listarclientes();
});

function listarclientes() {
    alertatiempo("Espera un momenot, los datos estan por ser mostrados.");
    // fetch("consulta-clientes", {})
    fetch("asesorc/dt.json", {})
        .then(response => response.json())
        .then(response => {
            // console.log(response);
            $("#cuerpotabla").empty(); // Vaciar el contenido actual antes de agregar los nuevos datos
            let rows = response.map(cliente => [
                cliente.PATERNO,
                cliente.MATERNO,
                cliente.NOMBRES,
                cliente.CELULAR,
                cliente.REFERENCIA_AFI,
                cliente.MUNICIPIO,
                `<a href="formulario-cortesia-${cliente.REFERENCIA_AFI}" class="btn btn-primary">Solicitar</a>`
            ]);

            InicializarDataTable(rows); // Llamada a la función para inicializar el DataTable
            // Llamada a la función para inicializar o reconstruir el DataTable
            Swal.close(); // Cerrar el mensaje de carga después de recibir la respuesta del servidor

        });
};

// $("#tablaSolicitud").DataTable({
//     language: {
//         url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
//     }
// });
function alertatiempo(titulo) {
    let startTime = new Date().getTime(); // Tiempo de inicio

    Swal.fire({
        title: titulo,
        html: 'Tiempo transcurrido: <b>0</b> segundos.',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const b = Swal.getHtmlContainer().querySelector('b');
            const timerInterval = setInterval(() => {
                const elapsedTime = (new Date().getTime() - startTime) / 1000; // Tiempo transcurrido en segundos
                b.textContent = elapsedTime.toFixed(2); // Mostrar tiempo transcurrido con 2 decimales
            }, 100);
            Swal.getContainer().addEventListener('click', () => {
                clearInterval(timerInterval); // Detener el contador si se hace clic en el mensaje de carga
            });
        }
    });
}

function InicializarDataTable(rows) {
    if ($.fn.DataTable.isDataTable("#tablaSolicitud")) {
        $("#tablaSolicitud").DataTable().destroy();
    }
    $("#tablaSolicitud").empty(); // Vaciar el contenido de la tabla antes de reconstruir
    $("#tablaSolicitud").DataTable({
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
        },
        data: rows,
        columns: [{
                title: "Apellido"
            },
            {
                title: "Apellido"
            }, {
                title: "Nombre"
            },
            {
                title: "Celular"
            },
            {
                title: "Referencia Afiliado"
            },
            {
                title: "Municipio"
            },
            {
                title: "Solicitar"
            }
        ]
    });
}