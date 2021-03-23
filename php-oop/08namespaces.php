<?php include 'includes/header.php';

// *******************************************************************************************************
// PHP 8
/*
require 'vendor/autoload.php';

// require 'clases/Clientes.php';
// require 'clases/Detalles.php';

use App\Clientes;
use App\Detalles;
use \Firebase\JWT\JWT;

$detalles = new Detalles();
$clientes = new Clientes();

$key = "example_key";
$payload = array(
    "iss" => "http://example.org",
    "aud" => "http://example.com",
    "iat" => 1356999524,
    "nbf" => 1357000000
);

$jwt = JWT::encode($payload, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));

print_r($decoded);


$decoded_array = (array) $decoded;

JWT::$leeway = 60; // $leeway in seconds
$decoded = JWT::decode($jwt, $key, array('HS256'));
*/
// *******************************************************************************************************

//require 'clases/Clientes.php';
//require 'clases/Detalles.php';

function mi_autoload($clase) {
  //echo $clase;
  $partes = explode('\\', $clase);
  //var_dump($partes);
  //var_dump($partes[1]);
  //echo "<br>";
  //echo __DIR__ . '/clases/' . $partes[1] . '.php';
  require __DIR__ . '/clases/' . $partes[1] . '.php';
}
spl_autoload_register('mi_autoload');

class Clientes {

  public function __construct()
  {
    echo "Desde 08.php que contiene los clientes";
  }

}

$detalles = new App\Detalles();
$clientes = new App\Clientes();
$clientes2 = new Clientes();


// *******************************************************************************************************

include 'includes/footer.php';
