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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_informado = $_POST["usuario"];
    $senha_informada = $_POST["senha"];

    $sql = "SELECT * FROM admin WHERE email = '$usuario_informado' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $usuario_valido = $row["email"];
        $senha_valida = $row["senha"];

        if ($senha_informada === $senha_valida) {
            $_SESSION["email"] = $usuario_valido;
            $id = $row['idadmin'];
            $_SESSION["idadmin"] = $id;

            header("Location: principal.php");
            exit();
        } else {

            $mensagem_erro = "<center><p style='background-color:#082B49;color:white;'>Usuário ou senha inválidos.</p></center>";
        }
    } else {
        $mensagem_erro = "<center><p style='background-color:#082B49;color:white;'>Usuário ou senha inválidos.</p></center>";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background: #e9e9e9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .card-body {
            padding: 30px;
        }

        .card-body h3 {
            margin-bottom: 30px;
        }

        .form-group {
            text-align: center;
        }

        .form-control {
            border-radius: 20px;
            border: 1px solid #007bff;
            margin-bottom: 20px;
        }

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 20px;
            font-size: 18px;
            padding: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height:100vh">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center"> Seja bem vindo(a) voluntário(a) </h3>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="usuario"><strong> E-mail </label>
                                <input type="text" class="form-control" id="usuario" name="usuario">
                            </div>

                            <div class="form-group">
                                <label for="senha"><strong> Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha">
                            </div>
                            <?php if (isset($mensagem_erro)) { ?>
                                <p style="background-color:#082B49; color:white;"><?php echo $mensagem_erro; ?></p>
                            <?php } ?>
                            <button type="submit" id="sendlogin" class="btn btn-primary btn-block"><i class="fas fa-paw"></i> Entrar </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>