<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$idOrca = $_POST['idOrca'];

$orcamentos = vOrca($conexao, $idOrca, $inicio, $qnt_result_pg);
$detalhaOrcas = detalhaOrca($conexao, $idOrca, $inicio, $qnt_result_pg);
$nDetalhe = contaDetalhe($conexao, $idOrca);
$quantidade_pg = quantidadePg($qnt_result_pg, contaDetalhe($conexao, $idOrca));
$page_name = basename($_SERVER['PHP_SELF']);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>Detalhes dos Orçamentos</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <div class="img menu-side-bar"><img src="./../img/car-white.svg" alt=""></div>
            <div class="logo-name">VulCar</div>
        </div>
        <ul class="nav-links">
            <li>
                <a href="./../home.php">
                    <span class="icon"><img src="./../img/ic-home.svg" alt=""></span>
                    <span class="link-name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="./../home.php" class="link-name">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="./../clientes/cliente.php">
                        <span class="icon"><img src="./../img/ic-cliente.png" alt=""></span>
                        <span class="link-name">Clientes</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="./../clientes/cliente.php">Clientes</a></li>
                    <li><a href="./../clientes/ativos.php">Ativos</a></li>
                    <li><a href="./../clientes/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="prestador.php">
                        <span class="icon"><img src="./../img/ic-prestador.png" alt=""></span>
                        <span class="link-name">Prestadores</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="prestador.php">Prestadores</a></li>
                    <li><a href="ativos.php">Ativos</a></li>
                    <li><a href="analise.php">Em Análise</a></li>
                    <li><a href="recusados.php">Recusados</a></li>
                    <li><a href="banidos">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="./../img/profile2.png" alt="">
                    </div>
                    <div class="name-job">
                        <div class="profile-name">Daniel556</div>
                        <div class="job">Web Designer</div>
                    </div>
                    <a href="./../index.php"><span class="material-icons icon logout">logout</span></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">

        <div class="outdoor">
            <h2>PRESTADOR DE SERVIÇOS</h2>
        </div>

        <section class="verp-section">
            <section class="table100">
                <section class="info">
                    <div class="quadro-info">
                        <?php foreach ($orcamentos as $orcamento) : ?>
                            <p> ID do Orcamento: <b> <?php echo $orcamento['id'] ?> </b> </p> <br>
                            <p> Cliente: <b> <?php echo $orcamento['cliente'] ?></b></p> <br>
                            <p> ID do Cliente: <b> <?php echo $orcamento['idCliente'] ?></b></p> <br>
                            <p> Prestador: <b> <?php echo $orcamento['loja'] ?></b></p> <br>
                            <p> ID do Prestador: <b> <?php echo $orcamento['idLoja'] ?></b></p> <br>
                            <p> Status: <b> <?php echo $orcamento['status'] ?></b></p> <br>
                            <p> Valor Total: <b> <?php echo $orcamento['valorTotal'] ?></b></p> <br>
                            <p> Avaliação(0-5, estrelas): <b> <?php echo $orcamento['avaliacao'] ?></b></p> <br>
                            <p> Data da Realização: <b> <?php echo $orcamento['data'] ?></b></p> <br>
                        <?php endforeach; ?>

                        <div class="vorca">
                            <div class='btn-voltar'>
                                <button type='submit' class='btn-funcao' onclick="javascript:history.back()">Voltar</button>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="quadro">
                    <div>
                        <h3 class="qtd">Quantidade de Serviços prestados: <?php echo implode(",", $nDetalhe); ?></h3>
                    </div>

                    <table class="table">
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">ID do Orçamento</th>
                                <th class="column2">Serviço Prestado</th>
                                <th class="column3">Veículo</th>
                                <th class="column4">ID Fun</th>
                                <th class="column5">Funcionario</th>
                            </tr>
                        </thead>
                        <?php foreach ($detalhaOrcas as $detalhaOrca) : ?>
                            <tr>
                                <td class="column1"> <input type="text" name="id" value="<?php echo $detalhaOrca['idOrca']; ?>"></td>
                                <td class="column2"> <?php echo $detalhaOrca['servico']; ?> </td>
                                <td class="column3"> <?php echo $detalhaOrca['veiculo']; ?> </td>
                                <td class="column4"> <?php echo $detalhaOrca['idFun']; ?> </td>
                                <td class="column5"> <?php echo $detalhaOrca['funcionario']; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                </div>
            </section>
        </section>
    </section>

    <script src="./../js/animacao.js"></script>

    <?php
    if ($quantidade_pg > 1) {
        include('../php/menuPaginas.php');
    } else {
        die;
    }

    ?>
</body>

</html>