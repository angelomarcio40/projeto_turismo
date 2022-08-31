<?php

include "conexao.php";

try{
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT
                * 
                FROM 
                    tb_login 
                WHERE 
                    email ='$usuario' 
                AND
                    BINARY
                    senha = '$senha'
                AND
                    ativo = 1
                ";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // VAR_DUMP($DADOS);

    // inserindo logica

    // verifica se exitem registros dentro da virável dados
    if($dados != null){
        // inicia a seção
        session_start();
        // var_dump(session_id());
        // exit;
        
        // criar uma vriável adicionadao na variável de sessão email
        $_SESSION['usuario'] = $usuario;

        // exibe o valor adicionado na virávek de sessão usuario
        // var_dump($_SESSION['usuario']);
        // exit;

        // se o usuário e senha são validos, irá entrar nesse trecho de código
        header('Location: ../admin/gerenciar_viagens.php');
    }else{
         // se o usuário ou senha são inválidos, irá entrar nessw bloco de código
         echo "Usuário ou senha inválidos";
        //  header('Location: ../admin/index.html');
    }

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>