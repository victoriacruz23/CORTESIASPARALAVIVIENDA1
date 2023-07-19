<header id="header" class="header fixed-top d-flex align-items-center">
  <!-- <style>
    .resaltado {
        background-color: yellow;
    }
</style> -->
  <div class="d-flex align-items-center justify-content-between">
    <a href="inicio" class="logo d-flex align-items-center mx-3">
      <img src="recursos/assets/img/logopv.png" width="auto" height="100%" alt="">
      <span class="d-none d-lg-block">PAVI </span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->
  <?php
  if (isset($_SESSION['datosuser'])) {
  ?>
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <!-- <input type="text" name="query" placeholder="Search" title="Enter search keyword"> -->
        <input type="text" id="termino" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="recursos/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['datosuser']['nombreclave'] ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['datosuser']['nombre'] . " " . $_SESSION['datosuser']['apellidos']; ?></h6>
              <span> <?php
                      $perfil = $_SESSION['datosuser']['perfil'];
                      $mensaje = ($perfil == 1) ? "Asesor" : (($perfil == 2) ? "Gerente General" : (($perfil == 3) ? "Dirección General" : (($perfil == 4) ? "Área de TI" : "Perfil desconocido")));
                      echo $mensaje;
                      ?>
              </span>
            </li>


            <li>
              <hr class="dropdown-divider">
            </li>
            <?php
            /*
            <li>
              <a class="dropdown-item d-flex align-items-center" id="abrirmodal('modaldatos');">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


*/
            ?>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="configuracion-perfil">
                <i class="bi bi-gear"></i>
                <span>Configuración de perfil</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" onclick="cerrarsesion(event);">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
    <script src="js/cerrarsesion.js"></script>
    <script src="js/busqueda.js"></script>
  <?php } ?>
</header>