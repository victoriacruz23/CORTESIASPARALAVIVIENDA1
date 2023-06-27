<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
<nav class="navbar navbar-expand-lg bg-body-tertiary"  data-bs-theme="white">
  <div class="container-fluid">
  <img class="mx-3" width="350px" height="100px" src="https://www.planvivienda.com.mx/img/logo01.png" alt>   
         <!-- crear cuenta -->
         <a href="RegistroUser.php" class="mx-4 btn btn-outline-success" onclick="miFuncion()">Crear cuenta nueva</a>
            </div>
        <!-- <button class="mx-4 btn btn-outline-success" type="submit">Registrarte</button> -->
    </div>
  </div>
</nav>
    <!-- contenedor principal -->
    <div class="container">
        <!-- contenedor de filas -->
        <!-- <div class="row">  -->
        <!-- contendores de columnas -->
        <div class="row" style="justify-content: center; margin-top:1%;">

            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 ">
                <form action="databases/login.php" class="bg-white bg-opacity-75 shadow-lg p-3 mb-2 bg-body rounded" method="POST">
                    <center>
                    </center>
                    <h3 class="text-center text-uppercase">Inicio sesion</h3>
                    <div class="form-group mb-4">
                    <img  width="320px" height="100px" src="https://3.bp.blogspot.com/-XsTUyRBdi5Y/VWw3uQdyg7I/AAAAAAAAANg/AS53RbVG8iQ/s1600/Como-integrar-al-nuevo-personal-a-la-empresa.jpg" alt>
                        <div class="mb-3">
                            <label for="nameusuario" class="form-label ">NickName</label>
                            <input type="text" class="form-control border border-success" name="nameusuario" id="nameusuario" aria-describedby="usuarioHelp" placeholder="Ingrese el nombre de usuario" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="password" class="form-label ">Contraseña</label>
                            <input type="password" class="form-control border border-success " name="password" id="password" aria-describedby="usuarioHelp" placeholder="Ingrese su contraseña" required>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-outline-success">Iniciar Sesion</button>
                        </center>
                </form>
                </form>
               
           
        </div>
    </div>
    <!-- scripts  -->
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>