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
                cliente.Tipo_cortesia === "1" ? "Parcial" : cliente.Tipo_cortesia === "2" ? "Completa":"Campaña",
                `<a onclick="aprobar(${cliente.Estado},${cliente.Id});" class="btn btn-${cliente.Estado === "0" ? "success" : cliente.Estado === "1" ? "warning": "danger disabled"} ">${cliente.Estado === "0" ? "Aprobar" : cliente.Estado === "1" ? "Cancelar": "Cancelado"}</a>`
            ]);

            InicializarDataTable(rows); // Llamada a la función para inicializar el DataTable
            // Llamada a la función para inicializar o reconstruir el DataTable
        });
};
// 1. pendiente, 2. aprobado 2. cancelado
$estado = 1
if($estado == 1){
    $esatado = 2
}else if(estado == 2){
    estado = 3;
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
                title: "Cortesia"
            },
            {
                title: "Estado"
            }
        ]
    });
}

function aprobar(estado,id) {
    Swal.fire({
        title: "¿Desea aprobar la cortesia?",
        text: "Al aprobar la cortesia se enviara un correo electronico al usuario",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aprobar Cortesia",
    }).then((result) => {
        if (result.isConfirmed) {
        //    console.log(id);
        //    console.log(estado);
            var datos = {
                id: id,
                estado:estado,
            };
            fetch('gerente-aprobar-solicitud', {
                method: "POST",
                body: JSON.stringify(datos)
            }).then(response => response.json()).then(response => {
                console.log(response);
                if (response.success == true) {
                    alerta('success', `${response.message}`);
                    listar();
                    return false;
                } {
                    // console.log(response.message)
                    alerta('error', `${response.message}`);
                }
            });
        }
    })

}
function alerta(icono, titulo) {
    Swal.fire({
        icon: icono,
        title: titulo,
        showConfirmButton: false,
        timer: 1500
    })
}
