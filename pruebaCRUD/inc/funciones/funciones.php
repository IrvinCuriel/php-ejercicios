<?php

//******************************************************************//
function obtenerUsuarios() {
  include 'bd.php';

  try {
    return $conn->query("SELECT id_usuario, nombre, correo, telefono FROM usuarios");
  } catch (Exception $e) {
    echo "Error!";
    return false;
  }

}
//******************************************************************//

function obtenerUsuario() {
  include 'bd.php';

  try {
    return $conn->query("SELECT id_usuario, nombre, correo, telefono FROM usuarios WHERE id=$id");
  } catch (Exception $e) {
    echo "Error!";
    return false;
  }

}
