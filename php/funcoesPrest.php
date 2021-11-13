<?php

// 
// TODOS OS PRESTADORES
// 
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

// 
// APENAS OS PRESTADORES ATIVOS 
// 
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

// 
// APENAS OS PARA ANALISE
// 
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

// 
// APENAS OS RECUSADOS
// 

function contarRecusados($conexao)
{
    $sql = "
            select count(tb_loja_id)
            from tb_loja
            inner join tb_status
            on tb_status.tb_status_id = tb_loja.tb_status_id
            where tb_status.tb_status_nome = 'recusado'";

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

// 
// APENAS OS PRESTADORES BANIDOS
// 
function contarBanidos($conexao)
{
    $sql = "
            select count(tb_loja_id)
            from tb_loja
            inner join tb_status
            on tb_status.tb_status_id = tb_loja.tb_status_id
            where tb_status.tb_status_nome = 'banido'";

    $query = mysqli_query($conexao, $sql);

    $nBanido = mysqli_fetch_assoc($query);

    return $nBanido;
}

function prestBanidos($conexao)
{
    $banidos = array();
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
        where tb_status.tb_status_nome = 'banido';";

    $query = mysqli_query($conexao, $sql);

    while ($banido = mysqli_fetch_assoc($query)) {
        array_push($banidos, $banido);
    }

    return $banidos;
}

// 
// BOTÕES DAS TELAS DO PRESTADOR
// 
function aceitarPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 1
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    echo "Prestador aceito com sucesso. <a href='javascript:history.back()'>Voltar</a>";
}

function recusarPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 2
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    echo "Prestador recusado com sucesso. <a href='javascript:history.back()'>Voltar</a>";
}

function banirPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 5
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    echo "Prestador banido com sucesso. <a href='javascript:history.back()'>Voltar</a>";
}

function desbanirPrest($conexao, $id)
{
    $sql = "update tb_loja
            set tb_status_id = 1
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    echo "Prestador desbanido com sucesso. <a href='javascript:history.back()'>Voltar</a>";
}

function verPrestador($conexao, $id)
{
    $vPrestadores = array();

    $sql = "select * from seleciona_loja where id = '$id';";

    $vPrestadores = mysqli_query($conexao, $sql);

    return mysqli_fetch_assoc($vPrestadores);
}
