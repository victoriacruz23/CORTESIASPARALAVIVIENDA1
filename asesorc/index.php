<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('../paginas/head1.php');
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
        $breadcrumb->addCrumb('Panel principal');

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
    <script src="js/registro.js"></script>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../recursos/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../recursos/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../recursos/assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../recursos/assets/vendor/echarts/echarts.min.js"></script>
    <script src="../recursos/assets/vendor/quill/quill.min.js"></script>
    <script src="../recursos/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../recursos/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../recursos/assets/vendor/php-email-form/validate.js"></script>

    <script src="../recursos/assets/js/main.js"></script>

</body>

</html>