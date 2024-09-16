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

    $query = "INSERT INTO raca (nomeraca) VALUES ('$nome')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_raca.php?alert=1");
        exit();
    } else {
        echo "Erro ao cadastrar a raça: " . mysqli_error($conn);
    }
}

?>