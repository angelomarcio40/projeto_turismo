<?php

include '../backend/controle_sessao.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Viagens</title>
    <!-- Importação do CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="container">
        <h3>Cadastro de Viagens</h3>
        <hr>
        <a href="gerenciar_viagens.php">Gerenciar Viagens</a>
        <!-- define o tipo de arquivo enviado para o formulario ENCTYPE -->
        <form action="../backend/_cadastrar_viagens.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="">Título</label>
                <input type="text" name="titulo" id="Titulo">
            </div>

            <div>
                <label for="local">Local</label>
                <input type="text" name="local" id="local">
            </div>

            <div>
                <label for="">Valor</label>
                <input type="number" name="valor" id="valor">
            </div>
            <!-- obs: emmet input:file -->
            <div>
                <label for="imagem">Imagem</label>
                <input type="file" name="imagem" id="imagem">
            </div>

            <div>
                <label for="desc">Descrição</label>
                <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
            </div>

            <input type="submit" value="Cadastrar">

        </form>
    </div>
    
</body>
</html>