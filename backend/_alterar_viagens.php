<?php

include '../backend/controle_sessao.php';
include "conexao.php";

try{
    
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    $nome_original_imagem = $_FILES['imagem']['name'];

    if($nome_original_imagem != null){
    
        // Descobrir a extensão da imagem
        // Formatos válidos: jpg/jpeg/png
        $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);

        // echo $extensao;

        // varificando de formato
        if($extensao != 'jpg' && $extensao != 'jpeg' &&
        $extensao != 'png'){
        echo 'Formato de imagem inválido';
        exit;
        }

    // Gera um nome aleatório para imagem(hash)
    // afunção uniid gera um hash aleatório baseado no temp em microsegundos, mas ela não é confiável
    // utilizamos o md5- para gerar outro hash que não irá se repetir
    $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));

    // $hash = uniqid($_FILES['imagem']['tmp_name'],true);

    // juntamos o hash mais a extensão para ter o nome final da imagem
    $nome_final_imagem = $hash.'.'.$extensao;

    // echo $hash;

    // caminho onde a imagem sera armazenada
    $pasta = '../img/upload/';

    // função PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    $sql = "UPDATE 
                tb_viagens
            SET
                `titulo` = '$titulo',
                `local` = '$local',
                `valor` = '$valor',
                `descricao` = '$descricao',
                `imagen` = '$nome_final_imagem'
            WHERE
                id = $id;
            ";

    }else{

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
        }

            $comando = $con->prepare($sql);

            $comando->execute();

            header('Location: ../admin/alterar_viagens.php?id='.$id);

}catch(PDOException $erro){
    echo $erro->getMessage();

}
?>