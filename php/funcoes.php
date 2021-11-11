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
        echo ("<a href='../index.php'>VOLTAR</a>");
    }
}

function contarCliente($conexao)
{
    $sql = "select count(tb_cliente_id) as 'quantidade' from tb_cliente;";

    $query = mysqli_query($conexao, $sql);

    $num = mysqli_fetch_assoc($query);

    return $num;
}

function listarCliente($conexao)
{
    $clientes = array();
    $sql = "select tb_cliente.tb_cliente_id as 'id',
	            tb_cliente.tb_cliente_nome as 'nome',
                tb_cliente.tb_cliente_cpf as 'cpf',
                tb_cliente.tb_cliente_tel as 'tel',
                tb_status.tb_status_nome as 'status'
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id;";

    $query = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_assoc($query)) {
        array_push($clientes, $cliente);
    }

    return $clientes;
}

function contarPrestador($conexao)
{
    $sql = "select count(tb_loja_id) as 'quantidade' from tb_loja;";

    $query = mysqli_query($conexao, $sql);

    $num = mysqli_fetch_assoc($query);

    return $num;
}

function listarPrestador($conexao)
{
    $prestadores = array();
    $sql =
        "select tb_loja.tb_loja_id as 'id',
	        tb_loja.tb_loja_nome as 'nome',
            tb_loja.tb_loja_cnpj as 'cnpj',
            tb_loja.tb_loja_email as 'email',
            tb_loja.tb_loja_tel as 'tel',
            tb_loja.tb_loja_cep as 'cep',
            tb_status.tb_status_nome as 'status',
            tb_loja.tb_loja_img as 'img'
        from tb_loja
        inner join tb_status
        on tb_status.tb_status_id = tb_loja.tb_status_id;";

    $query = mysqli_query($conexao, $sql);

    while ($prestador = mysqli_fetch_assoc($query)) {
        array_push($prestadores, $prestador);
    }

    return $prestadores;
}

function contarAtivos($conexao)
{
    $sql = "
            select count(tb_loja_id)
            from tb_loja
            inner join tb_status
            on tb_status.tb_status_id = tb_loja.tb_status_id
            where tb_status.tb_status_nome = 'aceito';";

    $query = mysqli_query($conexao, $sql);

    $nAtivos = mysqli_fetch_assoc($query);

    return $nAtivos;
}

function prestAtivos($conexao)
{
    $ativos = array();
    $sql =
        "select tb_loja.tb_loja_id as 'id',
	        tb_loja.tb_loja_nome as 'nome',
            tb_loja.tb_loja_cnpj as 'cnpj',
            tb_loja.tb_loja_email as 'email',
            tb_loja.tb_loja_tel as 'tel',
            tb_loja.tb_loja_cep as 'cep',
            tb_status.tb_status_nome as 'status',
            tb_loja.tb_loja_img as 'img'
        from tb_loja
        inner join tb_status
        on tb_status.tb_status_id = tb_loja.tb_status_id
        where tb_status.tb_status_nome = 'aceito';";

    $query = mysqli_query($conexao, $sql);

    while ($ativo = mysqli_fetch_assoc($query)) {
        array_push($ativos, $ativo);
    }

    return $ativos;
}


function contarAnalise($conexao)
{
    $sql = "
            select count(tb_loja_id)
            from tb_loja
            inner join tb_status
            on tb_status.tb_status_id = tb_loja.tb_status_id
            where tb_status.tb_status_nome = 'em analise';";

    $query = mysqli_query($conexao, $sql);

    $nAnalise = mysqli_fetch_assoc($query);

    return $nAnalise;
}

function prestAnalise($conexao)
{
    $analises = array();
    $sql =
        "select tb_loja.tb_loja_id as 'id',
	        tb_loja.tb_loja_nome as 'nome',
            tb_loja.tb_loja_cnpj as 'cnpj',
            tb_loja.tb_loja_email as 'email',
            tb_loja.tb_loja_tel as 'tel',
            tb_loja.tb_loja_cep as 'cep',
            tb_status.tb_status_nome as 'status',
            tb_loja.tb_loja_img as 'img'
        from tb_loja
        inner join tb_status
        on tb_status.tb_status_id = tb_loja.tb_status_id
        where tb_status.tb_status_nome = 'em analise';";

    $query = mysqli_query($conexao, $sql);

    while ($analise = mysqli_fetch_assoc($query)) {
        array_push($analises, $analise);
    }

    return $analises;
}

function contarRecusados($conexao)
{
    $sql = "
            select count(tb_loja_id)
            from tb_loja
            inner join tb_status
            on tb_status.tb_status_id = tb_loja.tb_status_id
            where tb_status.tb_status_nome = 'recusado';";

    $query = mysqli_query($conexao, $sql);

    $nRecusado = mysqli_fetch_assoc($query);

    return $nRecusado;
}

function prestRecusado($conexao)
{
    $recusados = array();
    $sql =
        "select tb_loja.tb_loja_id as 'id',
	        tb_loja.tb_loja_nome as 'nome',
            tb_loja.tb_loja_cnpj as 'cnpj',
            tb_loja.tb_loja_email as 'email',
            tb_loja.tb_loja_tel as 'tel',
            tb_loja.tb_loja_cep as 'cep',
            tb_status.tb_status_nome as 'status',
            tb_loja.tb_loja_img as 'img'
        from tb_loja
        inner join tb_status
        on tb_status.tb_status_id = tb_loja.tb_status_id
        where tb_status.tb_status_nome = 'recusado';";

    $query = mysqli_query($conexao, $sql);

    while ($recusado = mysqli_fetch_assoc($query)) {
        array_push($recusados, $recusado);
    }

    return $recusados;
}

function aceitarPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 1
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    return "Prestador aceito com sucesso. <a href='../Prestador/analise.php'>Voltar</a>";
}
