<?php
require_once('validacion.php')
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modal con PHP y Bootstrap</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <style>
        .modal-lg {
            max-width: 4cm !important; /* Ajusta el ancho del modal */
        }
        .modal-xl {
            max-width: 700px !important; /* Ajusta el ancho del modal */
        }
        .modal-custom {
            max-width: 300px !important; /* Ajusta el ancho del modal */
            max-height: 100px !important; /* Ajusta la altura del modal */
        }
    </style>
</head>
<body>

<!-- Botón que activa el modal -->
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#myModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg> Redactar
</button>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Título del Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <!-- Contenido del modal...-->
                 <div class="row mb-3">
                        <label for="fecha" class="col-sm-2 col-form-label">Destinatario:</label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="20" class="form-control" id="Titulo" name="Titulo" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="fecha" class="col-sm-2 col-form-label">Asunto:</label>
                        <div class="col-sm-10">
                            <input type="text" maxlength="20" class="form-control" id="Titulo" name="Titulo" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Descripcion" class="col-sm-2 col-form-label">Descripción: </label>
                        <div class="col-sm-10 form-floating">
                            <textarea class="form-control" id="Descripción" name="Descripcion" style="height: 150px;" maxlength="500" required></textarea>
                        </div>
                    </div>
                <?php
                // Aquí puedes colocar el contenido dinámico generado con PHP
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>
