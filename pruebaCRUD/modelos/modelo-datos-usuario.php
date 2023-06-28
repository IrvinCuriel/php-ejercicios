<?php
include_once '../inc/funciones/bd.php';


//define the employee ID

$id = $_POST['id'];
$id_usuario = intval($id);

//echo $id;
//echo json_encode($id);


try {

  $sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario' ";
  $resultado = $conn->query($sql);
  $datos_usuario = $resultado->fetch_assoc();

  $array = array(
    'datos_usuario' => $datos_usuario
  );
  echo json_encode($array);
} catch (Exception $e) {
  echo "Error!";
  return false;
}
