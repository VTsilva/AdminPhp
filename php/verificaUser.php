<?php

include('conexao.php');
include('funcoes.php');

if(isset($_POST['btn-login'])){
    $login = mysqli_escape_string($conexao, $_POST['login']);
    $password = mysqli_escape_string($conexao, $_POST['password']);

    logup($conexao, $login, $password);
}
