<?php
// incluindo arquivo de conexao
include 'backend/conexao.php';

try{
    // monta a query sql
    $sql = "SELECT * FROM tb_viagens";

    // prepara a execução da query sql acima
    $comando = $con->prepare($sql);

    // executa o comando com query no banco de dados
    $comando->execute();

    // criando a var que irá armanezar os dados, e setando o fetch em modo associativo(chave/valor)
    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($dados);
    // echo "</pre>";

}catch(PDOException $erro){
    echo $erro->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Viagens</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   <div id="container">
    <h3>Lista de Viagens</h3>
    <div id="grid-viagens">
    <?php
        foreach($dados as $d):
    ?>
        <figure class="figure-viagens">
            <img class="img-viagens" src="img/upload/<?php echo $d['imagen']?>" alt="Imagem da viagem">
            <figcaption class="figcaption-viagens">
                <h4><?php echo $d['titulo'];?></h4>
                <h5><?php echo $d['local'];?></h5>
                <h5>R$ <?php echo $d['valor'];?></h5>
                <small><?php echo $d['descricao'];?></small>
                <button class="btn-comprar">Comprar</button>
            </figcaption>
        </figure>

        <?php endforeach;?>
    </div>
   </div> 
</body>
</html>