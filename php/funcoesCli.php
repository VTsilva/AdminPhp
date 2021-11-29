<?php

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
                   tb_status.tb_status_nome as 'status',
                   tb_cliente.tb_cliente_img as 'img'
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id;";

    $query = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_assoc($query)) {
        array_push($clientes, $cliente);
    }

    return $clientes;
}


function contarBanido($conexao)
{
    $sql = "select count(tb_cliente_id)
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id
            where tb_status.tb_status_nome = 'banido';";

    $query = mysqli_query($conexao, $sql);

    $num = mysqli_fetch_assoc($query);

    return $num;
}

function clienteBanido($conexao)
{
    $clientes = array();
    $sql = "select tb_cliente.tb_cliente_id as 'id',
	            tb_cliente.tb_cliente_nome as 'nome',
                tb_cliente.tb_cliente_cpf as 'cpf',
                tb_cliente.tb_cliente_tel as 'tel',
                tb_status.tb_status_nome as 'status',
                tb_cliente.tb_cliente_img as 'img'
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id
            where tb_status.tb_status_nome = 'banido';";

    $query = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_assoc($query)) {
        array_push($clientes, $cliente);
    }

    return $clientes;
}

function buscarCli($conexao, $clausula, $busca)
{
    $bCliente = array();
    $clausula = $clausula;

    if ($clausula == '1') {
        $sql = "select * from selecionar_cliente where id = '$busca';";
    } elseif ($clausula == '2') {
        $sql = "select * from selecionar_cliente where nome like '%$busca%';";
    } elseif ($clausula == '3') {
        $sql = "select * from selecionar_cliente where cpf = '$busca';";
    }

    $query = mysqli_query($conexao, $sql);

    while ($bCli = mysqli_fetch_assoc($query)) {
        array_push($bCliente, $bCli);
    }
    return $bCliente;
}

function contarBuscaC($conexao, $clausula, $busca)
{
    $clausula = $clausula;

    if ($clausula == '1') {
        $sql = "select count(id) from selecionar_cliente where id = '$busca';";
    } elseif ($clausula == '2') {
        $sql = "select count(id) from selecionar_cliente where nome like '%$busca%';";
    } elseif ($clausula == '3') {
        $sql = "select count(id) from selecionar_cliente where cpf = '$busca';";
    }

    $query = mysqli_query($conexao, $sql);

    $nBuscac = mysqli_fetch_assoc($query);

    return $nBuscac;
}


function verCliente($conexao, $idCli)
{
    $vCliente = array();

    $sql = "select * from selecionar_cliente where id = '$idCli';";

    $vCliente = mysqli_query($conexao, $sql);

    return mysqli_fetch_assoc($vCliente);
}

function buscarAuto($conexao, $id)
{
    $automoveis = array();

    $sql = "select tb_automovel.tb_automovel_id as 'id',
                   tb_marca.tb_marca_nome as 'marca',
                   tb_modelo.tb_modelo_nome as 'modelo',
                   tb_automovel.tb_automovel_cor as 'cor',
                   tb_categoria.tb_categoria_nome as 'categoria'
            from tb_automovel
            inner join tb_marca
            on tb_marca.tb_marca_id = tb_automovel.tb_marca_id
            inner join tb_modelo
            on tb_modelo.tb_modelo_id = tb_automovel.tb_modelo_id
            inner join tb_categoria
            on tb_categoria.tb_categoria_id = tb_automovel.tb_categoria_id
            where tb_automovel.tb_cliente_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    while ($automovel = mysqli_fetch_assoc($query)) {
        array_push($automoveis, $automovel);
    }

    return $automoveis;
}

function contarAuto($conexao, $id)
{

    $sql = "select count(tb_automovel_id)
            from tb_automovel
            where tb_automovel.tb_cliente_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    $nAuto = mysqli_fetch_assoc($query);

    return $nAuto;
}

function clienteAtivo($conexao)
{
    $clientes = array();
    $sql = "select tb_cliente.tb_cliente_id as 'id',
	            tb_cliente.tb_cliente_nome as 'nome',
                tb_cliente.tb_cliente_cpf as 'cpf',
                tb_cliente.tb_cliente_tel as 'tel',
                tb_status.tb_status_nome as 'status',
                tb_cliente.tb_cliente_img as 'img'
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id
            where tb_status.tb_status_nome = 'ativo';";

    $query = mysqli_query($conexao, $sql);

    while ($cliente = mysqli_fetch_assoc($query)) {
        array_push($clientes, $cliente);
    }

    return $clientes;
}

function contarAtivo($conexao)
{
    $sql = "select count(tb_cliente_id)
            from tb_cliente
            inner join tb_status
            on tb_status.tb_status_id = tb_cliente.tb_status_id
            where tb_status.tb_status_nome = 'ativo';";

    $query = mysqli_query($conexao, $sql);

    $num = mysqli_fetch_assoc($query);

    return $num;
}

function banirCli($conexao, $id)
{

    $sql = "update tb_cliente
            set tb_status_id = 5
            where tb_cliente_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    return $mensagem = "Cliente banido com sucesso. <a href='../clientes/cliente.php'>Voltar</a>";
}

function desbanirCli($conexao, $id)
{
    $sql = "update tb_cliente
            set tb_status_id = 6
            where tb_cliente_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    return $mensagem = "Cliente desbanido com sucesso. <a href='../clientes/cliente.php'>Voltar</a>";
}
