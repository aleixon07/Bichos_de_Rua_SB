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

    $sql = "SELECT * FROM imagem WHERE idimagem = '$id'";
    $re = mysqli_query($conn, $sql);
    $row = $re->fetch_assoc();
    
    $nome_imagem = $row['nomeimagem'];

        $caminhoArquivo = "uploads/$nome_imagem";
        
        if (file_exists($caminhoArquivo)) {
            if (unlink($caminhoArquivo)) {
                echo 'Arquivo de foto excluído com sucesso.';
            } else {
                echo 'Erro ao excluir o arquivo de foto.';
            }
        } else {
            echo 'O arquivo de foto não existe.';
        }
    
    $query = "DELETE FROM imagem WHERE idimagem = '$id'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        header("Location: principal_imagem.php?alert=2");
        exit();
    } else {
        echo "Erro ao excluir imagem: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
