<?php include 'includes/header.php';

// *******************************************************************************************************
// EN PHP 8
/*
interface TransporteInterfaz {
    public function getInfo() : string;
    public function getRuedas() : int;
}

class Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad)
    {

    }

    public function getInfo() : string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $color)
    {

    }

    public function getInfo() : string {
        return "El transporte AUTO tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas y tiene el color" . $this->color;
    }

    public function getColor() : string {
        return "El color es " . $this->color;
    }
}

echo "<pre>";

var_dump($transporte = new Transporte(8, 20));
var_dump($auto = new Automovil(4, 4, 'Rojo'));

echo $transporte->getInfo();
echo "<br>";

echo $auto->getInfo();
echo "<br>";

echo $auto->getColor();

echo "</pre>";
*/
// *******************************************************************************************************
// Polimorfismo
//

interface TransporteInterfaz {
  public function getInfo() : string;
  public function getRuedas() : int;
  //public function getColor() : string;
}

class Transporte implements TransporteInterfaz {

    protected $ruedas;
    protected $capacidad;

    public function __construct( int $ruedas, int $capacidad)
    {
      $this->ruedas = $ruedas;
      $this->capacidad = $capacidad;
    }

    public function getInfo() : string {
        return "El transporte tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}

class Automovil extends Transporte implements TransporteInterfaz {

    protected $ruedas;
    protected $capacidad;
    protected $color;
    public function __construct( int $ruedas, int $capacidad, string $color)
    {
      $this->ruedas = $ruedas;
      $this->capacidad = $capacidad;
      $this->color = $color;
    }

    public function getInfo() : string {
        return "El transporte AUTO tiene " . $this->ruedas . " ruedas y una capacidad de " . $this->capacidad . " personas " .
        "personas y tiene el color" . $this->color;
    }

    public function getColor() : string {
      return "El color es " . $this->color;
    }

}

echo "<pre>";

var_dump($transporte = new Transporte(8, 20));
var_dump($auto = new Automovil(4, 4, 'Rojo'));

echo $transporte->getInfo();
echo "<br>";

echo $auto->getInfo();
echo "<br>";

echo $auto->getColor();


// *******************************************************************************************************

include 'includes/footer.php';
