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

    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $sexo = $_POST['sexo'];
    $cor_pelo = $_POST['cor_pelo'];
    $tamanho = $_POST['tamanho'];
    $vermifugacao = $_POST['vermifugacao'];
    $vacinas = $_POST['vacinas'];
    $castrado = $_POST['castrado'];
    $raca = $_POST['raca'];
    $id = $_POST['id'];
 
    $query = "UPDATE animal SET  nome = '$nome', idade = '$idade', sexo = '$sexo', cor_pelo= '$cor_pelo', tamanho= '$tamanho', vermifugacao= '$vermifugacao', vacinas= '$vacinas', castrado= '$castrado', raca_idraca= '$raca' WHERE idanimal = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_animal.php?");
        exit();
    } else {
        echo "Erro ao cadastrar o animal: " . mysqli_error($conn);
    }
}

?>