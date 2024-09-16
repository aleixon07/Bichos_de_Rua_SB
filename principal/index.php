<!doctype html>
<html lang="en">
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Bichos de rua-sb </title>
  <link rel="" href="">
  <link rel="icon" href="img/logo .png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .coluna {
      float: left;
      width: 33.33%;
    }

    .row::after {
      content: "";
      clear: both;
      display: table;
    }

    .carousel-control-prev,
    .carousel-control-next {
      font-size: 60px;
      color: #082B49;
      margin-top: 100px;
    }

    .carousel-inner {
      display: flex;
      flex-wrap: wrap;
    }

    .carousel-item {
      width: 33.33%;
      padding: 15px;
      text-align: center;
    }

    .carousel-item img {
      max-width: 100%;
      height: 200px;
      object-fit: cover;
      border-radius: 50%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }
  </style>


  <link rel="stylesheet" href="css/bootstrap.min.css">

  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/themify-icons.css">

  <link rel="stylesheet" href="css/flaticon.css">

  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/style.css">



  <script nonce="4938722d-cac2-4891-964d-5eb400e9cd95">
    (function(w, d) {
      ! function(dK, dL, dM, dN) {
        dK[dM] = dK[dM] || {};
        dK[dM].executed = [];
        dK.zaraz = {
          deferred: [],
          listeners: []
        };
        dK.zaraz.q = [];
        dK.zaraz._f = function(dO) {
          return function() {
            var dP = Array.prototype.slice.call(arguments);
            dK.zaraz.q.push({
              m: dO,
              a: dP
            })
          }
        };
        for (const dQ of ["track", "set", "debug"]) dK.zaraz[dQ] = dK.zaraz._f(dQ);
        dK.zaraz.init = () => {
          var dR = dL.getElementsByTagName(dN)[0],
            dS = dL.createElement(dN),
            dT = dL.getElementsByTagName("title")[0];
          dT && (dK[dM].t = dL.getElementsByTagName("title")[0].text);
          dK[dM].x = Math.random();
          dK[dM].w = dK.screen.width;
          dK[dM].h = dK.screen.height;
          dK[dM].j = dK.innerHeight;
          dK[dM].e = dK.innerWidth;
          dK[dM].l = dK.location.href;
          dK[dM].r = dL.referrer;
          dK[dM].k = dK.screen.colorDepth;
          dK[dM].n = dL.characterSet;
          dK[dM].o = (new Date).getTimezoneOffset();
          if (dK.dataLayer)
            for (const dX of Object.entries(Object.entries(dataLayer).reduce(((dY, dZ) =>
                ({
                  ...dY[1],
                  ...dZ[1]
                })), {}))) zaraz.set(dX[0], dX[1], {
              scope: "page"
            });
          dK[dM].q = [];
          for (; dK.zaraz.q.length;) {
            const d_ = dK.zaraz.q.shift();
            dK[dM].q.push(d_)
          }
          dS.defer = !0;
          for (const ea of [localStorage, sessionStorage]) Object.keys(ea || {}).filter((ec => ec.startsWith("zaraz"))).forEach((eb => {
            try {
              dK[dM]["z_" + eb.slice(7)] =
                JSON.parse(ea.getItem(eb))
            } catch {
              dK[dM]["z_" + eb.slice(7)] = ea.getItem(eb)
            }
          }));
          dS.referrerPolicy = "origin";
          dS.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(dK[dM])));
          dR.parentNode.insertBefore(dS, dR)
        };
        ["complete", "interactive"].includes(dL.readyState) ? zaraz.init() : dK.addEventListener("DOMContentLoaded", zaraz.init)
      }(w, d, "zarazData", "script");
    })(window, document);
  </script>
</head>

