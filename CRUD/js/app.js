const formularioContactos = document.querySelector('#contacto'),
      listadoContactos = document.querySelector('#listado-contactos tbody'),
      inputBuscador = document.querySelector('#buscar');

eventListeners();

function eventListeners() {

        //Cuando el formulario de crear o editar se ejecuta
        formularioContactos.addEventListener('submit', leerFormulario);

        //Listener para eliminar el botones
        if (listadoContactos) {
          listadoContactos.addEventListener('click', eliminarContacto);
        }

        // eventlistener de buscador
        inputBuscador.addEventListener('input', buscarContactos);

        //funcion de numero de contactos
        numeroContactos();
  }

// ************************************************************************** //
// LEER FORULARIO
function leerFormulario(e) {
  e.preventDefault();

  //console.log(e);
  //console.log('presionaste...');

  // Leer los datos de los inputs
  const nombre = document.querySelector('#nombre').value,
        empresa = document.querySelector('#empresa').value,
        telefono = document.querySelector('#telefono').value,
        accion = document.querySelector('#accion').value;

  if(nombre === '' || empresa === '' || telefono === '') {
    //console.log('los campos están vacios')
    // 2 parametros: texto y clase para  mostrarNotificacion();
    mostrarNotificacion('Todos los campos son Obligatorios', 'error');
  } else {
    //console.log('Tienen algo');
    const infoContacto = new FormData();
    infoContacto.append('nombre', nombre);
    infoContacto.append('empresa', empresa);
    infoContacto.append('telefono', telefono);
    infoContacto.append('accion', accion);

    console.log(...infoContacto);

    if(accion === 'crear'){
      // crearemos un nuevo contactos
      insertarBD(infoContacto);
    } else {
      // Editar el contacto
      // leer id Creado en cap 378
      const idRegistro = document.querySelector('#id').value;
      infoContacto.append('id', idRegistro);
      actualizarRegistro(infoContacto);
    }
  }
}
// ************************************************************************** //
// INSERTAR EN LA BASE DE DATOS VIA AJAX //
function insertarBD(datos) {
  //llamado a AJAX

  //crear el objeto
  const xhr = new XMLHttpRequest();
  //abrir la conexion
  xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);
  //Pasar los DATOS
  xhr.onload = function() {
    if(this.status === 200) {
      //console.log(xhr.responseText);
      console.log(JSON.parse( xhr.responseText) );
      //leemos la respuesta en php (DEL LA HIJA Modelo-contactos.php)
      const respuesta = JSON.parse( xhr.responseText);
      //console.log(respuesta.empresa);

      // INSERTA UN NUEVO ELEMENTO A LA TABLA  nota se agrega al final de esta seccin nuevoContacto.appendChild(contenedorAcciones);
      const nuevoContacto = document.createElement('tr');

      nuevoContacto.innerHTML = `
          <td>${respuesta.datos.nombre}</td>
          <td>${respuesta.datos.empresa}</td>
          <td>${respuesta.datos.telefono}</td>
      `;

      // crear contenedor para los botones
      const contenedorAcciones = document.createElement('td');

      // crear el icono de editar
      const iconoEditar = document.createElement('i');
      iconoEditar.classList.add('fas', 'fa-pen-square');

      // crear el enlace para editar
      const btnEditar = document.createElement('a');
      btnEditar.appendChild(iconoEditar);
      btnEditar.href = `editar.php?id=${respuesta.datos.id_insertado}`; // comparar con * (eliminar)
      btnEditar.classList.add('btn', 'btn-editar');

      // agregar al padre  el anterior
      contenedorAcciones.appendChild(btnEditar);

      //crear icono de eliminar
      const iconoEliminar = document.createElement('i');
      iconoEliminar.classList.add('fas', 'fa-trash-alt');

      // crear el boton de eliminar
      const btnEliminar = document.createElement('button');
      btnEliminar.appendChild(iconoEliminar);
      btnEliminar.setAttribute('data-id', respuesta.datos.id_insertado); // comparar con * (Editar)
      btnEliminar.classList.add('btn', 'btn-borrar');

      // agregar al padre
      contenedorAcciones.appendChild(btnEliminar);


      // Agregar al tr
      nuevoContacto.appendChild(contenedorAcciones);

      //agregar con  los contactos
      listadoContactos.appendChild(nuevoContacto);

      // Resetear el formularioContactos
      document.querySelector('form').reset();

      // Mostar la notificacion
      mostrarNotificacion('Contacto Creado Correctamente', 'correcto');

      // Actualizar el numero de contactos
      numeroContactos();
    }
  }



  // enviar los DATOS
  xhr.send(datos)

}
// ************************************************************************** //
// ACTUALIZAR REGISTRO
function actualizarRegistro(datos) {
  //console.log(...datos);

  //OPERACIONES DE AJAX
  // crear el objeto
  const xhr = new XMLHttpRequest();

  // abrir la conexion
  xhr.open('POST', 'inc/modelos/modelo-contactos.php', true);

  //Leer la respuesta
  xhr.onload = function() {
    if(this.status === 200) {
      const respuesta = JSON.parse(xhr.responseText);

      //console.log(respuesta);
      if(respuesta.respuesta === 'correcto'){
        // mostrar notificacion de correto
        mostrarNotificacion('Contacto Editado Correctamente', 'correcto');
      } else {
        // hubo un error
        mostrarNotificacion('Hubo un error...', 'error');
      }
      // Despues de 3 segundos redireccionar
      setTimeout(() => {
          window.location.href = 'index.php';
      }, 4000);
    }
  }
  //enviar la peticion
  xhr.send(datos);
}
// ************************************************************************* //
// ELIMINAR CONTACTO
function eliminarContacto(e) {
  // console.log(e.target.parentElement.classList.contains('btn-borrar')); nota ver en cosola como marca true por que se selaciona el boton
    if (e.target.parentElement.classList.contains('btn-borrar')) {
      // tomar el // IDEA:
      const id = e.target.parentElement.getAttribute('data-id');
      //console.log(id);
      //preguntar al usuario
      const respuesta = confirm('¿Estás Seguro (a) ?');

      if(respuesta) {
        // llamado a ajax

        // crear el objeto
        const xhr = new XMLHttpRequest();
        // abrir la conexion
        xhr.open('GET', `inc/modelos/modelo-contactos.php?id=${id}&accion=borrar`, true);
        //leer la respuesta
        xhr.onload = function() {
          if(this.status === 200) {
            const resultado = JSON.parse(xhr.responseText);
            //console.log(resultado);

            if(resultado.respuesta == 'correcto') {
              // Eliminar el registro del DOM
              console.log(e.target.parentElement.parentElement.parentElement);
              e.target.parentElement.parentElement.parentElement.remove();

              // mostar notificación
              mostrarNotificacion('Contacto eliminado', 'correcto');
              // Actualizar el numero de contactos
              numeroContactos();
            } else {
              //Mostrar una notificación
              mostrarNotificacion('Hubo un error...', 'error');
            }

          }
        }
        //enviar la peticion
        xhr.send();
      }

    }
}
// ************************************************************************** //

