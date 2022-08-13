<?php

include "conexao.php";

try{
    // var_dump($_POST);
    // exit;
    //var recebidas via $_POST
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE 
                tb_viagens
            SET
                `titulo` = '$titulo',
                `local` = '$local',
                `valor` = '$valor',
                `descricao` = '$descricao'
            WHERE
                id = $id;
            ";

            $comando = $con->prepare($sql);

            $comando->execute();

            header('Location: ../admin/alterar_viagens.php?id='.$id);

}catch(PDOException $erro){
    echo $erro->getMessage();

}
?>