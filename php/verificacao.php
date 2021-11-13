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

    aceitarPrest($conexao, $id);
}

if (isset($_POST['btn-recusarP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    recusarPrest($conexao, $id);
}

if (isset($_POST['btn-banirP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    banirPrest($conexao, $id);
}

if (isset($_POST['btn-desbanirP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    desbanirPrest($conexao, $id);
}

if (isset($_POST['btn-verP'])) {
    $id = mysqli_escape_string($conexao, $_POST['id']);

    verPrestador($conexao, $id);
}
