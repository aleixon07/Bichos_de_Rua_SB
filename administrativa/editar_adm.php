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

if (isset($_POST['nome']) && isset($_POST['idadmin'])) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idadmin = $_POST['idadmin'];

    $sql_email = "SELECT * FROM admin WHERE email = '$email' AND idadmin != '$idadmin'";
    $result_email = mysqli_query($conn,$sql_email);

    if(mysqli_num_rows($result_email) > 0){
        header("Location: principal_adm.php?alert=5");
        exit();
    }

    if(!empty($_POST['senha_new']) && !empty($_POST['senha_conf']) && isset($_POST['senha_conf']) && isset($_POST['senha_new'])){
        
        $senha_new = $_POST["senha_new"];
        $senha_conf = $_POST["senha_conf"];

        $sql_busc_user = "SELECT * FROM admin WHERE idadmin = '$idadmin' LIMIT 1";
        $result_busc_user = mysqli_query($conn,$sql_busc_user);

        while($row = mysqli_fetch_assoc($result_busc_user)){
            $senha_old = $row['senha'];
        }
            if($senha_conf === $senha_old){

                $sql_edit_senha = "UPDATE admin SET senha = '$senha_new' WHERE idadmin = '$idadmin'";
                $resultedit_senha = mysqli_query($conn, $sql_edit_senha);

                if($resultedit_senha){
                    echo "senha editada";
                }
                
            }else{
                header("Location: principal_adm.php?alert=6");
                exit();
            }
       

    }else{
        echo "sem post da senha";
    }

    $query = "UPDATE admin SET nome = '$nome', email = '$email' WHERE idadmin = '$idadmin'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: principal_adm.php?alert=3");
        exit(); 
    } else {
        echo "Erro ao editar o administrador: " . mysqli_error($conn);
    }
}
?>