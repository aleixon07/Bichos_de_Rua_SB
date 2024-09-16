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

if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $id_animal = $_POST['animal_id'];

    $imagem = $_FILES['imagem'];
    $nome_imagem_ac = $imagem["name"];

    $sql = "SELECT * FROM imagem WHERE idimagem = '$id'";
    $resultad = mysqli_query($conn,$sql);
    $row = $resultad->fetch_assoc();

    $nome_excluir = $row["nomeimagem"];

    $caminhoArquivo_excluir = "uploads/$nome_excluir";

    if (file_exists($caminhoArquivo_excluir)) {
        if (unlink($caminhoArquivo_excluir)) {
            echo 'Arquivo de foto excluído com sucesso.';
        } else {
            echo 'Erro ao excluir o arquivo de foto.';
        }
    } else {
        echo 'O arquivo de foto não existe.';
    }

    $diretorioDestino = "uploads/";
    if (isset($nome_imagem_ac)) {
        $nomeimagem = uniqid($imagem["name"]) . ".jpeg";
        $tipo = $imagem["type"];
        $tamanho = $imagem["size"];
        $tmp_name = $imagem["tmp_name"];

        $caminhoDestino = $diretorioDestino . $nomeimagem;
        if (move_uploaded_file($tmp_name, $caminhoDestino)) {
            echo "Imagem enviada com sucesso!";
        } else {
            echo "Erro ao enviar a imagem.";
        }
    }
    


    $query = "UPDATE imagem SET nomeimagem = '$nomeimagem', animal_idanimal = '$id_animal' WHERE idimagem = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {

        header("Location: principal_imagem.php?alert=3");
        exit();
    } else {
        echo "Erro ao cadastrar imagem: " . mysqli_error($conn);
    }
}

?>