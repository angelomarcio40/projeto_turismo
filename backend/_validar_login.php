<?php

include "conexao.php";

try{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM tb_login WHERE $emeil='usuario' AND senha = '$senha'";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    VAR_DUMP($DADOS);

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>