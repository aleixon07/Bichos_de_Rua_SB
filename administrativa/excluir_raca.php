<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    

    $select = "SELECT * FROM animal WHERE raca_idraca = '$id'";
    $result_select = mysqli_query($conn,$select);

    if(mysqli_num_rows($result_select) > 0){
        header("Location: principal_raca.php?alert=4");
        exit();
    }

    $query = "DELETE FROM raca WHERE idraca = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: principal_raca.php?alert=2");
        exit();
    } else {
        echo "Erro ao excluir a raça: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
