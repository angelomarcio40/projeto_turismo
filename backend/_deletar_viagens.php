<?php

include 'conexao.php';

try{
    // captura o id enviado via GET e armazena em uma variável
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_viagens WHERE id=$id";

    $comando = $con->prepare($sql);

    $comando->execute();

    header('Location: ../admin/gerenciar_viagens.php');

}catch(PDOException $erro){
    echo $erro->getMessage();
}
?>