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

if (isset($_GET['id']) && isset($_GET['status'])) {
    
    $id = $_GET['id'];
    $status = $_GET['status'];

    if ($status == "Aprovado") {
        $sql1 = "SELECT * FROM pedido_adocao WHERE usuarios_idusuarios = '$id'";
        $result1 = mysqli_query($conn, $sql1);
        $row = mysqli_fetch_assoc($result1);
        $id_animal = $row['animal_idanimal'];

        $sql2 = "UPDATE animal SET oculta = '1' WHERE idanimal = '$id_animal'";
        $result2 = mysqli_query($conn, $sql2);

        if ($result2) {
            echo "animal oculto";
        }

        $delet_img = "DELETE FROM imagem WHERE animal_idanimal = '$id_animal'";
        $result_delet_img = mysqli_query($conn,$delet_img);

        if($result_delet_img){
            echo "imagem deletada";
        }

    } else {
        echo "diferente";
    }

    $sql = "UPDATE pedido_adocao SET status_pedido = '$status' WHERE usuarios_idusuarios = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: principal_pedido.php?alert=1");
        exit();
    } else {
        echo "Erro na atualização do registro: " . $conn->error;
    }
} else {
    header("Location: principal_pedido.php?a");
}

$conn->close();