// ************************************************************************** //
// Notificacion en pantalla
function mostrarNotificacion(mensaje, clase) {
  const notificacion = document.createElement('div');
  notificacion.classList.add(clase, 'notificacion', 'sombra');
  notificacion.textContent = mensaje;

  //Formulario
  formularioContactos.insertBefore(notificacion, document.querySelector('form legend'));

  // Ocultar y Mostrar la Notificacion
  setTimeout(() => {
    notificacion.classList.add('visible');

    setTimeout(() => {
      notificacion.classList.remove('visible');

      //notificacion.remove();
      setTimeout(() => {
        notificacion.remove();
      }, 500)

    }, 3000);
  }, 100);
}
// ************************************************************************** //
// ************************************************************************** //
// BUSCAR CONTACTOS
function buscarContactos(e){
    //console.log(e.target.value);
    const expresion = new RegExp(e.target.value, "i");
          registros = document.querySelectorAll('tbody tr');

    registros.forEach(registro => {
      registro.style.display = 'none';

      //console.log(registro.childNodes[1].textContent);
      //console.log(registro.childNodes[1].textContent.replace(/\s/g, " ").search(expresion) != -1);
      if(registro.childNodes[1].textContent.replace(/\s/g, " ").search(expresion) != -1 ){
          registro.style.display = 'table-row';
      }
      numeroContactos();
    })
}
// ************************************************************************** //
// ************************************************************************** //
// MOSTAR NUMERO DE CONTACTOS
function numeroContactos() {
  const totalContactos = document.querySelectorAll('tbody tr'),
        contenedorNumero = document.querySelector('.total-contactos span');

  //console.log(totalContactos.length);

  let total = 0;

  totalContactos.forEach(contacto => {
      //console.log(contacto.style.display);
      if(contacto.style.display === '' || contacto.style.display === 'table-row'){
        total++;
      }
  });
  //console.log(total);
  contenedorNumero.textContent = total;
}

// ************************************************************************** //
