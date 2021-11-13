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
                tb_status.tb_status_nome as 'status'
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
