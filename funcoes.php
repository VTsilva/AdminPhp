<?php

function cadastrar($conexao, $nome, $email, $senha){

    $sql = "INSERT INTO usuario VALUES(default, '$nome', '$email', '$senha');";
    
    return mysqli_query($conexao, $sql);
}

function logup($conexao, $login, $password){
    
    $sql = "SELECT * FROM usuario WHERE email = '$login' AND senha = '$password';";

    $return =  mysqli_query($conexao, $sql);

    $rows = mysqli_fetch_array($return);
    if ($rows){
        echo('PARABENS! VOCÊ SE CADASTROU E EFETUOU O LOG-IN SEM TENTAR BURLAR NOSSO BANCO DE DADOS!');
        echo("<a href='index.php'>VOLTAR</a>");
    }
    else {
        echo('NÃO FOI POSSIVEL ENCONTRAR ESTE USUARIO, POR FAVOR, TENTE NOVAMENTE!');
        echo("<a href='index.php'>VOLTAR</a>");
    }
}

?>