<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <?php
    if (isset($_SESSION['datosuser'])) {
    ?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo ($_SESSION['datosuser']['tipouser'] == 1 ? "consulta-pago-adminsitracion" : "consulta-pago-cliente"); ?>">
          <i class="bi bi-grid"></i>
          <span>Historial de pagos</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="pago-cliente">
        <i class="bi bi-credit-card"></i>
          <span>Pago de curso</span>
        </a>
      </li><!-- End Dashboard Nav -->
    <?php
    } else {
    ?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="registro">
          <i class="bi bi-card-list"></i>
          <span>Registro</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="inicio">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Inicio sesion</span>
        </a>
      </li><!-- End Login Page Nav -->
    <?php
    }
    ?>
  </ul>

</aside>