<?php
declare( strict_types = 1);

include 'includes/header.php';

// *******************************************************************************************************
// EN PHP 8
// Definir una clase
/*
class Producto {
    public function __construct(public string $nombre, public int $precio, public bool $disponible)
    {
    }

    public function mostrarProducto() {
        echo "El Producto es: " . $this->nombre . " y su precio es de: " . $this->precio;
    }

}

$producto = new Producto('Tablet', 200, true);
$producto->mostrarProducto();


echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 300, true);
$producto2->mostrarProducto();

echo "<pre>";
var_dump($producto2);
echo "</pre>";
*/
// *******************************************************************************************************
// Definir una clase
/*
class Producto {
      public $nombre;
      public $precio;
      public $disponible;
}

$producto = new Producto();
$producto->nombre = 'Tablet';
$producto->precio = 200;
$producto->disponible = true;

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto();
$producto2->nombre = 'Monitor Curvo';
$producto2->precio = 300;
$producto2->disponible = true;

echo "<pre>";
var_dump($producto2);
echo "</pre>";
*/
// *******************************************************************************************************

class Producto {

      public $nombre;
      public $precio;
      public $disponible;

  //public function __construct($nombre, $precio, $disponible)
  //public function __construct(string $nombre, int $precio, bool $disponible)
  public function __construct(string $nombre, int $precio, bool $disponible) {
    //echo "Desde el construcor";
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->disponible = $disponible;
  }

  public function mostrarProducto() {
    echo "El Producto es: " . $this->nombre . " y su precio es de: " . $this->precio;
  }

}

$producto = new Producto('Tablet', 200, true);
//echo "El Producto es: " . $producto->nombre . " y su precio es de: " . $producto->precio;
$producto->mostrarProducto();

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 400, true);
//echo "El Producto es: " . $producto2->nombre . " y su precio es de: " . $producto2->precio;
$producto2->mostrarProducto();

echo "<pre>";
var_dump($producto2);
echo "</pre>";

// *******************************************************************************************************

include 'includes/footer.php';
