<?php
include 'inc/funciones/bd.php';
include 'inc/funciones/funciones.php';
include 'inc/layout/header.php';
?>

<div class="container-fluid">
  PRUEBA CRUD
</div>

<br>
<br>

<div class="container-fluid">
  <form class="" action="modelos/modelo-usuario.php" method="post">

    <div class="row">
        <div class="nombre mb-3 col-md-4">
          <label for="nombre" class="form-label">Nombre: </label>
          <input type="text" class="form-control" name="nombre"  id="nombre" required>
        </div>
    </div>
    <div class="row">
        <div class="correo mb-3 col-md-4">
          <label for="correo" class="form-label">Correo: </label>
          <input type="email" class="form-control" name="correo"  id="correo" required>
        </div>
    </div>
    <div class="row">
        <div class="telefono mb-3 col-md-4">
          <label for="telefono" class="form-label">Telefono: </label>
          <input type="text" class="form-control" name="telefono"  id="telefono" required>
        </div>
    </div>
    <div class="">
      <button type="submit" class="button" name="button" id="crear_usuario">Añadir</button>
    </div>
      <input type="hidden" name="accion" value="crear">
  </form>

</div>

<br>
<br>
<div class="container-fluid">
  <h2>Ver y Editar Usuario</h2>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Editar</th>
          <th>Eliminar</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $usuarios = obtenerUsuarios();
           //var_dump($usuarios);
           if($usuarios->num_rows){
             foreach ($usuarios as $usuario) { ?>

        <tr>
          <td><?php echo $usuario['nombre']; ?> </td>
          <td><?php echo $usuario['correo']; ?></td>
          <td><?php echo $usuario['telefono']; ?></td>
          <td>
            <button type="button" class="btn btn-primary editar_usuario" data-toggle="modal" data-target="#editar_usuario" data-id="<?php echo $usuario['id_usuario'] ?>" >
              Launch demo modal
            </button>
            <a href="editar.php?id=<?php echo $usuario['id_usuario']; ?> ">Editar</a>
          </td>
          <td>
            <a href="eliminar.php">Eliminar</a>
          </td>
        </tr>

      <?php  }
    } ?>


      </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="editar_usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

            <div class="modal-body">

              <form class="" action="modelos/modelo-usuario.php" method="post">


                <div class="row">
                    <div class="nombre_edit mb-3 col-md-6">
                      <label for="nombre_edit" class="form-label">Nombre: </label>
                      <input type="text" class="form-control" name="nombre_edit"  id="nombre_edit" required>
                    </div>
                </div>
                <div class="row">
                    <div class="correo_edit mb-3 col-md-6">
                      <label for="correo_edit" class="form-label">Correo: </label>
                      <input type="email" class="form-control" name="correo_edit"  id="correo_edit" required>
                    </div>
                </div>
                <div class="row">
                    <div class="telefono_edit mb-3 col-md-6">
                      <label for="telefono_edit" class="form-label">Telefono: </label>
                      <input type="text" class="form-control" name="telefono_edit"  id="telefono_edit" required>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="button" id="editar_usuario">Save changes</button>
                </div>
                <input type="hidden" name="accion" value="editar">
                <input type="hidden" id="id_usuario_edit" name="id_usuario_edit" >
              </form>
            </div>



        </div>
      </div>
    </div>



  </div>

</div>



<?php include 'inc/layout/footer.php'; ?>
