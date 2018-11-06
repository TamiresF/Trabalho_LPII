
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Travel &mdash; 100% Free Fully Responsive HTML5 Template by FREEHTML5.co</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
  <meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
  <meta name="author" content="FREEHTML5.CO" />

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
  <link rel="shortcut icon" href="favicon.ico">

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
  
  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <!-- Superfish -->
  <link rel="stylesheet" href="css/superfish.css">
  <!-- Magnific Popup -->
  <link rel="stylesheet" href="css/magnific-popup.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <!-- CS Select -->
  <link rel="stylesheet" href="css/cs-select.css">
  <link rel="stylesheet" href="css/cs-skin-border.css">
  
  <link rel="stylesheet" href="css/style.css">


  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
  <!-- FOR IE9 below -->
  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

<?php

$nocupantes = $_GET["adulto"] + $_GET["crianca"]; //Numero de Ocupantes é igual a soma do nº de adultos e nº de crianças escolhidos no form.

//Instanciamento dos objetos
if(isset($_GET["NewYork"])){
  $imovel[0] = new Apartamento('Central Park, 1555 Cep - 40080-004', 'New York', 3000.99, 2, 'Não', $nocupantes , 'Apartamento', 5);
}else if(isset($_GET["Philippines"])){
  $imovel[1] = new CasaPraia('Filipinas, 1555 Cep - 40080-004', 'Filipinas', 1999.99, 2, 'Não', $nocupantes, 'Casa de Praia');
} else if(isset($_GET["Salvador"])){
  $imovel[2] = new Apartamento('Pituba, 1555 Cep - 40080-004', 'Salvador', 490.99, 2, 'Não', $nocupantes, 'Apartamento', 1);
} else if(isset($_GET["SãoJose"])){
  $imovel[3] = new CasaCampo('São José, 1555 Cep - 40080-004', 'São José dos Campos', 299.99, 2, 'Não', $nocupantes, 'Casa de Campo');
} else if(isset($_GET["Floripa"])){
  $imovel[4] = new CasaPraia('Floripa, 1555 Cep - 40080-004', 'Floripa', 699.99, 2, 'Não', $nocupantes, 'Casa de Praia');
} else if(isset($_GET["HongKong"])){
  $imovel[5] = new Apartamento('Hong Kong, 1555 Cep - 40080-004', 'HongKong', 4999.99, 2, 'Não', $nocupantes, 'Apartamento', 10);
} else if(isset($_GET["Recife"])){
  $imovel[6] = new Casa('Recife, 1555 Cep - 40080-004', 'Recife', 799.99, 2, 'Sim', $nocupantes, 'Casa');
}


//Classe Imovél
class Imovel{
  public $endereco;
  public $cidade;
  public $diaria;
  public $quartos;
  public $piscina;
  public $ocupantes;
  public $tipo;
  

  public function __construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo)
  {
    $this->endereco = $endereco;
    $this->cidade = $cidade;
    $this->diaria = $diaria;
    $this->quartos = $quartos;
    $this->piscina = $piscina;
    $this->ocupantes = $ocupantes;
    $this->tipo = $tipo;
  } 

  public function ImprimeImovel(){
    print 'Endereço: ' . $this->getEndereco() . "<br>";
    print 'Cidade: ' . $this->getCidade() . "<br>";
    print 'Diária: ' . 'R$ ' . $this->getDiaria(). "<br>";
    print 'Quartos: ' . $this->getQuartos() . "<br>";
    print 'Piscina: ' . $this->getPiscina() . "<br>";
    print 'Ocupantes: ' . $this->getOcupantes() . "<br>";
    print 'Tipo: ' . $this->getTipo();
    print "<br>";
  }

    public function getEndereco()
    {
       return $this->endereco;
    }

    public function getCidade()
    {
       return $this->cidade;
    }

    public function getDiaria()
    {
       return $this->diaria;
    }

    public function getQuartos()
    {
       return $this->quartos;
    }

    public function getPiscina()
    {
       return $this->piscina;
    }

    public function getOcupantes()
    {
       return $this->ocupantes;
    }

    public function getTipo()
    {
       return $this->tipo;
    }

    public function CalcularAluguel($numdias): float{

      return ($this->diaria * $numdias);
    }
}

class Apartamento extends Imovel
{
  var $andar;

  public function __construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo, $andar)
  {
    parent::__construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo);
    $this->andar = $andar;
  } 

  public function CalcularAluguelApt($numdias) : float{

    return parent::CalcularAluguel($numdias) + (2 * $this->andar);

  }

  public function ImprimeImovel(){


    $data1 = new DateTime( $_GET["checkin"] );
    $data2 = new DateTime( $_GET["checkout"] );

    $intervalo = $data1->diff( $data2 );


    parent::ImprimeImovel();

    print 'Andar:  ' . $this->andar ."º". "<br>";
    print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguelApt($intervalo->d) . ' **Acréscimo ANDAR' . "<br>";
  }
}

class Casa extends Imovel
{
  var $piscina;

  public function __construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo)
  {
    parent::__construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo);  
  } 

  public function CalcularAluguelCasa($numdias) : float{

    if ($this->getPiscina() == "Não"){

      return parent::CalcularAluguel($numdias);

    } else{

      return parent::CalcularAluguel($numdias) + 199.99;
    }
  }

  public function ImprimeImovel(){

    $data1 = new DateTime( $_GET["checkin"] );
    $data2 = new DateTime( $_GET["checkout"] );

    $intervalo = $data1->diff( $data2 );

    parent::ImprimeImovel();


    if ($this->getPiscina() == "Não"){

      print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguelCasa($intervalo->d) . "<br>";

    }else {
      print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguelCasa($intervalo->d) . ' **Acréscimo PISCINA' . "<br>";
    }
    
  }
}

