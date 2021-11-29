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

    return $mensagem = "Prestador aceito com sucesso. <a href='../prestadores/prestador.php' class='btn-back'>Voltar</a>";
}

function recusarPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 2
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);


    return $mensagem = "Prestador recusado com sucesso. <a href='../prestadores/prestador.php' class='btn-back'>Voltar</a>";
}

function banirPrest($conexao, $id)
{

    $sql = "update tb_loja
            set tb_status_id = 5
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    return $mensagem = "Prestador banido com sucesso. <a href='../prestadores/prestador.php'>Voltar</a>";
}

function desbanirPrest($conexao, $id)
{
    $sql = "update tb_loja
            set tb_status_id = 1
            where tb_loja_id = '$id';";

    $query = mysqli_query($conexao, $sql);

    return $mensagem = "Prestador aceito com sucesso. <a href='../prestadores/prestador.php'>Voltar</a>";
}

function verPrestador($conexao, $id)
{
    $vPrestadores = array();

    $sql = "select * from seleciona_loja where id = '$id';";

    $vPrestadores = mysqli_query($conexao, $sql);

    return mysqli_fetch_assoc($vPrestadores);
}

function buscarPrest($conexao, $clausula, $busca)
{
    $bPrestador = array();
    $clausula = $clausula;

    if ($clausula == '1') {
        $sql = "select * from seleciona_loja where id =  '$busca';";
    } elseif ($clausula == '2') {
        $sql = "select * from seleciona_loja where nome like '%$busca%';";
    } elseif ($clausula == '3') {
        $sql = "select * from seleciona_loja where cnpj = '$busca';";
    }

    $query = mysqli_query($conexao, $sql);

    while ($bPrest = mysqli_fetch_assoc($query)) {
        array_push($bPrestador, $bPrest);
    }
    return $bPrestador;
}

function contarBusca($conexao, $clausula, $busca)
{
    $clausula = $clausula;

    if ($clausula == '1') {
        $sql = "select count(id) from seleciona_loja where id =  '$busca';";
    } elseif ($clausula == '2') {
        $sql = "select count(id) from seleciona_loja where nome like '%$busca%';";
    } elseif ($clausula == '3') {
        $sql = "select count(id) from seleciona_loja where cnpj = '$busca';";
    }

    $query = mysqli_query($conexao, $sql);

    $nBuscap = mysqli_fetch_assoc($query);

    return $nBuscap;
}


function buscarFuncionario($conexao, $idLoja)
{
    $funcionarios = array();

    $sql = "select tb_funcionario.tb_funcionario_id as 'id',
	               tb_funcionario.tb_funcionario_nome as 'nome',
	               tb_funcionario.tb_funcionario_cpf as 'cpf',
                   tb_loja.tb_loja_nome as 'loja',
                   tb_status.tb_status_nome as 'status'
	        from tb_funcionario
	        inner join tb_loja
            on tb_loja.tb_loja_id = tb_funcionario.tb_loja_id
            inner join tb_status
            on tb_status.tb_status_id = tb_funcionario.tb_status_id
            where tb_funcionario.tb_loja_id = '$idLoja';";

    $query = mysqli_query($conexao, $sql);

    while ($funcionario = mysqli_fetch_assoc($query)) {
        array_push($funcionarios, $funcionario);
    }

    return $funcionarios;
}

function contarFuncionario($conexao, $idLoja)
{

    $sql = "select count(tb_funcionario.tb_funcionario_id)
	        from tb_funcionario
            where tb_funcionario.tb_loja_id = '$idLoja';";

    $query = mysqli_query($conexao, $sql);

    $nFuncionarios = mysqli_fetch_assoc($query);

    return $nFuncionarios;
}


function vOrca($conexao, $idOrca)
{
    $vOrca = array();

    $sql = "select tb_orcamento.tb_orcamento_id as 'id',
                   tb_cliente.tb_cliente_nome as 'cliente',
                   tb_cliente.tb_cliente_id as 'idCliente', 
                   tb_loja.tb_loja_nome as 'loja',
                   tb_loja.tb_loja_id as 'idLoja',
                   tb_status.tb_status_nome as 'status',
                   tb_total.tb_total_valor as 'valorTotal',
                   tb_avaliacao.tb_avaliacao_indice as 'avaliacao',
                   tb_orcamento.tb_orcamento_dt as 'data'
            from tb_orcamento
            inner join tb_cliente
            on tb_cliente.tb_cliente_id = tb_orcamento.tb_orcamento_id
            inner join tb_loja
            on tb_loja.tb_loja_id = tb_orcamento.tb_loja_id
            inner join tb_status
            on tb_status.tb_status_id = tb_orcamento.tb_status_id
            inner join tb_total
            on tb_total.tb_orcamento_id = tb_orcamento.tb_orcamento_id
            inner join tb_avaliacao
            on tb_avaliacao.tb_orcamento_id = tb_orcamento.tb_orcamento_id
            where tb_orcamento.tb_orcamento_id = $idOrca;";

    $query = mysqli_query($conexao, $sql);

    while ($orca = mysqli_fetch_assoc($query)) {
        array_push($vOrca, $orca);
    }

    return $vOrca;
}

