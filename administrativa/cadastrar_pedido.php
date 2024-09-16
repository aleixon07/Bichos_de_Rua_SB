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





   echo $animal_idanimal = $_POST['animal_idanimal'];
  echo   $status_pedido = $_POST['status_pedido'];
   echo  $usuarios_idusuarios = $_POST['usuarios_idusuarios'];



    $query = "INSERT INTO pedido_adocao (animal_idanimal, status_pedido, usuarios_idusuarios) VALUES ('$animal_idanimal', '$status_pedido', '$usuarios_idusuarios')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_pedido.php?");
        exit();
    } else {
        echo "Erro ao cadastrar o animal: " . mysqli_error($conn);
    }


?>