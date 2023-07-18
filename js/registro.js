  //validacion formulario 
  const formEv = document.getElementById('formregistro');
  const inputs = document.querySelectorAll('#formregistro input');
  const expresiones = {
      nombre: /^[a-zA-Z0-9À-ÿ\s]{3,50}$/, // Letras, numeros, guion y guion_bajo
      fecha: /^\d{4}-(0?[1-9]|1[0-2])-(0?[1-9]|[1-2][0-9]|3[0-1])$/,
      password: /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9!@#$%^&*()-=_+]{8,20}$/,
  }
  const campos = {
      usuario: false,
      apellidos: false,
      fecha: false,
      perfil: false,
      nameusuario: false,
      password: false,
      password1: false,
  }

  const validarForm = (e) => {
      switch (e.target.name) {
          case "usuario":
              validarCampo(expresiones.nombre, e.target, 'usuario');
              break;
          case "apellidos":
              validarCampo(expresiones.nombre, e.target, 'apellidos');
              break;
          case "nameusuario":
              validarCampo(expresiones.nombre, e.target, 'nameusuario');
              break;
          case "fecha":
              validarCampo(expresiones.fecha, e.target, 'fecha');
              break;
          case "password":
              validarCampo(expresiones.password, e.target, 'password');
              break;
          case "password1":
              validarCampo(expresiones.password, e.target, 'password1');
              break;
      }
  }
  const selectPerfil = document.getElementById('perfil');
  selectPerfil.addEventListener('change', (e) => {
      validarSelect(e.target, 'perfil');
  });
  const validarSelect = (input, campo) => {
      const valor = input.value;
      //   console.log(valor);
      if (valor !== '0') {
          document.getElementById(campo).classList.remove('is-invalid');
          document.getElementById(campo).classList.add('is-valid');
          document.getElementById(`mensaje_${campo}`).classList.add('d-none');
          campos[campo] = true;
      } else {
          document.getElementById(campo).classList.remove('is-valid');
          document.getElementById(campo).classList.add('is-invalid');
          document.getElementById(`mensaje_${campo}`).classList.remove('d-none');
          campos[campo] = false;
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
  function registrar(event) {
      event.preventDefault();
      //   console.log()
      if (campos.usuario && campos.perfil && campos.apellidos && campos.fecha && campos.nameusuario && campos.password && campos.password1) {
          const password = document.getElementById('password').value,
              password1 = document.getElementById('password1').value;
          if (password != password1) {
              alerta('error', 'Las contraseñas no coinciden');
              return false;
          } else {
              const checkbox = document.getElementById('acceptTerms');
              if (checkbox.checked) {
                  checkbox.classList.remove('is-invalid');
                  document.getElementById(`mesaje_acceptTerms`).classList.add('d-none');
                  regsitrouser();
              } else {
                  checkbox.classList.add('is-invalid');
                  document.getElementById(`mesaje_acceptTerms`).classList.remove('d-none');
              }
          }
      } else {
          alerta('error', 'Los campos no son validos');
      }

  }

  function regsitrouser() {
      fetch("registro-usuario", {
          method: "POST",
          body: new FormData(formregistro)
      }).then(response => response.json()).then(response => {
          if (response.success == true) {
              console.log(response.message);
              document.getElementById('formregistro').reset();
              alertair('success', `${response.message}`);
              return false;
          } {
              // console.log(response.message)
              alerta('error', `${response.message}`);
          }
      });
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

  function alerta(icono, titulo) {
      Swal.fire({
          icon: icono,
          title: titulo,
          showConfirmButton: false,
          timer: 1500
      })
  }

  function alertair(icono, titulo) {
      Swal.fire({
          icon: icono,
          title: titulo,
          showConfirmButton: false,
          timer: 1500
      }).then(function () {
          window.location.href = 'inicio';
      });
  }