<?php

include('conexao.php');
include('funcoes.php');
include('funcoesPrest.php');
include('funcoesCli.php');


if (isset($_POST['btn-login'])) {
    $login = mysqli_escape_string($conexao, $_POST['login']);
    $password = mysqli_escape_string($conexao, $_POST['password']);

    logup($conexao, $login, $password);
}

if (isset($_POST['btn-aceitarP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = aceitarPrest($conexao, $id);
}

if (isset($_POST['btn-recusarP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = recusarPrest($conexao, $id);
}

if (isset($_POST['btn-banirP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = banirPrest($conexao, $id);
}

if (isset($_POST['btn-desbanirP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = desbanirPrest($conexao, $id);
}

if (isset($_POST['btn-verP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    verPrestador($conexao, $id);
}

if (isset($_POST['btn-banirC'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = banirCLi($conexao, $id);
}

if (isset($_POST['btn-desbanirC'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    $mensagem = desbanirCli($conexao, $id);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/styles.css">
    <title></title>
</head>

<body>
    <div class="mensagem">
        <h3><?php echo $mensagem; ?></h3>
    </div>
</body>

</html>