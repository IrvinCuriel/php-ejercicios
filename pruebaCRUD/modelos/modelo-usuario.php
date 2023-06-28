<?php
include_once '../inc/funciones/bd.php';

/*
echo "<pre>";
 var_dump($_POST);
echo "</pre>";
*/


$accion = $_POST['accion'];

if($accion == 'crear'){
  $nombre = $_POST['nombre'];
  $correo = $_POST['correo'];
  $telefono = $_POST['telefono'];
  $accion = $_POST['accion'];

  $stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, telefono) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nombre, $correo, $telefono);
  $stmt->execute();

  if($stmt->affected_rows == 1){
    echo "Se guardo Correctamente";
  }

}


if($accion == 'editar'){

  $nombre_editado = $_POST['nombre_edit'];
  $correo_editado = $_POST['correo_edit'];
  $telefono_editado = $_POST['telefono_edit'];
  $id_usuario = intval($_POST['id_usuario_edit']);


  try {
      $stmt = $conn->prepare('UPDATE usuarios SET nombre = ?, correo = ?, telefono = ?  WHERE id_usuario = ? ');
      $stmt->bind_param('sssi', $nombre_editado, $correo_editado, $telefono_editado, $id_usuario);
      $stmt->execute();
      if($stmt->affected_rows) {
          $respuesta = array(
              'respuesta' => 'exito',
              'id_actualizado' => $id_usuario
          );
      } else {
          $respuesta = array(
              'respuesta' => 'error'
          );
      }
      $stmt->close();
      $conn->close();
  } catch (Exception $e) {
      $respuesta = array(
          'respuesta' => $e->getMessage()
      );
  }
  die(json_encode($respuesta));

}
