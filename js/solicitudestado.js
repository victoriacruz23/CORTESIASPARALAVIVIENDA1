$(document).ready(function() {
    listar();
});

function listar() {
    // fetch("asesorc/dt.json", {})
    fetch("consulta-solicitud", {})
        .then(response => response.json())
        .then(response => {
            // console.log(response);
            $("#cuerpotabla").empty(); // Vaciar el contenido actual antes de agregar los nuevos datos
            let rows = response.map(cliente => [
                cliente.PATERNO,
                cliente.NOMBRES,
                cliente.REFERENCIA_AFI,
                cliente.Monto_total,
                cliente.Porcentaje_descueto+"%",
                cliente.Monto_pagar,
                cliente.Estado === 1 ? "Aprobado" : "Pendiente",
                cliente.Tipo_cortesia === "1" ? "Parcial" : cliente.Tipo_cortesia === "2" ? "Completa":"Campaña"
            ]);

            InicializarDataTable(rows); // Llamada a la función para inicializar el DataTable
            // Llamada a la función para inicializar o reconstruir el DataTable
        });
};
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
                title: "Nombre"
            }, {
                title: "Referencia"
            },
            {
                title: "Monto"
            },
            {
                title: "Descuento"
            },
            {
                title: "Pagar"
            },
            {
                title: "Estado"
            },
            {
                title: "Cortesia"
            }
        ]
    });
}