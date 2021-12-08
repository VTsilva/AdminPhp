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

if (isset($_POST['btn-editPrest'])) {
    $id = mysqli_escape_string($conexao, $_POST['idPrest']);
    $cnpj = mysqli_escape_string($conexao, $_POST['cnpjPrest']);
    $nome = mysqli_escape_string($conexao, $_POST['nomePrest']);
    $email = mysqli_escape_string($conexao, $_POST['emailPrest']);
    $tel = mysqli_escape_string($conexao, $_POST['telPrest']);
    $senha = mysqli_escape_string($conexao, $_POST['senhaPrest']);
    $cep = mysqli_escape_string($conexao, $_POST['cepPrest']);
    $ende = mysqli_escape_string($conexao, $_POST['endPrest']);
    $num = mysqli_escape_string($conexao, $_POST['numPrest']);
    $comp = mysqli_escape_string($conexao, $_POST['compPrest']);
    $bairro = mysqli_escape_string($conexao, $_POST['bairroPrest']);
    $cidade = mysqli_escape_string($conexao, $_POST['cidadePrest']);
    $uf = mysqli_escape_string($conexao, $_POST['ufPrest']);

    $mensagem = editPrest(
        $conexao,
        $id,
        $cnpj,
        $nome,
        $email,
        $tel,
        $senha,
        $cep,
        $ende,
        $num,
        $comp,
        $bairro,
        $cidade,
        $uf
    );
}

if (isset($_POST['btn-editCli'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nome']);
    $cpf = mysqli_escape_string($conexao, $_POST['cpf']);
    $email = mysqli_escape_string($conexao, $_POST['email']);
    $tel = mysqli_escape_string($conexao, $_POST['tel']);
    $senha = mysqli_escape_string($conexao, $_POST['senha']);
    $ende = mysqli_escape_string($conexao, $_POST['ende']);
    $num = mysqli_escape_string($conexao, $_POST['num']);
    $comp = mysqli_escape_string($conexao, $_POST['comp']);
    $bairro = mysqli_escape_string($conexao, $_POST['bairro']);
    $cidade = mysqli_escape_string($conexao, $_POST['cidade']);
    $uf = mysqli_escape_string($conexao, $_POST['uf']);
    $cep = mysqli_escape_string($conexao, $_POST['cep']);

    $mensagem = editCli(
        $conexao,
        $id,
        $nome,
        $cpf,
        $email,
        $tel,
        $senha,
        $ende,
        $num,
        $comp,
        $bairro,
        $cidade,
        $uf,
        $cep
    );
}

if (isset($_POST['btn-editFun'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_escape_string($conexao, $_POST['nomeFun']);
    $cpf = mysqli_escape_string($conexao, $_POST['cpfFun']);
    $email = mysqli_escape_string($conexao, $_POST['emailFun']);
    $tel = mysqli_escape_string($conexao, $_POST['telFun']);
    $senha = mysqli_escape_string($conexao, $_POST['senhaFun']);

    $mensagem = editFun($conexao, $id, $nome, $cpf, $email, $tel, $senha);
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