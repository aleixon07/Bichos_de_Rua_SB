<?php
session_start();

if (!isset($_SESSION["idadmin"])) {
    header("Location: login.php");
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title> Bichos de rua-sb </title>
    <link rel="icon" href="img/logo .png" type="image/png">
    <link rel="stylesheet" href="css/bootstrap1.min.css" />
    <link rel="stylesheet" href="vendors/themefy_icon/themify-icons.css" />
    <link rel="stylesheet" href="vendors/swiper_slider/css/swiper.min.css" />
    <link rel="stylesheet" href="vendors/select2/css/select2.min.css" />
    <link rel="stylesheet" href="vendors/niceselect/css/nice-select.css" />
    <link rel="stylesheet" href="vendors/owl_carousel/css/owl.carousel.css" />
    <link rel="stylesheet" href="vendors/gijgo/gijgo.min.css" />
    <link rel="stylesheet" href="vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="vendors/tagsinput/tagsinput.css" />
    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/text_editor/summernote-bs4.css" />
    <link rel="stylesheet" href="vendors/morris/morris.css">
    <link rel="stylesheet" href="vendors/material_icon/material-icons.css" />
    <link rel="stylesheet" href="css/metisMenu.css">
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


<body class="crm_body_bg">
    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="principal.php"><img src="img/logo .png" alt class="rounded-circle"></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">


            <li class="side_menu_title">
                <span> Cadastros </span>
            </li>
            <li class>
                <a class="has-arrow" href="principal_animal.php" aria-expanded="false">
                    <img src="img/pata.png" alt="" width="20" height="20">
                    <span> Animais </span>
                </a>
            </li>
            <li class>
                <a class="has-arrow" href="principal_raca.php" aria-expanded="false">
                    <img src="img/pata.png" alt="" width="20" height="20">
                    <span> Raça </span>

                </a>
            <li class>
                <a class="has-arrow" href="principal_imagem.php" aria-expanded="false">
                    <img src="img/pata.png" alt="" width="20" height="20">
                    <span> Imagem </span>

                </a>
            </li>
            <li class>
                <a class="has-arrow" href="principal_adm.php" aria-expanded="false">
                    <img src="img/admin.png" alt="" width="20" height="20">
                    <span> Administrador </span>
                </a>
            </li>

            </li>
            <li class="side_menu_title">
                <span> Pedido de Adoção </span>
            </li>
            <li class>
                <a class="has-arrow" href="principal_pedido.php" aria-expanded="false">
                    <img src="img/forma.png" alt="" width="20" height="20">
                    <span> Pedidos </span>
                </a>
            </li>
            <li class>
                <a class="has-arrow" href="principal_usuario.php" aria-expanded="false">
                    <img src="img/usuarios.png" alt="" width="20" height="20">
                    <span> Usuários </span>
                </a>
            <li class="side_menu_title">
                <span> Opções </span>
            </li>
            <li class>
                <a class="has-arrow" href="logout.php" aria-expanded="false">
                    <img src="img/forma.png" alt="" width="20" height="20">
                    <span> Sair </span>
                </a>
            </li>
    </nav>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section mt-4 mb-3" style="font-weight: bold; color: #082B49;"> Cadastro de Usuários </h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table" style="margin-left: 170px;">
                            <thead class="thead-primary">
                            <tbody>
                                <tr>
                                    <th scope="col"> Nome </th>
                                    <th scope="col"> Experiencias Antigas </th>
                                    <th scope="col"> Profissão </th>
                                    <th scope="col"> Celular </th>
                                    <th scope="col"> Motivação </th>
                                    <th scope="col"> </th>
                                </tr>
                                <?php
                                $sql = "SELECT * FROM usuario";
                                $result = $conn->query($sql);

                                if ($result === false) {
                                    die("Erro na consulta SQL: " . $conn->error);
                                }

                                if ($result->num_rows > 0) {
                                    while ($lista = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $lista["nome"] . "</td>";
                                        echo "<td>" . $lista["experienciasantigas"] . "</td>";
                                        echo "<td>" . $lista["profissao"] . "</td>";
                                        echo "<td>" . $lista["celular"] . "</td>";
                                        echo "<td>" . $lista["motivacao"] . "</td>";
                                    }
                                } else {
                                    echo "<tr><td colspan='6'>Nenhum registro encontrado.</td></tr>";
                                }
                                ?>
                                </td>
                                </tr>

                                <div class="modal fade" id="modal_pedidoadocao" tabindex="-1" aria-labelledby="modal_pedidoadocao" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">

                                        <div class="modal-content border border-dark border-2">
                                            <div class="modal-header border-bottom border-dark bg-primary-subtle">
                                                <h1 class="modal-title fs-5" id="modal_pedidoadocao"> Cadastrando Usuário </h1>
                                            </div>
                                            <div class="modal-body">
                                                <form action="cadastrar_usuario.php" method="POST">
                                                    <label for="" class="text-dark ms-2"><strong> Nome </strong></label>
                                                    <input type="text" name="nome" id="nome" class="form-control border-dark border" id="floatingInput" required placeholder="Insira o nome da raça">
                                                    <label for="" class="text-dark ms-2"><strong> Experiências Antigas </strong></label>
                                                    <input type="text" name="exprienciasantigas" id="experienciasantigas" class="form-control border-dark border" id="floatingInput" required placeholder="Insira aqui suas experiências antigas com animal de estimação">
                                                    <label for="" class="text-dark ms-2"><strong> Profissão </strong></label>
                                                    <input type="text" name="profissao" id="profissao" class="form-control border-dark border" id="floatingInput" required placeholder="Insira aqui sua profissão aqui">
                                                    <label for="" class="text-dark ms-2"><strong> Número </strong></label>
                                                    <input type="text" name="celular" id="celular" class="form-control border-dark border" id="floatingInput" required placeholder="Insira aqui seu número de celular">
                                                    <label for="" class="text-dark ms-2"><strong> Motivação </strong></label>
                                                    <input type="text" name="motivacao" id="motivacao" class="form-control border-dark border" id="floatingInput" required placeholder="Insira aqui sua motivação para adotar">
                                            </div>
                                            <div class="modal-footer">
                                                <div>
                                                    <a type="button" class="btn bg-secondary-subtle border border-dark" data-bs-dismiss="modal"> Fechar </a>
                                                    <button type="submit" class="btn border border-dark bg-primary-subtle"> Adicionar </button>
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>

                    </div>


                    <div>
                        <script src="js/jquery1-3.4.1.min.js"></script>
                        <script src="js/popper1.min.js"></script>
                        <script src="js/bootstrap1.min.js"></script>
                        <script src="js/metisMenu.js"></script>
                        <script src="vendors/count_up/jquery.waypoints.min.js"></script>
                        <script src="vendors/chartlist/Chart.min.js"></script>
                        <script src="vendors/count_up/jquery.counterup.min.js"></script>
                        <script src="vendors/swiper_slider/js/swiper.min.js"></script>
                        <script src="vendors/niceselect/js/jquery.nice-select.min.js"></script>
                        <script src="vendors/owl_carousel/js/owl.carousel.min.js"></script>
                        <script src="vendors/gijgo/gijgo.min.js"></script>
                        <script src="vendors/datatable/js/jquery.dataTables.min.js"></script>
                        <script src="vendors/datatable/js/dataTables.responsive.min.js"></script>
                        <script src="vendors/datatable/js/dataTables.buttons.min.js"></script>
                        <script src="vendors/datatable/js/buttons.flash.min.js"></script>
                        <script src="vendors/datatable/js/jszip.min.js"></script>
                        <script src="vendors/datatable/js/pdfmake.min.js"></script>
                        <script src="vendors/datatable/js/vfs_fonts.js"></script>
                        <script src="vendors/datatable/js/buttons.html5.min.js"></script>
                        <script src="vendors/datatable/js/buttons.print.min.js"></script>
                        <script src="js/chart.min.js"></script>
                        <script src="vendors/progressbar/jquery.barfiller.js"></script>
                        <script src="vendors/tagsinput/tagsinput.js"></script>
                        <script src="vendors/text_editor/summernote-bs4.js"></script>
                        <script src="vendors/apex_chart/apexcharts.js"></script>
                        <script src="js/custom.js"></script>
                        <script src="vendors/apex_chart/bar_active_1.js"></script>
                        <script src="vendors/apex_chart/apex_chart_list.js"></script>
                    </div>
</body>


</html>