<?php
$conn = new mysqli('localhost', 'root', '132456', 'pruebacrud');

if(!$conn) {
  echo "No se pudo conectar a MySQL";
  exit;
}
