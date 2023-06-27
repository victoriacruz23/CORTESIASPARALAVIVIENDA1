<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<style>
    .boton {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
        border-radius: 4px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="white">
        <div class="container-fluid">
            <img class="mx-3" width="350px" height="100px" src="https://www.planvivienda.com.mx/img/logo01.png" alt>
            <!-- crear cuenta -->
            <a href="index.php" class="mx-4 btn btn-outline-success" onclick="miFuncion()">Iniciar Sesión</a>
        </div>
        <!-- <button class="mx-4 btn btn-outline-success" type="submit">Registrarte</button> -->
        </div>
        </div>
    </nav>
    <div class="container">
        <div class="row" style="justify-content: center; margin-top:1%;">
            <div class="col-sm-9 col-md-5 col-lg-5 col-xl-5 ">
                <form action="databases/RegistroUsuario.php" class="bg-muted bg-opacity-88 shadow-lg p-3 mb-8 bg-body rounded" method="POST">
                    <center>
                    </center>
                    <h1 class="text-center text-uppercase">Registrarte</h1>
                    <div class="form-group mb-4">

                        <div class="mb-3">
                            <label for="usuario" class="form-label ">Nombre</label>
                            <input type="text" class="form-control border border-success" name="usuario" id="usuario" aria-describedby="usuarioHelp" placeholder="Ingrese su nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control border border-success" name="apellidos" id="apellidos" placeholder="Ingrese sus Apellidos" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de Nacimiento</label>
                            <input type="date" class="form-control border border-success" name="fecha" id="fecha" required>
                        </div>

                        <div class="mb-3">
                            <label for="nameusuario" class="form-label">Nickname</label>
                            <input type="text" class="form-control border border-success" name="nameusuario" id="nameusuario" placeholder="Nombre de usuario" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control border border-success" name="password" id="password" aria-describedby="usuarioHelp" placeholder="Defina una contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="verifica" class="form-label">Verificacion de Contraseña</label>
                            <input type="password" class="form-control border border-success" name=" verifica" id="verifica" aria-describedby="usuarioHelp" placeholder="Verifique su contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="perfil" class="form-label">Perfil</label>
                            <select class="form-control border border-success" name="perfil" id="perfil" aria-describedby="usuarioHelp" placeholder="Selecciona tu perfil" required>   
                            <option value="asesor">Asesor</option>
                            <option value="gerente">Gerente General</option>
                            <option value="direccion">Dirección General</option>
                            <option value="areati">Área de TI</option>
                        </select><br>  
                        </div>
    
                        
                        <center>
                            <button type="submit" class="btn btn-outline-success">Registrarte</button>
                        </center>
                </form>
                <!-- crear cuenta -->

            </div>
        </div>
    </div>
    <!-- scripts  -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    </script>
</body>

</html>