<?php

include('conexao.php');
include('funcoes.php');

if(isset($_POST['btn-cadastrar'])){
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    if(cadastrar($conexao, $nome, $email, $senha)){
        echo('CADASTRO EFETUADO COM SUCESSO!');
        echo("VOLTE E EFETUE O LOGIN! <a href='index.php'>VOLTAR</a>");
    }

    else{
        echo('NÃO FOI POSSÍVEL CONCLUIR O CADASTRO.');
        echo("POR FAVOR, TENTE NOVAMENTE. <a href='index.php'>VOLTAR</a>");
    }
}

if(isset($_POST['btn-login'])){
    $login = mysqli_escape_string($conexao, $_POST['login']);
    $password = mysqli_escape_string($conexao, $_POST['password']);

    logup($conexao, $login, $password);
}

?>