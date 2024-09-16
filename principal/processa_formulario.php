<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tccbanco";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$nome = $_POST["nome"];
$experienciasantigas = $_POST["experienciasantigas"];
$profissao = $_POST["profissao"];
$celular = $_POST["celular"];
$motivacao = $_POST["motivacao"];
$id_animal = $_POST["id_animal"];

$sql_1 = "INSERT INTO usuario (nome, experienciasantigas, profissao, celular, motivacao) VALUES ('$nome', '$experienciasantigas', '$profissao', '$celular', '$motivacao')";
$result_1 = mysqli_query($conn,$sql_1);

if($result_1){
    echo "Cadastro usuario realizado com sucesso!";
}

$sql_busc_user = "SELECT * FROM usuario ORDER BY idusuarios DESC LIMIT 1";
$result_busc_user = mysqli_query($conn, $sql_busc_user);

while($row = mysqli_fetch_assoc($result_busc_user)){
    $idusuarios = $row['idusuarios'];   
}


$sql_insert = "INSERT INTO pedido_adocao (animal_idanimal, status_pedido, usuarios_idusuarios) VALUES ('$id_animal', 'Em Verificação', '$idusuarios')";
$result_insert = mysqli_query($conn, $sql_insert);


if ($result_insert) {
    header("Location: index.php?alert=sucesso");
    exit();
} else {
    echo "Erro ao inserir dados de adoção: " . $conn->error;
}

$conn->close();
?>

