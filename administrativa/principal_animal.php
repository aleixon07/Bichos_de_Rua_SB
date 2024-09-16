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

// Handle success message
if (isset($_SESSION['success_message'])) {
    echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function () {
                showSuccessModal("' . $_SESSION['success_message'] . '");
            });

            function showSuccessModal(message) {
                document.getElementById(\'modal_success_message\').innerHTML = message;
                var successModal = new bootstrap.Modal(document.getElementById(\'modal_success\'));
                successModal.show();
            }
          </script>';
    unset($_SESSION['success_message']); // Clear the session variable
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
    <style>
        .modal-content {
            border-radius: 20px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            background-color: #082B49;
            color: white;
            border-bottom: 1px solid #082B49;
        }

        .modal-title {
            color: white;
        }

        .form-control,
        .form-select {
            border-radius: 20px;
            border: 1px solid #082B49;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .btn {
            border-radius: 20px;
            background-color: #007bff;
            border: none;
            color: white;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .custom-modal-header {
            background-color: #1f77c3;
        }


        .custom-cadastro-animal .modal-content {
            border-radius: 20px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .custom-cadastro-animal .modal-header {
            background-color: #1f77c3 !important;


            color: white;
            border-bottom: 1px solid #1f77c3;
        }

        .custom-cadastro-animal .modal-title {
            color: white;
        }

        .custom-cadastro-animal .modal-footer .btn.custom-edit-btn {
            background-color: #082B49;
            color: white;
            border: none;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .custom-cadastro-animal .modal-footer .btn.custom-delete-btn {
            background-color: #082B49 !important;
        }

        .btn.bg-dark-subtle {
            background-color: #007bff !important;
        }

        .btn.bg-primary-subtle {
            background-color: #007bff !important;
        }

        .btn.bg-secondary-subtle {
            background-color: #007bff !important;
        }

        .btn.bg-primary-subtle {
            background-color: #007bff !important;
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
                    <h2 class="heading-section mt-4 mb-3" style="font-weight: bold; color: #082B49;"> Cadastro de Animais </h2>
                    <button style="text-decoration: none; border-radius:70px;" type="button" class="btn mb-3 mr-md-2 mb-md-0 mb-2 btn-primary btn-round" data-bs-toggle="modal" data-bs-target="#modal_animal"> Adicionar+</button>

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
                                    <th scope="col"> Idade </th>
                                    <th scope="col"> Sexo </th>
                                    <th scope="col"> Cor </th>
                                    <th scope="col"> Tamanho </th>
                                    <th scope="col"> Vermifugação </th>
                                    <th scope="col"> Vacinas </th>
                                    <th scope="col"> Castrado </th>
                                </tr>
                                <?php

                                $sql = "SELECT * FROM animal WHERE oculta is null";
                                $result = mysqli_query($conn, $sql);

                                if (mysqli_num_rows($result) > 0) {
                                    while ($lista = mysqli_fetch_assoc($result)) {
                                ?>
                                        <tr class=''>
                                            <td class='text-capitalize'><?php echo $lista["nome"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["idade"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["sexo"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["cor_pelo"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["tamanho"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["vermifugacao"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["vacinas"]; ?></td>
                                            <td class='text-capitalize'><?php echo $lista["castrado"]; ?></td>




                                            <td class='text-center'>
                                                <button class='btn border border-dark border-opacity-25 ' data-bs-toggle="modal" data-bs-target="#modal<?php echo $lista["idanimal"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                                <a href='excluir_animal.php?id=<?php echo $lista["idanimal"]; ?>' class='btn border border-dark border-opacity-25 '><i class="bi bi-trash-fill"></i></a>
                                            </td>
                                        </tr>


                                        <div class="modal fade" id="modal<?php echo $lista["idanimal"]; ?>" tabindex="-1" aria-labelledby="modal<?php echo $lista["idanimal"]; ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header border border-dark custom-modal-header">
                                                        <h5 class="modal-title" id="modal_adicionar">Editando Animal</h5>
                                                    </div>
                                                    <div class="modal-body border">
                                                        <form action="editar_animal.php" method="POST">
                                                            <label for="" class="text-dark ms-2"><strong> Nome </strong></label>
                                                            <input type="text" name="nome" id="nome" class="form-control border border-dark" value="<?php echo $lista["nome"]; ?>" required placeholder="Insira o nome">
                                                            <label for="" class="text-dark ms-2"><strong> Idade </strong></label>
                                                            <input type="text" name="idade" id="idade" class="form-control border border-dark" value="<?php echo $lista["idade"]; ?>" required placeholder="Insira o nome da raça">
                                                            <label for="" class="text-dark ms-2"><strong> Sexo </strong></label>
                                                            <input type="text" name="sexo" id="sexo" class="form-control border border-dark" value="<?php echo $lista["sexo"]; ?>" required placeholder="Insira o sexo">
                                                            <label for="" class="text-dark ms-2"><strong> Cor_pelo </strong></label>
                                                            <input type="text" name="cor_pelo" id="cor_pelo" class="form-control border border-dark" value="<?php echo $lista["cor_pelo"]; ?>" required placeholder="Insira a pelagem">
                                                            <label for="" class="text-dark ms-2"><strong> Tamanho </strong></label>
                                                            <input type="text" name="tamanho" id="tamanho" class="form-control border border-dark" value="<?php echo $lista["tamanho"]; ?>" required placeholder="Insira o tamanho">
                                                            <label for="" class="text-dark ms-2"><strong> Vermifugação </strong></label>
                                                            <input type="text" name="vermifugacao" id="vermifugacao" class="form-control border border-dark" value="<?php echo $lista["vermifugacao"]; ?>" required placeholder="Insira se é vermifugado ou não">
                                                            <label for="" class="text-dark ms-2"><strong> Vacinas </strong></label>
                                                            <input type="text" name="vacinas" id="vacinas" class="form-control border border-dark" value="<?php echo $lista["vacinas"]; ?>" required placeholder="Insira se é vacinado">
                                                            <label for="" class="text-dark ms-2"><strong> Castrado </strong></label>

                                                            <input type="text" name="castrado" id="castrado" class="form-control border border-dark" value="<?php echo $lista["castrado"]; ?>" required placeholder="Insira se é castrado">



                                                            <select name="raca" id="raca" class="form-select" aria-label="Default select example">

                                                                <?php

                                                                $sql2 = "SELECT * FROM raca";
                                                                $result2 = mysqli_query($conn, $sql2);

                                                                if (mysqli_num_rows($result2) > 0) {
                                                                    while ($lista2 = mysqli_fetch_assoc($result2)) {


                                                                ?>
                                                                        <option value="<?php echo $lista2["idraca"]; ?>"><?php echo $lista2["nomeraca"]; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>



                                                            <input type="hidden" name="id" id="id" value="<?php echo $lista["idanimal"]; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-dark-subtle border border-dark" data-bs-dismiss="modal"> Fechar </button>
                                                        <button type="submit" class="btn bg-primary-subtle border border-dark"> Editar </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                <?php   }
                                } ?>

                            </tbody>
                        </table>

                        <div class="modal fade custom-cadastro-animal" id="modal_animal" tabindex="-1" aria-labelledby="modal_animal" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content border border-dark border-2">
                                    <div class="modal-header border-bottom border-dark bg-primary-subtle">
                                        <h1 class="modal-title fs-5" id="modal_animal"> Cadastrando Animal </h1>
                                    </div>
                                    <div class="modal-body">
                                        <form action="cadastrar_animal.php" method="POST">
                                            <div class="row">

                                                <div class="col">
                                                    <label for="" class="text-dark ms-2"><strong> Nome </strong></label>
                                                    <input type="text" name="nome" id="nome" class="form-control border border-dark" required placeholder="Insira o nome">
                                                    <label for="" class="text-dark ms-2"><strong> Idade </strong></label>
                                                    <input type="text" name="idade" id="idade" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira a idade">
                                                    <label for="" class="teaxt-dark ms-2"><strong> Sexo </strong></label>
                                                    <input type="text" name="sexo" id="sexo" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira o sexo">
                                                    <label for="" class="text-dark ms-2"><strong> Cor do pelo </strong></label>
                                                    <input type="text" name="cor_pelo" id="cor_pelo" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira a pelagem">
                                                </div>


                                                <div class="col">
                                                    <label for="" class="text-dark ms-2"><strong> Tamanho </strong></label>
                                                    <input type="text" name="tamanho" id="tamanho" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira o porte">
                                                    <label for="" class="text-dark ms-2"><strong> Vermifugado </strong></label>
                                                    <input type="text" name="vermifugacao" id="vermifugacao" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira se é vermifugado ou não">
                                                    <label for="" class="text-dark ms-2"><strong> Vacinas </strong></label>
                                                    <input type="text" name="vacinas" id="vacinas" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira se é vacinado">
                                                    <label for="" class="text-dark ms-2"><strong> Castrado </strong></label>
                                                    <input type="text" name="castrado" id="castrado" class="form-control border-dark border mb-3" id="floatingInput" required placeholder="Insira se é castrado">
                                                    <label for="" class="text-dark ms-2"><strong> Raça </strong></label>
                                                    <select name="raca" id="raca" class="form-select" aria-label="Default select example">

                                                        <?php

                                                        $sql2 = "SELECT * FROM raca";
                                                        $result2 = mysqli_query($conn, $sql2);

                                                        if (mysqli_num_rows($result2) > 0) {
                                                            while ($lista2 = mysqli_fetch_assoc($result2)) {


                                                        ?>
                                                                <option value="<?php echo $lista2["idraca"]; ?>"><?php echo $lista2["nomeraca"]; ?></option>
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
            text: "Animal adicionado com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_animal.php";

        });
    </script>

<?php } else if ($_GET['alert'] == 2) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Animal excluído com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_animal.php";

        });
    </script>

<?php } else if ($_GET['alert'] == 3) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Animal editado com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_animal.php";

        });
    </script>

<?php } ?>

</html>