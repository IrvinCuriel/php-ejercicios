
  <footer class="main-footer">

  </footer>

  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.js"></script>
  <!-- sweetalert2 AGREGADO EN CAP 444 -->
  <script src="js/sweetalert2.min.js"></script>
  <!-- DataTables  AGREGADO EN CAP 449-->
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script src="js/app.js"></script>

  <script>

  /*
  $(document).on('click', '.editar_usuario', function(event) {
    var id = event.target.dataset.id
    console.log('id');
    console.log(id);
  });
  */

  $(document).ready(function(){
    $('.editar_usuario').click(function(){
      $('#editar_usuario').modal('show');
      var id = $(this).data('id');
      console.log('id');
      console.log(id);

      const infoUsuario = new FormData();
      infoUsuario.append('id', id);

      //crear el objeto
      const xhr = new XMLHttpRequest();
      //abrir la conexion
      xhr.open('POST', 'modelos/modelo-datos-usuario.php', true);
      //Pasar los DATOS
      xhr.onload = function() {
        if(this.status === 200) {
          //console.log(xhr.responseText);
          console.log(JSON.parse( xhr.responseText) );

          var datos_usuario = JSON.parse( xhr.responseText);

          $('#nombre_edit').val(datos_usuario['datos_usuario']['nombre']);
          $('#correo_edit').val(datos_usuario['datos_usuario']['correo']);
          $('#telefono_edit').val(datos_usuario['datos_usuario']['telefono']);
          $('#id_usuario_edit').val(datos_usuario['datos_usuario']['id_usuario']);

          // Resetear el formularioContactos
          //document.querySelector('form').reset();

          // Mostar la notificacion
          //mostrarNotificacion('Contacto Creado Correctamente', 'correcto');

        }
      }
      // enviar los DATOS
      xhr.send(infoUsuario)


/*
      $.ajax({
        type: 'POST',
        id: id,
        url: 'modelos/modelo-datos-usuario.php',
        dataType: 'json',
        success: function(data) {
            var resultado = data;
            console.log('resultado');
            console.log(resultado);

            if(resultado.respuesta == 'exito') {
              Swal.fire(
                  'Correcto!',
                  'Se guardo correctamente!',
                  'success'
                  )
            } else {
              Swal.fire(
                  'Hubo un error!',
                  'Intente de nuevo!',
                  'error'
                )
            }

        }
      })
*/

    });
  });


  </script>

</body>
</html>
