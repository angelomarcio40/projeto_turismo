<?php
// Arquivo que protege as paginas administrativas do site
// C irá ser erdrecionado o usuario não estiver logado,irá ser redrecionado para tela login

// inicia sessão
session_start();
// cria a var $usuario que irá receber o valor da var de sessão $_SESSION['usuario]
$usuario = $_SESSION['usuario'];

// se o usuaro não estiver logado, redreciona para tela login
if($usuario == null){
    header('Location: index.html');
    exit;
}

?>