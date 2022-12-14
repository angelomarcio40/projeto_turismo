<?php

// Inica a sessão
session_start();

// Verifica se a variável de sessão existe
if(isset($_SESSION['usuario'])){
    header('Location: gerenciar_viagens.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- obs: emmet link:css -->
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div id="container">
        
        <!-- lembrete form: neste caso foi necessário ter as propriedades action e method post -->
        <form action="../backend/_validar_login.php" id="login" method="post">
            <h3>Admin</h3>

            <input class="input-login" type="email" name="usuario" id="usuario" placeholder="Usuario" required>

            <input class="input-login" type="password" name="senha" id="senha" placeholder="Senha" required>

            <input class="btn-login" type="submit" value="login">

        </form>
    </div>

</body>

</html>