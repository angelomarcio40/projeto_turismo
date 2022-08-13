<?php
// include da conexão
include '../backend/conexao.php';

//  captura a var global ID recebida via GET
$id = $_GET['id'];

try{
    // comando SQL que irá selecionar as viagen por ID
    $sql = "SELECT * FROM tb_viagens WHERE id=$id";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($dados);
    // echo "<?pre>";
    // echo $dados[0]['valor'];

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
    <title>Alterar Viagens</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div id="container">
        <h3>Alterar Viagens</h3>
        <form action="../backend/_alterar_viagens.php" method="post">

        <div id="grid-alterar">
            <div>
                <label for="">ID</label>
                <input type="text" name="id" id="id" value="<?php echo $dados[0]['id'];?>" readonly>
            </div>
            <div>
                <label for="">Título</label>
                <input type="text" name="titulo" id="titulo" value="<?php echo $dados[0]['titulo'];?>">
            </div>
            <div>
                <label for="local">Local</label> 
                <input type="text" name="local" id="local" value="<?php echo $dados[0]['local'];?>">
            </div>
            <div>
                <label for="valor">Valor</label>
                <input type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor'];?>">
            </div>
            <div>
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $dados[0]['descricao'];?></textarea>
            </div>
        </div>
        <input type="submit" value="Salvar">

        </form>
    </div>
    
</body>
</html>