<body>

  <header class="header_area">


    <div class="main_menu">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg navbar-light">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="ti-menu"></i>
              </button>
              <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                  <li class="nav-item active">
                    <a class="nav-link "> <img src="img/logo2.png" width="30px" height="30px"> </a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link active" href="index.php" style="margin-top:8px"> Home </a>
                  </li>
                  <li class="nav-item">
                    <a href="#adotar" class="nav-link" style="margin-top:8px"> Quero adotar </a>
                  </li>
                  <li class="nav-item">
                    <a href="doacoes.php" class="nav-link" style="margin-top:8px"> Doações </a>
                  </li>
                  <li class="nav-item">
                    <a href="contato.php" class="nav-link" style="margin-top:8px"> Contato </a>

                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>


  <section class="banner_part">
    <div class="container">
      <div class="row align-content-center">
        <div class="col-lg-7 col-xl-12">
          <div class="banner_text">
            <h1 style="color:blanchedalmond;font-size: 45px; text-align:justify; text-transform: none"> Um gesto de amor, uma vida resgatada: Bichos de Rua-SB, unindo corações peludos a lares amorosos! </h1>

          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="about_part section_padding">
    <div class="container">
      <div class="row align-items-center justify-content-between">
        <div class="col-md-6">
          <div class="about_img">
            <img src="img/voluntarias.png" alt="">
          </div>
        </div>
        <div class="col-md-5">
          <div class="about_text">
            <img src="img/about_icon.png" class="about_icon" alt="">
            <h2> Sobre nossa história </h2>
            <p style="text-align: justify; font-family: OCR A Std, cursive;"> A ONG Bichos de Rua-sb é uma organização sem fins lucrativos que se dedica ao resgate de animais em
              situação de maus-tratos e abandono, visando oferecer-lhes uma segunda chance através da adoção
              responsável. A iniciativa foi fundada em março de 2019 e, desde então, tem trabalhado incansavelmente para
              melhorar a vida desses animais desamparados. A equipe da ONG Bichos de Rua-sb é composta por dez pessoas
              dedicadas, todas atuando como voluntárias.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="adotar">
    <section class="service_part section_padding services_bg">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section_tittle text-center">
              <img src="img/about_icon.png" alt="">
              <h2> Animais disponíveis para adoção </h2>
              <p style="text-align: center; font-family: OCR A Std, cursive;"> Em nosso site, você terá a oportunidade de encontrar o seu novo melhor amigo de quatro patas.
                Conheça nossos peludinhos que estão a procura de um lar amoroso, cada um com uma história única e um coração cheio de amor
                para compartilhar. </p>
            </div>
          </div>
        </div>

        <body>
          <div id="carouselExampleAutoplaying" class="carousel w-100 carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <?php
              $sql2 = "SELECT * FROM imagem";
              $result2 = mysqli_query($conn, $sql2);
              $photoCount = 0;

              while ($row = mysqli_fetch_assoc($result2)) {
                if ($photoCount % 3 == 0) {
                  $carouselItemClass = $photoCount === 0 ? "carousel-item active" : "carousel-item";
                  echo '<div class="carousel-item ' . $carouselItemClass . '">';
                }

                $fotos = $row["nomeimagem"];
                $idanimal = $row["animal_idanimal"];
              ?>
                <div class="coluna" class="col-md-12">
                  <center><img src="<?php echo '../administrativa/uploads/' . $fotos; ?>" width="240px" height="200px" class=" rounded-circle" alt="...">
                    <br><br><br><br>
                    <a href="adotar.php?idanimal=<?php echo $idanimal; ?>" class="btn_1"> Adote-me </a>
                  </center>
                </div>
              <?php
                if ($photoCount % 3 == 2) {
                  echo '</div>';
                }

                $photoCount++;
              }

              if ($photoCount % 3 != 0) {
                echo '</div>';
              }
              ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>






      </div>
    </section>


    <section class="abopt_number_counter section_padding">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-lg-5 col-md-6">
            <div class="counter_text">
              <h2> Adoções e Resgates </h2>
              <p> Abaixo temos uma breve contagem de animais que foram adotados e resgatados pela ONG.</p>
              <div class="counter_number">
                <div class="single_counter_number">
                  <img src="img/adotados.png" alt="#">
                  <?php
                  $cont = "SELECT COUNT(*) AS numero_de_linhas_animal_adot FROM animal WHERE oculta = 1;";
                  $result_cont = mysqli_query($conn,$cont);
                  $row_cont1 = mysqli_fetch_assoc($result_cont);
                  $a = $row_cont1['numero_de_linhas_animal_adot'];

                  $cont1 = "SELECT COUNT(*) AS numero_de_linhas_animal_adot FROM animal";
                  $result_cont1 = mysqli_query($conn,$cont1);
                  $row_cont11 = mysqli_fetch_assoc($result_cont1);
                  $b = $row_cont11['numero_de_linhas_animal_adot'];
                
                  ?>
                  <h3><span class="count"><?php echo $a; ?></span></h3>
                  <p> Animais adotados </p>
                </div>
                <div class="single_counter_number">
                  <img src="img/cachorro.png" alt="#">
                  <h5><span class="count"><?php echo $b; ?></span></h5>
                  <p> Resgatados </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="adopt_image">
              <img src="img/animal.jpeg" alt="#" width="400" height="300">
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer_area padding_top">
      <div class="container">
        <div class="row justify-content-center ">
          <div class="col-lg-8 col-xl-6">

          </div>
        </div>
        <div class="row justify-content-between section_padding">
          <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
            <h4> Menu </h4>
            <ul>
              <li><a href="#"> Home </a></li>
              <li><a href="#"> Sobre a ONG </a></li>
              <li><a href="#"> Contato </a></li>
            </ul>
          </div>
          <div class="col-xl-2 col-sm-6 col-md-3 mb-4 mb-xl-0 single-footer-widget">
            <h4> Como Ajudar? </h4>
            <ul>
              <li><a href="#"> Quero adotar </a></li>
              <li><a href="#"> Doações </a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="copyright_text">
              <img src="img/logo2.png" width="80px" height="80px" alt="#">
            </div>
          </div>
        </div>
      </div>
    </footer>



    <script src="js/jquery-1.12.1.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.counterup.min.js"></script>

    <script src="js/waypoints.min.js"></script>

    <script src="js/jquery.magnific-popup.js"></script>

    <script src="js/owl.carousel.min.js"></script>

    <script src="js/custom.js"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>

    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816" integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw==" data-cf-beacon='{"rayId":"7ddfd6d4edab034f","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

</html>