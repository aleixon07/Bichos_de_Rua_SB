<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$idanimal = $_GET['idanimal'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $_SESSION["sucesso_adocao"] = true;

  header("Location: " . $_SERVER['REQUEST_URI']);
  exit();
}

if (isset($_GET["idanimal"]) && !empty($_GET["idanimal"])) {

  $id_g = $_GET["idanimal"];

  $sql_g = "SELECT * FROM animal WHERE idanimal = '$id_g'";
  $result_g = mysqli_query($conn, $sql_g);

  if (mysqli_num_rows($result_g) == 0) {
    header("Location: index.php");
    exit();
  }

} else {
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Bichos de Rua-SB</title>
  <link rel="icon" href="img/logo .png">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link flex href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/themify-icons.css">
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    margin: 0;
    padding: 0;
    color: #333;
  }

  .container {
    width: 80%;
    margin: auto;
    overflow: hidden;
  }

  .animal-info {
    margin-left: 40px;
  }

  .card {
    background: white;
    margin: 0px 0;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
  }

  .card img {
    width: 100%;
    max-width: 300px;
    border-radius: 15px;
  }


  .card h2 {
    margin: 0 0 10px 0;
    padding: 0;
    color: #50b3a2;
  }

  .card p {
    margin: 0;
    padding: 0;
  }

  .adoption-form input,
  .adoption-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  .adoption-form button {
    background-color: #50b3a2;
    color: white;
    border: none;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 2px;
    cursor: pointer;
    border-radius: 5px;
  }

  h2.text-center {
    font-size: 40px;
    color: #082B49;
  }


  .adoption-form h2 {
    font-size: 24px;
    color: #082B49;
  }

  .btn.btn-primary {
    background-color: #082B49;
    color: #fff;
    border: none;
  }
</style>
</head>





<body>
  <header class="header_area">


    <div class="main_menu">
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
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    </div>
  </header>

  <?php
  $sql2 = "SELECT * FROM animal
        INNER JOIN imagem
        on imagem.animal_idanimal = animal.idanimal where idanimal = '$idanimal' LIMIT 1";
  $result2 = mysqli_query($conn, $sql2);
  $photoCount = 0;

  $row = mysqli_fetch_assoc($result2);

  $fotos = $row["nome"];
  $idade = $row["idade"];
  $sexo = $row["sexo"];
  $cor_pelo = $row["cor_pelo"];
  $tamanho = $row["tamanho"];
  $vermifugacao = $row["vermifugacao"];
  $vacinas = $row["vacinas"];
  $nomeimagem = $row["nomeimagem"];
  ?>

  <section>
    <div class="card">
      <h2 class="text-center" style="margin-left: 0px; margin-right: 20px;"><?php echo $fotos; ?></h2>
      <div class="d-flex justify-content-center align-items-center">
        <div class="animal-info">
          <img src="<?php echo "../administrativa/uploads/" . $nomeimagem; ?>" alt="Imagem do Animal" style="display: block; width: 300px; height: auto;">
        </div>
        <div class="animal-info ml-4">
          <p>
            Idade: <?php echo $idade; ?> <br>
            Sexo: <?php echo $sexo; ?> <br>
            Cor do Pelo: <?php echo $cor_pelo; ?> <br>
            Tamanho: <?php echo $tamanho; ?> <br>
            Vermifugado(a): <?php echo $vermifugacao; ?> <br>
            Vacinas: <?php echo $vacinas; ?> <br>
          </p>
        </div>
      </div>
      <br>
      <br>

      <div class="card mx-auto" style="width: 400px; margin-top: auto; margin-bottom: auto; border-radius: 20px;">
        <div class="adoption-form text-center mx-auto" style="width: 300px;">
          <h2>Formulário de Adoção da(o) <?php echo $fotos; ?></h2>

          <form action="processa_formulario.php" method="POST">
            <input type="text" class="form-control" id="id_animal" name="id_animal" value="<?php echo $idanimal; ?>" hidden>
            <div class="mb-3">
              <label for="nome" class="form-label">Nome:</label>
              <input type="text" class="form-control" id="nome" name="nome" required style="border-radius: 15px;">
            </div>
            <div class="mb-3">
              <label for="celular" class="form-label">Celular:</label>
              <input type="text" class="form-control" id="celular" name="celular" required style="border-radius: 15px;">
            </div>
            <div class="mb-3">
              <label for="profissao" class="form-label">Profissão:</label>
              <input type="text" class="form-control" id="profissao" name="profissao" required style="border-radius: 15px;">
            </div>
            <div class="mb-3">
              <label for="experienciasantigas" class="form-label">Experiências antigas:</label>
              <textarea class="form-control" id="experienciasantigas" name="experienciasantigas" rows="4" required style="border-radius: 15px;"></textarea>
            </div>
            <div class="mb-3">
              <label for="motivacao" class="form-label">Motivação para querer adotar:</label>
              <textarea class="form-control" id="motivacao" name="motivacao" rows="4" required style="border-radius: 15px;"></textarea>
            </div>
           
            <div class="text-center">
              <button type="submit" class="btn btn-primary rounded-pill">Enviar</button>
            </div>
          </form>
          <br>
          <br>
          <br>

        </div>
      </div>
    </div>
    </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


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