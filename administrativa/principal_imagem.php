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


$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "tccbanco";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
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
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="css/style1.css" />
    <link rel="stylesheet" href="css/colors/default.css" id="colorSkinCSS">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>
<style>
    .container {
        max-width: 2000px;
        margin: 0 auto;
        background-color: #fff;
        padding: 80px;
        border-radius: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .header {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 50px 50px 0 0;
        margin-bottom: 20px;
    }

    .header h1 {
        font-size: 24px;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: left;
    }

    label {
        display: block;
        color: #555;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-group input[type="file"],
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 20px;
    }



    .submit-button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .submit-button:hover {
        background-color: #0056b3;

    }

    .btn {
        border-radius: 20px;
        background-color: #007bff;
        border: none;
        color: white;
        box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
    }
</style>


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

    <section class="main_content dashboard_part">
        <div class="container mt-5 text-center">
            <h2 class="heading-section mt-4 mb-3" style="font-weight: bold; color: #082B49;">Cadastro de Imagem</h2>
            <form action="cadastrar_imagem.php" method="POST" enctype="multipart/form-data" style="display: inline-block;">
                <div class="form-group text-center">
                    <label for="imagem"> Selecione a imagem: </label>
                    <div class="mx-auto">
                        <input type="file" accept="image/*" name="imagem" onchange='previewImagem(event)' class="form-control-file">
                    </div>
                    <img src="img/icon.png" class="mt-3" alt="" style="border-radius: 30px; min-width: 200px; max-width: 300px;" height="200px" id="animal">
                </div>

                <div class="form-group">
                    <label for="animal_id">Selecione o animal:</label>
                    <select required class="form-control" name="animal_id" id="animal_id" required>
                        <option disabled selected>Escolha...</option>

                        <?php

                        $sql = "SELECT * FROM animal WHERE oculta is null";
                        $result_animal = mysqli_query($conn, $sql);

                        if ($result_animal->num_rows > 0) {
                            while ($row_animal = $result_animal->fetch_assoc()) { ?>
                                <option value=' <?php echo $row_animal['idanimal']; ?>'><?php echo $row_animal['nome']." - Pelagem: ".$row_animal['cor_pelo']; ?></option>
                        <?php  }
                        }
                        ?>
                    </select>
                </div>
                <button style="text-decoration: none; border-radius: 70px;" type="submit" class="btn btn-primary btn-round"> Cadastrar Imagem </button>

            </form>
            <div class="row mt-4">
                <?php


                $query = $db->query("SELECT * FROM imagem ORDER BY nomeimagem DESC");

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        $imageURL = 'uploads/' . $row["nomeimagem"];

                        $ida = $row["animal_idanimal"];
                        $sql = "SELECT * FROM animal WHERE idanimal= '$ida'";
                        $re = mysqli_query($db, $sql);
                        $ro = $re->fetch_assoc();
                        $nome_animal = $ro["nome"];

                ?>
                        <div class="col-3 mt-5 d-flex flex-column align-items-center">
                            <img src="<?php echo $imageURL; ?>" class="rounded-circle" alt="" style="width: 150px; height: 150px;" />
                            <h6 class="text-center my-2"><?php echo $nome_animal; ?></h6>
                            <div class='text-center'>
                                <button class='btn btn-primary border border-dark border-opacity-25' data-bs-toggle="modal" data-bs-target="#modal<?php echo $row["idimagem"]; ?>"><i class="bi bi-pencil-fill"></i></button>
                                <a href="excluir_imagem.php?id=<?php echo $row['idimagem']; ?>" class='btn btn-primary border border-dark border-opacity-25'><i class="bi bi-trash-fill"></i></a>

                            </div>
                        </div>



                        <div class="modal fade" id="modal<?php echo $row['idimagem']; ?>" tabindex="-1" aria-labelledby="modal<?php echo $row['idimagem']; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border border-dark bg-primary-subtle">
                                        <h5 class="modal-title" id="modal_adicionar">Editando Imagem</h5>
                                    </div>
                                    <div class="modal-body border">
                                        <form action="editar_imagem.php" method="POST" enctype='multipart/form-data'>
                                            <div class="d-flex flex-column align-items-center">
                                                <img id="preview<?php echo $row['idimagem']; ?>" src="uploads/<?php echo $row['nomeimagem']; ?>" class="bg-secondary-subtle rounded ms-2 mb-1" alt="generico" width="400px" height="300px">

                                            </div>
                                            <input type="hidden" value="<?php echo $row['idimagem']; ?>" name="id">


                                            <input onchange="previewImagem<?php echo $row['idimagem'] ?>(event)" required type="file" name="imagem" id="imagem" accept="image/*" class="form-control border mb-2 border-dark">

                                            <label for="animal_id">Animal Selecionado</label>
                                            <select required class="form-control border border-dark" name="animal_id" id="animal_id" required>
                                                <option value="<?php echo $row['animal_idanimal']; ?>" selected><?php echo $nome_animal; ?></option>

                                                <?php

                                                $sql = "SELECT * FROM animal WHERE idanimal != '$ida' AND oculta is null";
                                                $result_animal = mysqli_query($conn, $sql);

                                                if ($result_animal->num_rows > 0) {
                                                    while ($row_animal = $result_animal->fetch_assoc()) { ?>
                                                        <option value=' <?php echo $row['animal_idanimal']; ?>'><?php echo $row_animal['nome']; ?></option>
                                                <?php  }
                                                }
                                                ?>
                                            </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-dark-subtle border border-dark" data-bs-dismiss="modal">Fechar</button>
                                        <button type="submit" class="btn bg-warning-subtle border border-dark">Editar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php }
                } else { ?>
                <?php } ?>
            </div>
        </div>
    </section>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    function previewImagem(event) {
        var input = event.target;
        var imagem = input.files[0];
        var imgPreview = document.getElementById("animal");

        var reader = new FileReader();
        reader.onload = function() {
            imgPreview.src = reader.result;
            imgPreview.style.borderRadius = '50%';
        };
        reader.readAsDataURL(imagem);
    }
</script>

<?php

if (!isset($_GET['alert'])) {
} else if ($_GET['alert'] == 1) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Imagem adicionada com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_imagem.php";

        });
    </script>

<?php } else if ($_GET['alert'] == 2) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Imagem excluída com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_imagem.php";

        });
    </script>

<?php } else if ($_GET['alert'] == 3) {

?>
    <script>
        // Função para mostrar o SweetAlert
        Swal.fire({
            title: "Concluído!",
            text: "Imagem editada com sucesso.",
            icon: "success"

        }).then((result) => {
            // Verifica se o usuário clicou em "OK"
            // Muda a URL após o SweetAlert ser fechado
            window.location.href = "principal_imagem.php";

        });
    </script>

<?php } ?>



</html>