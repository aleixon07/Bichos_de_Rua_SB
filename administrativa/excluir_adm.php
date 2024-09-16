<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

session_start();

$idadmin = $_SESSION["idadmin"];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    if($idadmin == $id){
        header("Location: principal_adm.php?alert=4");
        exit();
    }

    $query = "DELETE FROM admin WHERE idadmin = '$id'";
    $result = mysqli_query($conn, $query);
    

    if ($result) {
        header("Location: principal_adm.php?alert=2");
        exit();
    } else {
        echo "Erro ao excluir o administrador: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
