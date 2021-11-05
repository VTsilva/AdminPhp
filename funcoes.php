<?php

// function cadastrar($conexao, $nome, $email, $senha){

//     $sql = "INSERT INTO usuario VALUES(default, '$nome', '$email', '$senha');";

//     return mysqli_query($conexao, $sql);
// }

function logup($conexao, $login, $password)
{

    $sql = "select * from TB_ADMIN where TB_ADMIN_USER = '$login' and TB_ADMIN_SENHA = '$password';";

    $return =  mysqli_query($conexao, $sql);

    $rows = mysqli_fetch_array($return);
    if ($rows) {
        header('Location: home.php');
    } else {
        echo ('NÃO FOI POSSIVEL ENCONTRAR ESTE USUARIO, POR FAVOR, TENTE NOVAMENTE!');
        echo ("<a href='index.php'>VOLTAR</a>");
    }
}

function listarPrestador($conexao)
{
    $sql =
        "select tb_loja.tb_loja_id as 'id',
	        tb_loja.tb_loja_nome as 'nome',
            tb_loja.tb_loja_cnpj as 'cnpj',
            tb_loja.tb_loja_email as 'email',
            tb_loja.tb_loja_tel as 'tel',
            tb_loja.tb_loja_senha as 'senha',
            tb_loja.tb_loja_cep as 'cep',
            tb_status.tb_status_nome as 'status',
            tb_loja.tb_loja_img as 'img'
    from tb_loja
    inner join tb_status
    on tb_status.tb_status_id = tb_loja.tb_status_id;";

    $return = mysqli_query($conexao, $sql);

    $rows = mysqli_fetch_assoc($return);

    $nlinha = mysqli_num_rows($return);

    return $rows . $nlinha;
}
