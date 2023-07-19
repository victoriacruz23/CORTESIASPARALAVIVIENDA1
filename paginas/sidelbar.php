<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">

    <?php
    if (isset($_SESSION['datosuser'])) {
      switch ($_SESSION['datosuser']['perfil']) {
        case 1:
    ?>
          <!-- caso 1 -->
          <li class="nav-item">
            <a class="nav-link " href="asesor">
              <i class="bi bi-grid"></i>
              <span>Inicio Asesor</span>
            </a>
          </li>
        <?php
          break;
        case 2:
        ?>
          <!-- caso 2 -->
          <li class="nav-item">
            <a class="nav-link " href="gerente">
              <i class="bi bi-grid"></i>
              <span>Inicio Gerente</span>
            </a>
          </li>
        <?php

          break;
        case 3:
        ?>
          <!-- caso 3 -->
          <li class="nav-item">
            <a class="nav-link " href="direccion">
              <i class="bi bi-grid"></i>
              <span>Inicio Dirección</span>
            </a>
          </li>
        <?php
          break;
        case 4:
        ?>
          <!-- caso 4 -->
          <li class="nav-item">
            <a class="nav-link " href="area-de-ti">
              <i class="bi bi-grid"></i>
              <span>Inicio Área de TI</span>
            </a>
          </li>
        <?php
          break;
        default:
          $response = array("success" => false, "message" => "Existio un error");
          echo json_encode($response);
          exit;
          break;
        ?>

      <?php
      }
    } else {
      ?>

      <li class="nav-item">
        <a class="nav-link collapsed " href="registro">
          <i class="bi bi-card-list "></i>
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
    <script>
      // Función para agregar la clase para mostrar activo la pestaña donde te encuentres
      // Obtener todos los elementos con la clase "nav-link"
      var navLinks = document.querySelectorAll('.nav-link');
      // Iterar sobre los elementos y agregar o quitar la clase "collapsed" según corresponda
      navLinks.forEach(function(navLink) {
        // Verificar si el href del enlace coincide con la página actual
        if (navLink.href === window.location.href) {
          navLink.classList.remove('collapsed');
        } else {
          navLink.classList.add('collapsed');
        }
      });
    </script>
  </ul>

</aside>