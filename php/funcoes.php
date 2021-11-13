<?php

function logup($conexao, $login, $password)
{

    $sql = "select * from TB_ADMIN where TB_ADMIN_USER = '$login' and TB_ADMIN_SENHA = '$password';";

    $return =  mysqli_query($conexao, $sql);

    $rows = mysqli_fetch_array($return);
    if ($rows) {
        header('Location: ../home.php');
    } else {
        echo ('NÃO FOI POSSIVEL ENCONTRAR ESTE USUARIO, POR FAVOR, TENTE NOVAMENTE!');
        echo ("<a href='javascript:history.back()'>VOLTAR</a>");
    }
}
