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
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $cor_pelo = $_POST['cor_pelo'];
    $tamanho = $_POST['tamanho'];
    $vermifugacao = $_POST['vermifugacao'];
    $vacinas = $_POST['vacinas'];
    $castrado = $_POST['castrado'];
    $raca = $_POST['raca'];

    // Utilizando prepared statements
    $query = "INSERT INTO animal (nome, idade, sexo, cor_pelo, vermifugacao, vacinas, castrado, raca_idraca, tamanho) VALUES ('$nome','$idade', '$sexo', '$cor_pelo', '$vermifugacao', '$vacinas', '$castrado', '$raca', '$tamanho')";
    $result = mysqli_query($conn,$query);

    if ($result) {
        header("Location: principal_animal.php");
        exit();
    } else {
        echo "Erro ao cadastrar o animal: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
