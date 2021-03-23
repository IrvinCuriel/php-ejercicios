<?php
declare( strict_types = 1);

include 'includes/header.php';

// *******************************************************************************************************
// Métodos Estaticos
// EN PHP8
/*
class Producto {


    public $imagen;
    public static $imagenPlaceholder = "Imagen.jpg";

    public function __construct(protected string $nombre, public int $precio, public bool $disponible, string $imagen)
    {
        if($imagen) {
            self::$imagenPlaceholder = $imagen;
        }
    }

    public static function obtenerImagenProducto() {
        return self::$imagenPlaceholder;
    }

    public static function obtenerProducto() {
        echo "Obteniendo datos del Producto...";
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


$producto = new Producto('Tablet', 200, true, '');
// $producto->mostrarProducto();

echo $producto->obtenerImagenProducto();

echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre');

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 300, true, 'monitorCurvo.jpg');
// $producto2->mostrarProducto();

echo $producto2->getNombre();

echo $producto2->obtenerImagenProducto();

// echo "<pre>";
// var_dump($producto2);
// echo "</pre>";
*/
// *******************************************************************************************************
// Métodos Estaticos

class Producto {

      Protected $nombre;
      public $precio;
      public $disponible;

      public static $imagen;
      public static $imagenPlaceholder = "imagen.jpg";

  //public function __construct($nombre, $precio, $disponible)
  //public function __construct(string $nombre, int $precio, bool $disponible)
  // En PHP8...
  //public function __construct(public string $nombre, public int $precio, public bool $disponible)
  //{
  //}
  // ...En PHP8
  public function __construct(string $nombre, int $precio, bool $disponible, string $imagen) {
    //echo "Desde el construcor";
    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->disponible = $disponible;
    $this->imagen = $imagen;

    if ($imagen) {
      self::$imagenPlaceholder = $imagen;
    }

  }

  public static function obtenerImagenProducto() {
    return self::$imagenPlaceholder;
  }

  public static function obtenerProducto() {
    echo "Obteniendo datos del producto...";
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


echo Producto::obtenerImagenProducto();
echo Producto::obtenerProducto();

$producto = new Producto('Tablet', 200, true, '');
//echo "El Producto es: " . $producto->nombre . " y su precio es de: " . $producto->precio;
//$producto->mostrarProducto();
echo $producto->obtenerImagenProducto();
//echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre');

// PARA PROBAR USANDO PUBLIC, PROTECTED
//$producto->nombre = "Nuevo Nombre";
//echo $producto->nombre;

//echo "<pre>";
//var_dump($producto);
//echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 400, true, 'monitorCurvo.jpg');
//echo "El Producto es: " . $producto2->nombre . " y su precio es de: " . $producto2->precio;
//$producto2->mostrarProducto();
echo $producto->obtenerImagenProducto();
//echo $producto2->getNombre();

//echo "<pre>";
//var_dump($producto2);
//echo "</pre>";

// *******************************************************************************************************

include 'includes/footer.php';
