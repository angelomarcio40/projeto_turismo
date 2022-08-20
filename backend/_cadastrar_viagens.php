<?php

// Include da conexao com banco de dados
include 'conexao.php';

try{
    // exibe as variaveis globais recebidas via POST
    // echo "<pre>";
    // var_dump($_POST);
    //  var_dump($_FILES);
    //  echo "</pre>";
    //  exit;
    
    // variaveis que recebm os dados enviados via POST
    $titulo = $_POST['titulo'];
    $local = $_POST['local'];
    $valor = $_POST['valor'];
    $desc = $_POST['desc'];

    // ===============================================================
    // upload da imagem
    //  armazena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];

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

    // define novo nome da imagem para o upload
    $imagem = 'foto.jpg';

    // função PHP que faz o upload da imagem
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    // ===============================================================

    // variavel que recebe a querry SQL que será executada no BD
    $sql = "INSERT INTO
                tb_viagens
            (
                `titulo`,
                `local`,
                `valor`,
                `descricao`,
                `imagen`
            )
            VALUES
            (
                '$titulo',
                '$local',
                '$valor',
                '$desc',
                '$nome_final_imagem'
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