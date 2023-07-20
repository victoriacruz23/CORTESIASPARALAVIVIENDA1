  //validacion formulario 
  const formEv = document.getElementById('formsolicitud');
  const inputs = document.querySelectorAll('#formsolicitud input');
  // Agregar evento para escuchar cambios en los inputs
  //   const formEvq = document.getElementById('formregistro');
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
      descripcion: /^[a-zA-Z0-9À-ÿ\s]{3,50}$/, // Letras, numeros, guion y guion_bajo
      montocompleto: /^[1-9]\d{3,14}$/, // Letras, numeros, guion y guion_bajo
      montodescuento: /^(100|[1-9]?[0-9])$/, // Letras, numeros, guion y guion_bajo
  }
  const campos = {
    descripcion: false,
    montocompleto: false,
    montodescuento: false,
  }

  const validarForm = (e) => {
      switch (e.target.name) {
          case "descripcion":
              validarCampo(expresiones.descripcion, e.target, 'descripcion');
              break;
          case "montocompleto":
              validarCampo(expresiones.montocompleto, e.target, 'montocompleto');
              break;
          case "montodescuento":
              validarCampo(expresiones.montodescuento, e.target, 'montodescuento');
              break;
      }
  }
  const selectPerfil = document.getElementById('cortesia');
  selectPerfil.addEventListener('change', (e) => {
      validarSelect(e.target, 'cortesia');
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
// mostrar el div de monto
const cortesiaSelect = document.getElementById("cortesia");
const divparcial = document.getElementById("divparcial");
cortesiaSelect.addEventListener("change", function() {
    const valorSeleccionado = cortesiaSelect.value;
    if (valorSeleccionado === "1") {
        divparcial.classList.remove("d-none");
    } else {
        divparcial.classList.add("d-none");
        document.getElementById('montodescuento').value = 0;
    }
});
consulta();
// CONSULTA A LA BASE DE DATOS DEL SERVIDOR 
function consulta() {
    let userreference = document.getElementById("referencias").value;
    // alert(userreference);
    fetch("asesorc/dt.json", {})
        .then(response => response.json())
        .then(response => {
            // arreglo para insertar
            const clienteEncontrado = response.find(cliente => cliente.REFERENCIA_AFI === userreference);
            // console.log(clienteEncontrado);
            if (clienteEncontrado) {
                const datos = {
                    REFERENCIA_AFI: clienteEncontrado.REFERENCIA_AFI,
                    REFERENCIA_AH: clienteEncontrado.REFERENCIA_AH,
                    PATERNO: clienteEncontrado.PATERNO,
                    MATERNO: clienteEncontrado.MATERNO,
                    NOMBRES: clienteEncontrado.NOMBRES,
                    SEXO: clienteEncontrado.SEXO,
                    CORREO: clienteEncontrado.CORREO,
                    MUNICIPIO: clienteEncontrado.MUNICIPIO,
                    SALDO: clienteEncontrado.SALDO
                };
                nuevocliente(datos);
            }
            // cliclar para presentar
            response.forEach(cliente => {
                if (cliente.REFERENCIA_AFI === `${userreference}`) {
                    const nombreafiElement = document.getElementById("nombreafi");
                    // alert(userreference);
                    nombreafiElement.innerHTML = `
                    <div class="col-12">
                        <label class="form-label">Afiliado</label>
                        <p class="form-control is-valid" id="">${cliente.PATERNO} ${cliente.MATERNO} ${cliente.NOMBRES}</p>
                    </div>
                    `;
                    referenciafi.innerHTML = `
                      <div class="col-12">
                         <label class="form-label">Referencia Afiliado</label>
                         <p class="form-control is-valid" >${cliente.REFERENCIA_AFI}</p>
                      </div>
                    `;
                }
            });

        });
}

function nuevocliente(datos) {
    fetch("databases/insertarcliente.php", {
            method: "POST",
            body: JSON.stringify(datos) // Convertimos los datos a formato JSON antes de enviarlos
        })
        .then(response => response.json())
        .then(response => {
            if (response.success == false) {
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