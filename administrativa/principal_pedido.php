<?php
session_start();

if(!isset($_SESSION["idadmin"])){
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

    <style>
        .btn1 {
            border-radius: 20px;
            background-color: #007bff;
            border: none;
            color: white;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }
    </style>
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
            </li>
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
                    <h2 class="heading-section mt-4 mb-3" style="font-weight: bold; color: #082B49;"> Cadastro de Pedidos </h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table" style="margin-left: 170px;">
                            <div class='text-center mb-3'>
                                <a class="btn btn1 border border-dark border-opacity-25" href="principal_pedido.php?status=1">Aprovados</a>
                                <a class="btn btn1 mx-3 border border-dark border-opacity-25" href="principal_pedido.php?status=2">Em Vereficação</a>
                                <a class="btn btn1 border border-dark border-opacity-25" href="principal_pedido.php?status=3">Reprovados</a>

                                <h5 class="text-end">
                                    <?php
                                    if (isset($_GET['status']) && !empty($_GET['status']) && $_GET['status'] > 0 && $_GET['status'] < 4) {

                                        $i = $_GET['status'];

                                        if ($i == 1) {
                                            echo "Versão: <strong><u>Aprovados</u></strong>";
                                        } else if ($i == 2) {
                                            echo "Versão: <strong><u>Em Verificação</u></strong>";
                                        } else if ($i == 3) {
                                            echo "Versão: <strong><u>Reprovados</u></strong>";
                                        } else {
                                            echo "Versão: <strong><u>Em Verificação</u></strong>";
                                        }
                                    } else {
                                        echo "Versão: <strong><u>Em Verificação</u></strong>";
                                    }
                                    ?>
                                </h5>
                            </div>
                            <thead class="thead-primary">
                            <tbody>
                                <tr>
                                    <th scope="col"> Nome </th>
                                    <th scope="col"> Experiências Anteriores </th>
                                    <th scope="col"> Celular </th>
                                    <th scope="col"> Motivação </th>
                                    <th scope="col"> Animal </th>
                                    <th scope="col"> Status </th>
                                    <th scope="col"> </th>
                                </tr>
                                <?php
                                if (isset($_GET['status']) && !empty($_GET['status']) && $_GET['status'] > 0 && $_GET['status'] < 4) {

                                    $status = $_GET['status'];

                                    if ($status == 1) {
                                        $sql = "SELECT
                                                pedido_adocao.*, 
                                                animal.*, 
                                                usuario.*, 
                                                animal.nome AS nome_animal, 
                                                usuario.nome AS nome_usuario
                                                FROM 
                                                pedido_adocao
                                                JOIN 
                                                animal ON pedido_adocao.animal_idanimal = animal.idanimal
                                                JOIN 
                                                usuario ON pedido_adocao.usuarios_idusuarios = usuario.idusuarios WHERE status_pedido = 'Aprovado'
                                                ORDER BY 
                                                pedido_adocao.idpedido_adocao DESC;";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($lista = mysqli_fetch_assoc($result)) { ?>
                                                <tr class=''>
                                                    <td class='text-capitalize'><?php echo $lista["nome_usuario"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["experienciasantigas"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["celular"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["motivacao"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["nome_animal"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["status_pedido"]; ?></td>
                                                </tr>

                                        <?php   }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>Não a nenhum pedido em aprovação !</td></tr>";
                                        } ?>
                                        <?php  } else 
                                    if ($status == 2) {
                                        $sql = "SELECT
                                                pedido_adocao.*, 
                                                animal.*, 
                                                usuario.*, 
                                                animal.nome AS nome_animal, 
                                                usuario.nome AS nome_usuario
                                                FROM 
                                                pedido_adocao
                                                JOIN 
                                                animal ON pedido_adocao.animal_idanimal = animal.idanimal
                                                JOIN 
                                                usuario ON pedido_adocao.usuarios_idusuarios = usuario.idusuarios WHERE status_pedido = 'Em Verificação'
                                                ORDER BY 
                                                pedido_adocao.idpedido_adocao DESC;";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($lista = mysqli_fetch_assoc($result)) { ?>
                                                <tr class=''>
                                                    <td class='text-capitalize'><?php echo $lista["nome_usuario"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["experienciasantigas"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["celular"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["motivacao"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["nome_animal"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["status_pedido"]; ?></td>

                                                    <td class='text-center'>
                                                        <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Aprovado' class='btn border border-success border-opacity-25'>
                                                            <img src='img/aprovado.png' alt='Aprovado' width='40' height='40'>
                                                            Aprovado
                                                        </a>
                                                        <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Reprovado' class='btn border border-danger border-opacity-25'>
                                                            <img src='img/reprovado.png' alt='Reprovado' width='40' height='40'>
                                                            Reprovado
                                                        </a>
                                                    </td>
                                                </tr>

                                        <?php   }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>Não a nenhum pedido em verificação !</td></tr>";
                                        } ?>
                                        <?php
                                    } else if ($status == 3) {
                                        $sql = "SELECT
                                        pedido_adocao.*, 
                                        animal.*, 
                                        usuario.*, 
                                        animal.nome AS nome_animal, 
                                        usuario.nome AS nome_usuario
                                        FROM 
                                        pedido_adocao
                                        JOIN 
                                        animal ON pedido_adocao.animal_idanimal = animal.idanimal
                                        JOIN 
                                        usuario ON pedido_adocao.usuarios_idusuarios = usuario.idusuarios WHERE status_pedido = 'Reprovado'
                                        ORDER BY 
                                        pedido_adocao.idpedido_adocao DESC;";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($lista = mysqli_fetch_assoc($result)) { ?>
                                                <tr class=''>
                                                    <td class='text-capitalize'><?php echo $lista["nome_usuario"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["experienciasantigas"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["celular"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["motivacao"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["nome_animal"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["status_pedido"]; ?></td>
                                                </tr>

                                        <?php   }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>Não a nenhum pedido em reprovação !</td></tr>";
                                        } ?>
                                        <?php
                                    } else {
                                        $sql = "SELECT
                                                pedido_adocao.*, 
                                                animal.*, 
                                                usuario.*, 
                                                animal.nome AS nome_animal, 
                                                usuario.nome AS nome_usuario
                                                FROM 
                                                pedido_adocao
                                                JOIN 
                                                animal ON pedido_adocao.animal_idanimal = animal.idanimal
                                                JOIN 
                                                usuario ON pedido_adocao.usuarios_idusuarios = usuario.idusuarios WHERE status_pedido = 'Em Verificação'
                                                ORDER BY 
                                                pedido_adocao.idpedido_adocao DESC;";

                                        $result = mysqli_query($conn, $sql);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($lista = mysqli_fetch_assoc($result)) { ?>
                                                <tr class=''>
                                                    <td class='text-capitalize'><?php echo $lista["nome_usuario"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["experienciasantigas"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["celular"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["motivacao"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["nome_animal"]; ?></td>
                                                    <td class='text-capitalize'><?php echo $lista["status_pedido"]; ?></td>

                                                    <td class='text-center'>
                                                        <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Aprovado' class='btn border border-success border-opacity-25'>
                                                            <img src='img/aprovado.png' alt='Aprovado' width='40' height='40'>
                                                            Aprovado
                                                        </a>
                                                        <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Reprovado' class='btn border border-danger border-opacity-25'>
                                                            <img src='img/reprovado.png' alt='Reprovado' width='40' height='40'>
                                                            Reprovado
                                                        </a>
                                                    </td>
                                                </tr>

                                        <?php   }
                                        } else {
                                            echo "<tr><td colspan='7' class='text-center'>Não a nenhum pedido em verificação !</td></tr>";
                                        } ?>
                                        <?php

                                    }
                                } else {
                                    $sql = "SELECT
                                                pedido_adocao.*, 
                                                animal.*, 
                                                usuario.*, 
                                                animal.nome AS nome_animal, 
                                                usuario.nome AS nome_usuario
                                                FROM 
                                                pedido_adocao
                                                JOIN 
                                                animal ON pedido_adocao.animal_idanimal = animal.idanimal
                                                JOIN 
                                                usuario ON pedido_adocao.usuarios_idusuarios = usuario.idusuarios WHERE status_pedido = 'Em Verificação'
                                                ORDER BY 
                                                pedido_adocao.idpedido_adocao  DESC;";

                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($lista = mysqli_fetch_assoc($result)) { ?>
                                            <tr class=''>
                                                <td class='text-capitalize'><?php echo $lista["nome_usuario"]; ?></td>
                                                <td class='text-capitalize'><?php echo $lista["experienciasantigas"]; ?></td>
                                                <td class='text-capitalize'><?php echo $lista["celular"]; ?></td>
                                                <td class='text-capitalize'><?php echo $lista["motivacao"]; ?></td>
                                                <td class='text-capitalize'><?php echo $lista["nome_animal"]; ?></td>
                                                <td class='text-capitalize'><?php echo $lista["status_pedido"]; ?></td>

                                                <td class='text-center'>
                                                    <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Aprovado' class='btn border border-success border-opacity-25'>
                                                        <img src='img/aprovado.png' alt='Aprovado' width='40' height='40'>
                                                        Aprovado
                                                    </a>
                                                    <a href='excluir_pedido.php?id=<?php echo $lista["idusuarios"]; ?>&status=Reprovado' class='btn border border-danger border-opacity-25'>
                                                        <img src='img/reprovado.png' alt='Reprovado' width='40' height='40'>
                                                        Reprovado
                                                    </a>
                                                </td>
                                            </tr>

                                    <?php   }
                                    } else {
                                        echo "<tr><td colspan='7' class='text-center'>Não a nenhum pedido em verificação !</td></tr>";
                                    } ?>
                                <?php

                                } ?>

                            </tbody>
                        </table>

                        <div class="modal fade" id="modal_pedido" tabindex="-1" aria-labelledby="modal_pedido" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">

                                <div class="modal-content border border-dark border-2">
                                    <div class="modal-header border-bottom border-dark bg-primary-subtle">
                                        <h1 class="modal-title fs-5" id="modal_raca"> Cadastrando Pedidos </h1>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cadastrar_pedido.php" method="POST">
                                            <div class="row">

                                                <div class="col">
                                                    <label for="" class="text-dark ms-2"><strong> animal_idanimal </strong></label>
                                                    <select name="animal_idanimal" id="animal_idanimal" class="form-select" aria-label="Default select example">

                                                        <?php

                                                        $sql2 = "SELECT * FROM animal";
                                                        $result2 = mysqli_query($conn, $sql2);

                                                        if (mysqli_num_rows($result2) > 0) {
                                                            while ($lista2 = mysqli_fetch_assoc($result2)) {


                                                        ?>
                                                                <option value="<?php echo $lista2["idanimal"]; ?>"><?php echo $lista2["cor_pelo"]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                    <label for="" class="text-dark ms-2"><strong> status_pedido </strong></label>
                                                    <input type="text" name="status_pedido" id="status_pedido" class="form-control border border-dark" required placeholder="Insira o id do pedido">
                                                    <label for="" class="text-dark ms-2"><strong> usuarios_idusuarios </strong></label>
                                                    <select name="usuarios_idusuarios" id="usuarios_idusuarios" class="form-select" aria-label="Default select example">

                                                        <?php

                                                        $sql3 = "SELECT * FROM usuario";
                                                        $result3 = mysqli_query($conn, $sql3);

                                                        if (mysqli_num_rows($result3) > 0) {
                                                            while ($lista3 = mysqli_fetch_assoc($result3)) {


                                                        ?>
                                                                <option value="<?php echo $lista3["idusuarios"]; ?>"><?php echo $lista3["nome"]; ?></option>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a type="button" class="btn bg-secondary-subtle border border-dark" data-bs-dismiss="modal"> Fechar </a>
                                        <button type="submit" class="btn border border-dark bg-primary-subtle"> Adicionar </button>
                                    </div>
                                </div>

                            </div>
                            </form>
                        </div>
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
<?php

if (!isset($_GET['alert'])) {
} else if ($_GET['alert'] == 1) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Status Modificado.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_pedido.php";

        });
    </script>

<?php } ?>

</html>