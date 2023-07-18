<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('paginas/head.php');
    ?>
</head>

<body>

    <?php
    // <!-- ======= Header ======= -->
    include("paginas/header.php");
    // <!-- End Header -->
    // <!-- ======= Sidebar ======= -->
    include("paginas/sidelbar.php");
    // <!-- End Sidebar-->
    ?>
    <main id="main" class="main">
        <?php //echo password_hash("Gatitodeprueba1", PASSWORD_BCRYPT); 
        ?>
        <?php
        include("paginas/migaspan.php");

        $breadcrumb = new Breadcrumb();
        // Agrega las migas de pan
        $breadcrumb->addCrumb('Inicio', 'inicio');
        $breadcrumb->addCrumb('Registro de usuario');

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
                                    <h5 class="card-title text-center pb-0 fs-4">Crea una cuenta</h5>
                                    <p class="text-center small">Ingrese sus datos personales para crear una cuenta</p>
                                </div>

                                <form id="formregistro" class="row g-3 needs-validation" method="POST">
                                    <div class="col-12">
                                        <label for="usuario" class="form-label">Nombre</label>
                                        <input type="text" name="usuario" id="usuario" placeholder="Nombre completo" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_usuario">El campo nombré debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="apellidos" class="form-label">Apellidos</label>
                                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_apellidos">El campo nombré debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                                        <input type="date" class="form-control" name="fecha" id="fecha" required>
                                        <p class="text-danger d-none" id="mesaje_fecha">El campo fecha debe presentar el formato dd/mm/aaaa<span><i class="bi bi-backspace"></i></span></p>

                                    </div>
                                    <div class="col-12">
                                        <label for="nameusuario" class="form-label">Idenfificador (NikeName)</label>
                                        <input type="text" name="nameusuario" id="nameusuario" placeholder="nombre de usuario" class="form-control" required>
                                        <p class="text-danger d-none" id="mesaje_nameusuario">El campo nombré debe contener mínimo 3 caracteres y máximo 50.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Ingresa contraseña" name="password" id="password" class="form-control" required>
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password')">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <p class="text-danger d-none" id="mesaje_password">El campo contraseña debe tener entre 8 y 20 caracteres. Puede contener letras (mayúsculas y minúsculas), números y algunos caracteres especiales permitidos.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="password1" class="form-label">Confirmar Contraseña</label>
                                        <div class="input-group">
                                            <input type="password" placeholder="Ingresa contraseña" name="password1" id="password1" class="form-control" required>
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility('password1')">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                        </div>
                                        <p class="text-danger d-none" id="mesaje_password1">El campo contraseña debe tener entre 8 y 20 caracteres. Puede contener letras (mayúsculas y minúsculas), números y algunos caracteres especiales permitidos.<span><i class="bi bi-backspace"></i></span></p>
                                    </div>
                                    <div class="col-12">
                                        <label for="perfil" class="form-label">Perfil</label>
                                        <select class="form-select" name="perfil" id="perfil" aria-label="Default select example">
                                            <option selected>Selecciona una perfil</option>
                                            <option value="1">Asesor</option>
                                            <option value="2">Gerente General</option>
                                            <option value="3">Dirección General</option>
                                            <option value="4">Área de TI</option>
                                        </select>
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

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php
    include("paginas/footer.php");
    ?>
    <!-- End Footer -->
    <script src="js/registro.js"></script>
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

</body>

</html>