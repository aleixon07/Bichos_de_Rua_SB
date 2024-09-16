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
    
    $query = "DELETE FROM animal WHERE idanimal = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: principal_animal.php?");
        exit();
    } else {
        echo "Erro ao excluir o animal: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
