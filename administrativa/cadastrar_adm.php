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

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql_email = "SELECT * FROM admin WHERE email = '$email'";
    $result_email = mysqli_query($conn,$sql_email);

    if(mysqli_num_rows($result_email) > 0){
        header("Location: principal_adm.php?alert=5");
        exit();
    }

    // Evitar SQL Injection usando declarações preparadas
    $stmt = $conn->prepare("INSERT INTO admin (nome, email, senha) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        header("Location: principal_adm.php?alert=1");
        exit();
    } else {
        echo "Erro ao cadastrar o administrador: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
