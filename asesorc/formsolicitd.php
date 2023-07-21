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
                                <form id="formsolicitud" class="row g-3 needs-validation" method="POST">
                                    <div class="col-12">
                                        <label class="form-label">Asesor solicitud</label>
                                        <p class="form-control is-valid"><?php echo $_SESSION['datosuser']['nombre'] . " " . $_SESSION['datosuser']['apellidos']; ?></p>
                                    </div>
                                    <div id="nombreafi"></div>

                                    <div id="referenciafi"></div>
                                    <input type="hidden" name="clientereferencia" value="<?php echo $_GET["referencia"]; ?>" id="clientereferencia">
                                    <div class="col-12">
                                        <label for="montocompleto" class="form-label">Monto a pagar</label>
                                        <input type="number" name="montocompleto" value="0" id="montocompleto" placeholder="Escribe el monto a pagar" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_montocompleto">El campo monto a pagar debe ser mayor a 4 digitos y menor a 15.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="cortesia" class="form-label">Tipo de cortesía</label>
                                        <select class="form-select" name="cortesia" id="cortesia" aria-label="Default select example">
                                            <option selected disabled>Selecciona una cortesía</option>
                                            <option value="1">Parcial</option>
                                            <option value="2">Completa</option>
                                            <option value="3">De campaña</option>
                                        </select>
                                        <div id="mensaje_cortesia" class="invalid-feedback d-none">Selecciona un perfil válido.</div>
                                    </div>
                                    <div class="col-12 d-none" id="divparcial">
                                        <label for="montodescuento" class="form-label">Monto de descuento</label>
                                        <input type="number" name="montodescuento" value="0" id="montodescuento" placeholder="Escribe el descuento" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_montodescuento">El campo monto de descuento debe ser del 0 al 100.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="descripcion" class="form-label">Descripción</label>
                                        <input type="text" name="descripcion" id="descripcion" placeholder="Descripción de la solicitud" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_descripcion">El campo descripción debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                   
                                    <div class="col-12" id="btnregistrouser">
                                        <button class="btn btn-primary w-100" onclick="solicitar(event);" type="submit">Solicitar</button>
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
    <script src="js/formcortesia.js"></script>
</body>

</html>