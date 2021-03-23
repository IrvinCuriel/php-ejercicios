<?php include 'includes/header.php';

// *******************************************************************************************************
// PHP 8
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
*/
// *******************************************************************************************************

// Interfaces
// Permiten agrupar funciones, que hace una clase, que funciones tiene

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


// *******************************************************************************************************

include 'includes/footer.php';
