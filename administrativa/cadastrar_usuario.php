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

if (isset($_POST['nome'])) {

    $nome = $_POST['nome'];

    $query = "INSERT INTO pedidoadocao (pedidoadocao) VALUES ('$nome')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_usuario.php?");
        exit();
    } else {
        echo "Erro ao cadastrar usuario: " . mysqli_error($conn);
    }
}

?>