class CasaPraia extends Imovel
{

  public function __construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo)
  {
    parent::__construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo);  
  } 

  public function CalcularAluguelCasaPraia($numdias) : float{

    if ($this->getOcupantes() <= 4){

      return parent::CalcularAluguel($numdias) + 200;

    } else{

      return parent::CalcularAluguel($numdias) + (100 * $this->getOcupantes());
    }
  }

  public function ImprimeImovel(){

    $data1 = new DateTime( $_GET["checkin"] );
    $data2 = new DateTime( $_GET["checkout"] );

    $intervalo = $data1->diff( $data2 );

    parent::ImprimeImovel();

 
    if ($this->getOcupantes() <= 4){

      print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguelCasaPraia($intervalo->d) . "<br>";
    }else{

      print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguelCasaPraia($intervalo->d) . ' **Acréscimo OCUPANTES' . "<br>";
    }
    
  } 
}

class CasaCampo extends Imovel
{

  public function __construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo)
  {
    parent::__construct($endereco, $cidade, $diaria, $quartos, $piscina, $ocupantes, $tipo);  
  } 


  public function ImprimeImovel(){

    $data1 = new DateTime( $_GET["checkin"] );
    $data2 = new DateTime( $_GET["checkout"] );

    $intervalo = $data1->diff( $data2 );

    parent::ImprimeImovel();
    print 'Valor Aluguel: ' .'R$ ' . $this->CalcularAluguel($intervalo->d) . "<br>";
  } 
}


?>

  </head>
  <body>
    <div id="fh5co-wrapper">
    <div id="fh5co-page">

    <header id="fh5co-header-section" class="sticky-banner">
      <div class="container">
        <div class="nav-header">
          <a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
          <h1 id="fh5co-logo"><a href="index.php"><i class="icon-airplane"></i>Site Aluguel por Temporada</a></h1>
          <!-- START #fh5co-menu-wrap -->
          <nav id="fh5co-menu-wrap" role="navigation">
            <ul class="sf-menu" id="fh5co-primary-menu">
          </nav>
        </div>
      </div>
    </header>

    <!-- end:header-top -->
  
    
    

    <div id="fh5co-tours" class="fh5co-section-gray">
      <div class="container">
        <div class="row">
          <div class="col-md-12 animate-box">
            <h2 class="heading-title">Reserva</h2>
          </div>

          <div class="col-md-6 animate-box">
            <p>
              <?php

              if(isset($_GET["NewYork"])){
                  $imovel[0]->ImprimeImovel();
              }else if(isset($_GET["Philippines"])){
                  $imovel[1]->ImprimeImovel();
              } else if(isset($_GET["Salvador"])){
                  $imovel[2]->ImprimeImovel();
              } else if(isset($_GET["SãoJose"])){
                  $imovel[3]->ImprimeImovel();
              } else if(isset($_GET["Floripa"])){
                  $imovel[4]->ImprimeImovel();
              } else if(isset($_GET["HongKong"])){
                  $imovel[5]->ImprimeImovel();
              } else if(isset($_GET["Recife"])){
                  $imovel[6]->ImprimeImovel();
              }

              ?>   
            </p>

            <a href="Final.php">Concluir Reserva <i class="icon-arrow-right22"></i></a>
          </div>

          <div class="col-md-6 animate-box">
            <img id = "carregarimg" class="img-responsive"
             <?php

              if(isset($_GET["NewYork"])){
                  echo 'src="images/newyork.jpg"';
              }else if(isset($_GET["Philippines"])){
                  echo 'src="images/philippines.jpg"';
              } else if(isset($_GET["Salvador"])){
                  echo 'src="images/salvador.jpg"';
              } else if(isset($_GET["SãoJose"])){
                  echo 'src="images/saojose.jpg"';
              } else if(isset($_GET["Floripa"])){
                  echo 'src="images/floripa.jpg"';
              } else if(isset($_GET["HongKong"])){
                  echo 'src="images/hongkong.jpg"';
              } else if(isset($_GET["Recife"])){
                  echo 'src="images/recife.jpg"';
              }

              ?>   
            alt="travel" style="height: 307px">
          </div>
        </div>
      </div>
    </div>
    
  </div>
    <footer>
      <div id="footer">

          <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center">
              <p class="fh5co-social-icons">
                <a href="#"><i class="icon-twitter2"></i></a>
                <a href="#"><i class="icon-facebook2"></i></a>
                <a href="#"><i class="icon-instagram"></i></a>
                <a href="#"><i class="icon-dribbble2"></i></a>
                <a href="#"><i class="icon-youtube"></i></a>
              </p>
              <p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

  

  </div>
  <!-- END fh5co-page -->

  </div>
  <!-- END fh5co-wrapper -->

  <!-- jQuery -->


  <script src="js/jquery.min.js"></script>
  <!-- jQuery Easing -->
  <script src="js/jquery.easing.1.3.js"></script>
  <!-- Bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Waypoints -->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/sticky.js"></script>

  <!-- Stellar -->
  <script src="js/jquery.stellar.min.js"></script>
  <!-- Superfish -->
  <script src="js/hoverIntent.js"></script>
  <script src="js/superfish.js"></script>
  <!-- Magnific Popup -->
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/magnific-popup-options.js"></script>
  <!-- Date Picker -->
  <script src="js/bootstrap-datepicker.min.js"></script>
  <!-- CS Select -->
  <script src="js/classie.js"></script>
  <script src="js/selectFx.js"></script>
  
  <!-- Main JS -->
  <script src="js/main.js"></script>

  </body>
</html>



