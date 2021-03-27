<?php

//*****************************************************************************//
if($_POST['accion'] == 'crear'){
  // creará un nuevo registro en la base de DATOS
  require_once('../funciones/bd.php');

  // Validar las entradas
  $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
  $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
  $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

  //echo json_encode($_POST);

  try {
      $stmt = $conn->prepare("INSERT INTO contactosagen (nombre, empresa, telefono) VALUES (?, ?, ?)");
      $stmt->bind_param("sss", $nombre, $empresa, $telefono);
      $stmt->execute();
      //$respuesta = array(
        //'respuesta' => 'correcto',
        //'info' => $stmt->affected_rows
      //);
      if($stmt->affected_rows == 1) {
        $respuesta = array(
          'respuesta' => 'correcto',
          //'id_insertado' => $stmt->insert_id,
          'datos' => array(
            'nombre' => $nombre,
            'empresa' => $empresa,
            'telefono' => $telefono,
            'id_insertado' => $stmt->insert_id
          )
        );
      }
      $stmt->close();
      $conn->close();
  } catch(Exception $e) {
    $respuesta = array(
      'error' => $e->getMessage()
    );
  }

  echo json_encode($respuesta);

}
//*****************************************************************************//

//*****************************************************************************//
if($_GET['accion'] == 'borrar') {
  // echo json_encode($_GET);
  require_once('../funciones/bd.php');

  $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

  try {
    $stmt = $conn->prepare("DELETE FROM contactosagen WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    if($stmt->affected_rows == 1) {
      $respuesta = array(
        'respuesta' => 'correcto'
      );
    }
    $stmt->close();
    $conn->close();
  } catch (Exception $e){
    $respuesta = array(
      'error' => $e->getMessage()
    );
  }
  echo json_encode($respuesta);
}
//*****************************************************************************//

// **************************** para actualizar registro **********************//
if($_POST['accion'] == 'editar') {
  // echo json_encode($_GET);  lo que se manda a php
  require_once('../funciones/bd.php');

  // Validar las entradas
  $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
  $empresa = filter_var($_POST['empresa'], FILTER_SANITIZE_STRING);
  $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);
  $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);

  try {
      $stmt = $conn->prepare("UPDATE contactosagen SET nombre = ?, telefono = ?, empresa = ? WHERE id = ?");
      $stmt->bind_param("sssi", $nombre, $telefono, $empresa, $id);
      $stmt->execute();
      if($stmt->affected_rows == 1) {
        $respuesta = array(
          'respuesta' => 'correcto'
        );
      } else {
        $respuesta = array(
          'respuesta' => 'error'
        );
      }
      $stmt->close();
      $conn->close();
  } catch (Exception $e){
    $respuesta = array(
      'error' => $e->getMessage()
    );
  }
  echo json_encode($respuesta);
}

  // **************************** para actualizar registro **********//
