<?php
require_once('../databases/validacionsesion.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../paginas/head.php');
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <?php
    // <!-- ======= Header ======= -->
    include("../paginas/header.php");
    // <!-- End Header -->
    // <!-- ======= Sidebar ======= -->
    include("../paginas/sidelbar.php");
    // <!-- End Sidebar-->
    ?>
    <main id="main" class="main">
        <?php //echo password_hash("Gatitodeprueba1", PASSWORD_BCRYPT); 
        ?>
        <?php
        include("../paginas/migaspan.php");

        $breadcrumb = new Breadcrumb();
        // Agrega las migas de pan
        $breadcrumb->addCrumb('Ascesor', '');
        $breadcrumb->addCrumb('Solicitud de cortesía');

        // Renderiza las migas de pan
        $breadcrumb->render();
        ?>
        <!-- End Page Title -->
        <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div> -->
                        <!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <table id="tablaSolicitud" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>

                                            <th>Apellido</th>
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Celular</th>
                                            <th>Referencia Afiliado</th>
                                            <th>Municipio</th>
                                            <th>Solicitar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="cuerpotabla">

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Apellido</th>
                                            <th>Apellido</th>
                                            <th>Nombre</th>
                                            <th>Celular</th>
                                            <th>Referencia Afiliado</th>
                                            <th>Municipio</th>
                                            <th>Solicitar</th>
                                            
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include("../paginas/footer.php");
    ?>
    <!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="recursos/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="recursos/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="recursos/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="recursos/assets/vendor/echarts/echarts.min.js"></script>
    <script src="recursos/assets/vendor/quill/quill.min.js"></script>
    <script src="recursos/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="recursos/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="recursos/assets/vendor/php-email-form/validate.js"></script>

    <script src="recursos/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
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
                });
        };

        // $("#tablaSolicitud").DataTable({
        //     language: {
        //         url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-MX.json'
        //     }
        // });

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
                columns: [
                    {
                        title: "Apellido"
                    },
                    {
                        title: "Apellido"
                    },{
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
    </script>
</body>

</html>