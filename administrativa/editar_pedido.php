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

if (isset($_POST['nome']) && isset($_POST['id'])) {

    
    $idpedido_adocao = $_POST['idpedido_adocao'];
    $animal_idanimal = $_POST['animal_idanimal'];
    $status_pedido = $_POST['status_pedido'];
    $usuarios_idusuarios = $_POST['usuarios_idusuarios'];
    
 
    $query = "UPDATE pedido_adocao SET  idpedido_adocao = '$idpedido_adocao', animal_idanimal = '$animal_idanimal ', status_pedido= '$status_pedido ', usuarios_idusuarios= ' $usuarios_idusuarios ' WHERE idpedido_adocao = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_pedido.php?");
        exit();
    } else {
        echo "Erro ao cadastrar o animal: " . mysqli_error($conn);
    }
}

?>