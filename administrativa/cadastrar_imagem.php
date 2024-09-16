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


$diretorioDestino = "uploads/";

        $imagem = $_FILES["imagem"];
        $nomeimagem = uniqid($imagem["name"]).".jpeg";
        $tipo = $imagem["type"];
        $tamanho = $imagem["size"];
        $tmp_name = $imagem["tmp_name"];
    
        $caminhoDestino = $diretorioDestino .$nomeimagem;
        if (move_uploaded_file($tmp_name, $caminhoDestino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem.";
        }


   echo $animal_id = $_POST['animal_id'];
    
    $query = "INSERT INTO imagem (nomeimagem, animal_idanimal) VALUES ('$nomeimagem', '$animal_id')";
    $result = mysqli_query($conn, $query);

    if ($result) {

       header("Location: principal_imagem.php?alert=1");
        exit();
    } else {
        echo "Erro ao cadastrar imagem " . mysqli_error($conn);
    }


?>