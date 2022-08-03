<?php

// Include da conexao com banco de dados
include 'conexao.php';

try{
    // exibe as variaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    
    // variaveis que recebm os dados enviados via POST
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $tdesc = $_POST['desc'];

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
echo "Cadastro realizado com sucesso!";

}catch(PDOException $erro){

}

// Final da conexão
?>