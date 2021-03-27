<?php
include 'inc/funciones/funciones.php'; // AGREGADO EN CAP 377
include 'inc/layout/header.php';

// ********************para editar ************************************************//
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT); // AGREGADO EN CAP 377

if(!$id) {
  die('no es valido');
}
$resultado = obtenerContacto($id);
$contacto = $resultado->fetch_assoc();

// ********************para editar ************************************************//

?>

<?php
//<pre>
  //<?php var_dump($contacto);
//</pre>
?>

<div class="contenedor-barra">
  <div class="contenedor barra">
    <a href="index.php" class="btn volver">Volver</a>
    <h1>Editar contacto</h1>
  </div>
</div>

<div class="bg-amarillo contenedor sombra">
  <form id="contacto" action="#">
    <legend>Edite el Contacto </legend>

    <?php include 'inc/layout/formulario.php'; ?>

  </form>
</div>

<?php include 'inc/layout/footer.php'; ?>
