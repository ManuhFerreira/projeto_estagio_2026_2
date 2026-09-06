<?php
    session_start();

    require 'conexaoBD.php';

    $usuarios_validos = [
        "admin" => "adm123"
    ];

    $erro = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $user = isset($_POST['user']) ? $_POST['user'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        if (isset($usuarios_validos[$user]) && $usuarios_validos[$user] === $senha){
            
            $_SESSION['logado'] = true;
            $_SESSION['nome_usuario'] = $user;

            header("Location: lista.php");
            exit;
        } else {
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Administrativo</title>
</head>
<body>
    <main>
        <form action="login.php" method="POST">
            <div class="adm">
            <button type="button" class="sair" onclick="window.location.href = 'formulario.php'">&times;</button>
            <h1>Acesso Administrativo</h1>
            <label for="user">Usuário: </label>
            <input type="text" name="user" id="user" placeholder="Digite seu usuário...">
            <label for="senha"><br>Senha: </label>
            <input type="password" name="senha" id="senha" placeholder="Digite a senha...">
            <button type="submit" class="entrar">Entrar</button>
            <?php if($erro != "") { ?>
                <p class="erro"><?php echo $erro; ?></p>
            <?php } ?>
            </div>
        </form>
    </main>
</body>
</html>