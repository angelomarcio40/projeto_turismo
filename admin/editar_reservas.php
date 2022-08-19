<?php
include('../includes/conexao.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Código fonte formulario php" />
    <meta name="keywords" content="formulario php, bootstrap, bootstrap validator" />
    <meta name="author" content="Cristiane Faria" />

    <title>Hora de Trabalhar | Formulário PHP</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" />
    <style>
        main,
        footer,
        .mensagem-alerta {
            text-align: center;
        }

        form {
            max-width: 800px;
            padding-top: 30px;
            display: block;
            margin: 0 auto;
        }

        .mensagem-alerta {
            max-width: 500px;
            margin: 20px auto;
        }
    </style>

</head>

<body>
    <?php
    $id = $_GET['idreserva'];

    $sql = "SELECT * FROM tb_reserva WHERE id = $id";
    $res = $conexao->query($sql);
    // colocar o resultado em linhas\/
    $dados = mysqli_fetch_array($res);
    ?>
    <main class="container">
        <h1>Edição do prato</h1>
        <br>
        <div class="reservation-form small-12 columns no-padding">

<form action="alterar-reservas.php" method="post">

    <div class="form-part1 small-12 large-8 xlarge-7 columns no-padding">

        <input type="text" name="nome" class="field" placeholder="Nome completo" value="<?php echo $dados['nome'] ?>" />

        <input type="text" name="email" class="field" placeholder="E-mail" value="<?php echo $dados['email'] ?>" />

        <textarea type="text" name="mensagem" class="field" placeholder="Mensagem" value="<?php echo $dados['mensagem'] ?>"></textarea>


    </div>

    <div class="form-part2 small-12 large-3 xlarge-3 end columns no-padding">
        <input type="text" name="telefone" class="field" placeholder="Telefone" value="<?php echo $dados['telefone'] ?>" />

        <input type="datetime-local" name="data_reserva" class="field" placeholder="Data e hora" value="<?php echo $dados['data_reserva'] ?>" />

        <input type="text" name="numero_pessoas" class="field" placeholder="Número de pessoas" value="<?php echo $dados['numero_pessoas'] ?>" />

        <input type="submit" name="submit" value="Reservar" />

    </div>

    

    </main>
    <footer>
        <hr>
        <div class="copyright">Desenvolvido com ❤ por
            <a href="" target="_blank"></a>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

</body>

</html>