<?php
require_once('../databases/validacionsesion.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../paginas/head.php');
    ?>
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
                    <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">NiceAdmin</span>
                            </a>
                        </div> -->
                        <!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Solicitud de cortesías</h5>
                                    <p class="text-center small">Ingrese sus datos para la solicitud</p>
                                </div>

                                <form id="formregistro" class="row g-3 needs-validation" method="POST">

                                    <div class="col-12">
                                        <label for="usuario" class="form-label">Asesor solicitud</label>
                                        <p class="form-control is-valid"><?php echo $_SESSION['datosuser']['nombre'] . " " . $_SESSION['datosuser']['apellidos']; ?></p>
                                    </div>
                                    <div id="nombreafi"></div>

                                    <div id="referenciafi"></div>
                                    <input type="hidden" name="clientereferencia" value="<?php echo $_GET["referencia"]; ?>" id="clientereferencia">
                                    <div class="col-12">
                                        <label for="usuario" class="form-label">Monto a pagar</label>
                                        <input type="number" name="montocompleto" value="0" id="montocompleto" placeholder="Escribe el monto a pagar" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_usuario">El campo nombré debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="perfil" class="form-label">Tipo de cortesía</label>
                                        <select class="form-select" name="cortesia" id="cortesia" aria-label="Default select example">
                                            <option selected disabled>Selecciona una cortesía</option>
                                            <option value="1">Parcial</option>
                                            <option value="2">Completa</option>
                                            <option value="3">De campaña</option>
                                        </select>
                                        <div id="mensaje_perfil" class="invalid-feedback d-none">Selecciona un perfil válido.</div>
                                    </div>
                                    <div class="col-12 d-none" id="divparcial">
                                        <label for="usuario" class="form-label">Monto de descuento</label>
                                        <input type="number" name="montodescuento" value="0" id="montodescuento" placeholder="Escribe el descuento" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_usuario">El campo nombré debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                                            <label class="form-check-label" for="acceptTerms">Estoy de acuerdo y acepto los <a href="#">términos y condiciones</a></label>
                                            <p class="text-danger d-none" id="mesaje_acceptTerms">Debe estar de acuerdo antes de enviar.<span><i class="bi bi-backspace"></i></span></p>
                                        </div>
                                    </div>
                                    <p class="text-danger d-none" id="mesaje_passwordif">El campo contraseña debe tener entre 8 y 20 caracteres. Puede contener letras (mayúsculas y minúsculas), números y algunos caracteres especiales permitidos.<span><i class="bi bi-backspace"></i></span></p>
                                    <div class="col-12" id="btnregistrouser">
                                        <button class="btn btn-primary w-100" onclick="registrar(event);" type="submit">Crea una cuenta</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">¿Ya tienes una cuenta? <a href="inicio">Acceso</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section>
        <input type="hidden" name="" value="<?php echo $_GET["referencia"]; ?>" id="referencias">
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
    <script>
        const cortesiaSelect = document.getElementById("cortesia");
        const divparcial = document.getElementById("divparcial");

        cortesiaSelect.addEventListener("change", function() {
            const valorSeleccionado = cortesiaSelect.value;
            if (valorSeleccionado === "1") {
                divparcial.classList.remove("d-none");
            } else {
                divparcial.classList.add("d-none");
                document.getElementById('montodescuento').value = 0;
            }
        });
        consulta();
        // CONSULTA A LA BASE DE DATOS DEL SERVIDOR 
        function consulta() {
            let userreference = document.getElementById("referencias").value;
            // alert(userreference);
            fetch("asesorc/dt.json", {})
                .then(response => response.json())
                .then(response => {
                    // arreglo para insertar
                    const clienteEncontrado = response.find(cliente => cliente.REFERENCIA_AFI === userreference);
                    // console.log(clienteEncontrado);
                    if (clienteEncontrado) {
                        const datos = {
                            REFERENCIA_AFI: clienteEncontrado.REFERENCIA_AFI,
                            REFERENCIA_AH: clienteEncontrado.REFERENCIA_AH,
                            PATERNO: clienteEncontrado.PATERNO,
                            MATERNO: clienteEncontrado.MATERNO,
                            NOMBRES: clienteEncontrado.NOMBRES,
                            SEXO: clienteEncontrado.SEXO,
                            CORREO: clienteEncontrado.CORREO,
                            MUNICIPIO: clienteEncontrado.MUNICIPIO,
                            SALDO: clienteEncontrado.SALDO
                        };
                        nuevocliente(datos);
                    }
                    // cliclar para presentar
                    response.forEach(cliente => {
                        if (cliente.REFERENCIA_AFI === `${userreference}`) {
                            const nombreafiElement = document.getElementById("nombreafi");
                            // alert(userreference);
                            nombreafiElement.innerHTML = `
                            <div class="col-12">
                                <label for="usuario" class="form-label">Afiliado</label>
                                <p class="form-control is-valid" id="">${cliente.PATERNO} ${cliente.MATERNO} ${cliente.NOMBRES}</p>
                            </div>
                            `;
                            referenciafi.innerHTML = `
                              <div class="col-12">
                                 <label for="usuario" class="form-label">Referencia Afiliado</label>
                                 <p class="form-control is-valid" >${cliente.REFERENCIA_AFI}</p>
                              </div>
                            `;
                        }
                    });

                });
        }

        function nuevocliente(datos) {
            fetch("databases/insertarcliente.php", {
                    method: "POST",
                    body: JSON.stringify(datos) // Convertimos los datos a formato JSON antes de enviarlos
                })
                .then(response => response.json())
                .then(response => {
                    if (response.success == false) {
                        alerta('error', `${response.message}`);
                    }
                });
        }

        function alerta(icono, titulo) {
            Swal.fire({
                icon: icono,
                title: titulo,
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
</body>

</html>