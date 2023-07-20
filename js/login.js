   //validacion formulario 
   const formEv = document.getElementById('formlogin');
   const inputs = document.querySelectorAll('#formlogin input');
   formEv.addEventListener('input', (event) => {
       // Obtener el elemento que disparó el evento (el input)
       const inputElement = event.target;

       // Verificar si el input es de tipo texto o email
       if (inputElement.type === 'text' || inputElement.type === 'email') {
           // Convertir el valor del input a mayúsculas
           inputElement.value = inputElement.value.toUpperCase();
       }
   });
   const expresiones = {
       nameusuario: /^[a-zA-Z0-9À-ÿ\s]{3,50}$/, // Letras, numeros, guion y guion_bajo,
       password: /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9!@#$%^&*()-=_+]{8,20}$/,
   }
   const campos = {
       nameusuario: false,
       password: false,
   }

   const validarForm = (e) => {
       switch (e.target.name) {
           case "nameusuario":
               validarCampo(expresiones.nameusuario, e.target, 'nameusuario');
               break;
           case "password":
               validarCampo(expresiones.password, e.target, 'password');
               break;
       }
   }
   inputs.forEach((input) => {
       input.addEventListener('keyup', validarForm);
       input.addEventListener('blur', validarForm);
   });
   const validarCampo = (expresion, input, campo) => {
       if (expresion.test(input.value)) {
           // correcto
           document.getElementById(`${campo}`).classList.remove('is-invalid');
           document.getElementById(`${campo}`).classList.add('is-valid');
           //mensaje
           document.getElementById(`mesaje_${campo}`).classList.add('d-none');
           campos[campo] = true;
       } else {
           //    incorrecto
           document.getElementById(`${campo}`).classList.remove('is-valid');
           document.getElementById(`${campo}`).classList.add('is-invalid');
           //mensaje
           document.getElementById(`mesaje_${campo}`).classList.remove('d-none');
           campos[campo] = false;
       }

   }
   //   registro de datos
   function login(event) {
       event.preventDefault();
       if (campos.nameusuario && campos.password) {
           loginuser();
       } else {
           alerta('error', 'Los campos no son validos');
       }

   }
   // visualizar ocntraseñas 
   function togglePasswordVisibility(passwordId) {
       const passwordInput = document.getElementById(passwordId);
       const buttonIcon = passwordInput.nextElementSibling.querySelector('i');

       if (passwordInput.type === 'password') {
           passwordInput.type = 'text';
           buttonIcon.classList.remove('bi-eye');
           buttonIcon.classList.add('bi-eye-slash');
       } else {
           passwordInput.type = 'password';
           buttonIcon.classList.remove('bi-eye-slash');
           buttonIcon.classList.add('bi-eye');
       }
   }

   function loginuser() {
       fetch('inicio-session', {
           method: "POST",
           body: new FormData(formlogin)
       }).then(response => response.json()).then(response => {
           if (response.success == true) {
               console.log(response.tipo);
               switch (response.tipo) {
                   case 1:
                   case "1":
                       alertair('success', `${response.message}`, 'asesor');
                       break;
                   case 2:
                   case "2":
                       alertair('success', `${response.message}`, 'gerente');
                       break;
                   case 3:
                   case "3":
                       alertair('success', `${response.message}`, 'direccion');
                       break;
                   case 4:
                   case "4":
                       alertair('success', `${response.message}`, 'area-de-ti');
                       break;
                   default:
                       alerta('error', 'No existe ese rol');
                       break;
               }
               document.getElementById("formlogin").reset();
               return false;
           } {
               //    console.log(response.message)
               alerta('error', `${response.message}`);
           }
       });
   }

   function alerta(icono, titulo) {
       Swal.fire({
           icon: icono,
           title: titulo,
           showConfirmButton: false,
           timer: 1500
       })
   }

   function alertair(icono, titulo, dirige) {
       Swal.fire({
           icon: icono,
           title: titulo,
           showConfirmButton: false,
           timer: 1500
       }).then(function () {
           window.location = dirige;
       });
   }