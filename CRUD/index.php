<?php
  include 'inc/funciones/funciones.php';
  include 'inc/layout/header.php';
?>

<div class="contenedor-barra">
  <h1>Agenda de contacto</h1>
</div>

<div class="bg-amarillo contenedor sombra">
  <form id="contacto" action="#">
    <legend>Añada un contacto <span>Todos los campos son obligatorios</span></legend>

    <?php include 'inc/layout/formulario.php'; ?>

<!-- SE ELIMINA Y PEGA EN FOTMULARIO PHP EN CAP 366
    <div class="campos">
      <div class="campo">
        <label for="nombre">Nombre:</label>
        <input type="text" placeholder="Nombre Contacto" id="nombre">
      </div>
      <div class="campo">
        <label for="empresa">Empresa:</label>
        <input type="text" placeholder="Nombre Empresa" id="empresa">
      </div>
      <div class="campo">
        <label for="nombre">Télefono:</label>
        <input type="tel" placeholder="Nombre Contacto" id="nombre">
      </div>
    </div>

      <div class="campo enviar">
          <input type="submit" value="Añadir">
      </div>
-->

  </form>
</div>

<div class="bg-blanco contenedor sombra contactos">
  <div class="contenedor-contactos">
    <h2>Contactos</h2>
    <input type="text" id="buscar" class="buscador sombra" placeholder="Buscar Contactos..">
    <p class="total-contactos"><span></span>  Contactos</p>

    <div class="contenedor-tabla">
      <table id="listado-contactos" class="listado-contactos">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Empresa</th>
            <th>Telefono</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
          <?php $contactos = obtenerContactos();
            //  var_dump($contactos);
            if($contactos->num_rows) {

              foreach ($contactos as $contacto) { ?>

          <tr>

<?php
        //    <pre>
      //      <?php var_dump($contacto)
        //    </pre>
 ?>


            <td><?php echo $contacto['nombre']; ?></td>
            <td><?php echo $contacto['empresa']; ?></td>
            <td><?php echo $contacto['telefono']; ?></td>
            <td>
              <a class="btn-editar btn" href="editar.php?id=<?php echo $contacto['id']; ?>">
                <i class="fas fa-pen-square"></i>
              </a>
              <button data-id="<?php echo $contacto['id']; ?>" type="button" class="btn-borrar btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </td>
          </tr>

                      <?php }
                    } ?>

        </tbody>
      </table>

    </div>

  </div>
</div>


<?php include 'inc/layout/footer.php'; ?>
