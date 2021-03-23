<?php
declare( strict_types = 1);

include 'includes/header.php';

// *******************************************************************************************************
// ENCAPSULACIÓN
// EN PHP8
/*
class Producto {

    // Public - Se puede acceder y modificar en cualquier lugar (clase y objeto)
    // protected - Se puede acceder / modificar unicamente en la clase
    // private solo miembros de la misma clase pueden acceder a el

    public function __construct(protected string $nombre, public int $precio, public bool $disponible)
    {
    }

    public function mostrarProducto() : void {
        echo "El Producto es: " . $this->nombre . " y su precio es de: " . $this->precio;
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }

}

$producto = new Producto('Tablet', 200, true);
// $producto->mostrarProducto();

echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre');

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 300, true);
// $producto2->mostrarProducto();

echo $producto2->getNombre();

// echo "<pre>";
*/
// *******************************************************************************************************

// ENCAPSULACIÓN

class Producto {

  // Public - Se puede acceder y modificar en cualquier lugar
  // Protected - Se puede acceder / modificar unicamente en la clase
  // Private solamente miebros de la misma clase pueden acceder a el

      Protected $nombre;
      public $precio;
      public $disponible;

  //public function __construct($nombre, $precio, $disponible)
  //public function __construct(string $nombre, int $precio, bool $disponible)
  // En PHP8...
  //public function __construct(public string $nombre, public int $precio, public bool $disponible)
  //{
  //}
  // ...En PHP8
  public function __construct(string $nombre, int $precio, bool $disponible) {
    //echo "Desde el construcor";
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->disponible = $disponible;
  }

  //public function mostrarProducto() {
  //  echo "El Producto es: " . $this->nombre . " y su precio es de: " . $this->precio;
  //}
  public function mostrarProducto() : void {
    echo "El Producto es: " . $this->nombre . " y su precio es de: " . $this->precio;
  }

  //public function getNombre() {
  //  return $this->nombre;
  //}
  public function getNombre() : string {
    return $this->nombre;
  }

  public function setNombre(string $nombre) {
    $this->nombre = $nombre;
  }

}

$producto = new Producto('Tablet', 200, true);
//echo "El Producto es: " . $producto->nombre . " y su precio es de: " . $producto->precio;
//$producto->mostrarProducto();
echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre');

// PARA PROBAR USANDO PUBLIC, PROTECTED
//$producto->nombre = "Nuevo Nombre";
//echo $producto->nombre;

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 400, true);
//echo "El Producto es: " . $producto2->nombre . " y su precio es de: " . $producto2->precio;
//$producto2->mostrarProducto();
echo $producto2->getNombre();

//echo "<pre>";
//var_dump($producto2);
//echo "</pre>";

// *******************************************************************************************************

include 'includes/footer.php';