function vOrcaP($conexao, $idLoja)
{
    $vOrca = array();

    $sql = "select tb_orcamento.tb_orcamento_id as 'id',
                   tb_cliente.tb_cliente_nome as 'cliente',
                   tb_cliente.tb_cliente_id as 'idCliente', 
                   tb_loja.tb_loja_nome as 'loja',
                   tb_loja.tb_loja_id as 'idLoja',
                   tb_status.tb_status_nome as 'status',
                   tb_total.tb_total_valor as 'valorTotal',
                   tb_avaliacao.tb_avaliacao_indice as 'avaliacao',
                   tb_orcamento.tb_orcamento_dt as 'data'
            from tb_orcamento
            inner join tb_cliente
            on tb_cliente.tb_cliente_id = tb_orcamento.tb_orcamento_id
            inner join tb_loja
            on tb_loja.tb_loja_id = tb_orcamento.tb_loja_id
            inner join tb_status
            on tb_status.tb_status_id = tb_orcamento.tb_status_id
            inner join tb_total
            on tb_total.tb_orcamento_id = tb_orcamento.tb_orcamento_id
            inner join tb_avaliacao
            on tb_avaliacao.tb_orcamento_id = tb_orcamento.tb_orcamento_id
            where tb_loja.tb_loja_id = $idLoja;";

    $query = mysqli_query($conexao, $sql);

    while ($orca = mysqli_fetch_assoc($query)) {
        array_push($vOrca, $orca);
    }

    return $vOrca;
}

function contarOrca($conexao, $idLoja)
{
    $sql = "select count(tb_orcamento_id)
            from tb_orcamento
            where tb_loja_id = $idLoja;";

    $query = mysqli_query($conexao, $sql);

    $nOrca = mysqli_fetch_assoc($query);

    return $nOrca;
}

function detalhaOrca($conexao, $idOrca)
{
    $servicos = array();

    $sql = "select tb_orcamento.tb_orcamento_id as 'idOrca',
                   tb_servico.tb_servico_nome as 'servico',
                   tb_modelo.tb_modelo_nome as 'veiculo',
                   tb_itens_orc.tb_funcionario_id as 'idFun',
                   tb_funcionario.tb_funcionario_nome as 'funcionario'
            from tb_itens_orc
            inner join tb_orcamento
            on tb_orcamento.tb_orcamento_id = tb_itens_orc.tb_orcamento_id
            inner join tb_servico
            on tb_servico.tb_servico_id = tb_itens_orc.tb_servico_id
            inner join tb_automovel
            on tb_automovel.tb_automovel_id = tb_itens_orc.tb_automovel_id
            inner join tb_modelo
            on tb_modelo.tb_modelo_id = tb_automovel.tb_modelo_id
            inner join tb_funcionario
            on tb_funcionario.tb_funcionario_id = tb_itens_orc.tb_funcionario_id
            where tb_orcamento.tb_orcamento_id = $idOrca;";

    $query = mysqli_query($conexao, $sql);

    while ($servico = mysqli_fetch_assoc($query)) {
        array_push($servicos, $servico);
    }

    return $servicos;
}

function contaDetalhe($conexao, $idOrca)
{
    $sql = "select count(tb_itens_orc.tb_itens_orc_id)
            from tb_itens_orc
            inner join tb_orcamento
            on tb_orcamento.tb_orcamento_id = tb_itens_orc.tb_orcamento_id
            where tb_orcamento.tb_orcamento_id = $idOrca;";

    $query = mysqli_query($conexao, $sql);

    $nDetalhe = mysqli_fetch_assoc($query);

    return $nDetalhe;
}

/**
 *
 *
 */

function buscaOrca($conexao, $clausula, $busca, $idLoja)
{

    $bOrca = array();
    $clausula = $clausula;

    if ($clausula == '1') {
        $sql = "select * from seleciona_orca where idloja = '$idLoja' and cliente like '% $busca %';"; //cliente
    } elseif ($clausula == '2') {
        $sql = "select * from seleciona_orca where idloja = '$idLoja' and id = '$busca';"; //id do orcamento
    } elseif ($clausula == '3') {
        $sql = "select * from seleciona_orca where idloja = '$idLoja' and avaliacao = '$busca';"; //avaliação
    } elseif ($clausula == '4') {
        $sql = "select * from seleciona_orca where idloja = '$idLoja' and status = '$busca';"; //status
    }

    $query = mysqli_query($conexao, $sql);

    while ($buscaOrca = mysqli_fetch_assoc($query)) {
        array_push($bOrca, $buscaOrca);
    }

    return $bOrca;
}
