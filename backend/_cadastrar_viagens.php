<?php

// Include da conexao com banco de dados
include 'conexao.php';

try{
    // exibe as variaveis globais recebidas via POST
    // echo "<pre>";
    // // var_dump($_POST);
    // var_dump($_FILES);
    // echo "</pre>";
    // exit;
    
    // variaveis que recebm os dados enviados via POST
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];

    // ===============================================================
    // upload da imagem 
    $pasta = '../img/upload/';

    // define novo nome da imagem para o upload
    $imagem = 'foto.jpg';

    // função PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$imagem);

    exit;

    // ===============================================================

    // variavel que recebe a querry SQL que será executada no BD
    $sql = "INSERT INTO
                tb_viagens
            (
                `titulo`,
                `local`,
                `valor,
                `desc`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$valor',
                '$desc'
            )
            ";

// prepara a execução da querry SQL acima
$comando = $con->prepare($sql);

// executa  o comando com a querryno banco de dados
$comando->execute();

// exibe msg de sucesso ao inserir
// echo "Cadastro realizado com sucesso!";

header('Location: ../admin/gerenciar_viagens.php');

// fechar a conexao
$con = null;

}catch(PDOException $erro){
    echo $erro-> getMessage();
    die();
}

// Final da conexão
?>