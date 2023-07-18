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
    <?php //echo password_hash("Gatitodeprueba1", PASSWORD_BCRYPT); ?>
        <?php
        include("paginas/migaspan.php");

        $breadcrumb = new Breadcrumb();
        // Agrega las migas de pan
        $breadcrumb->addCrumb('Inicio', 'inicio');
        $breadcrumb->addCrumb('Inicio de sesion');

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
                                    <h5 class="card-title text-center pb-0 fs-4">Ingrese a su cuenta</h5>
                                    <p class="text-center small">Ingrese su nombre de usuario y contraseña para iniciar sesión</p>
                                </div>

                                <form id="formlogin" class="row g-3 needs-validation" novalidate>
                                    <div class="col-12">
                                        <label for="nameusuario" class="form-label">Nombre idenfificador</label>
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
                                        <button class="btn btn-primary w-100" onclick="login(event);" type="submit">Accesso</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">¿No tienes cuenta?<a href="registro">Crea una cuenta</a></p>
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
    <script src="js/login.js"></script>
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