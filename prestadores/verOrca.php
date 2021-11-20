<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$idOrca = $_POST['idOrca'];

$idLoja = $_POST['idLoja'];


$orcamentos = vOrca($conexao, $idLoja);

$detalhaOrcas = detalhaOrca($conexao, $idOrca);

$nDetalhe = contaDetalhe($conexao, $idOrca);

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
        <section class="section-table">
            <section class="info">
                <div>
                    <?php foreach ($orcamentos as $orcamento) : ?>
                        <h3>Este é o id do orcamento: <?php echo $orcamento['id'] ?></h3> <br>
                        <h3>Este é o Cliente: <?php echo $orcamento['cliente'] ?></h3> <br>
                        <h3>Este é o id do Cliente: <?php echo $orcamento['idCliente'] ?></h3> <br>
                        <h3>Este é o Prestador: <?php echo $orcamento['loja'] ?></h3> <br>
                        <h3>Este é o id do Prestador: <?php echo $orcamento['idLoja'] ?></h3> <br>
                        <h3>Este é o status do orcamento: <?php echo $orcamento['status'] ?></h3> <br>
                        <h3>Este é o valor total do orcamento: <?php echo $orcamento['valorTotal'] ?></h3> <br>
                        <h3>Este é a avaliação dos servicos prestados(0-5, estrelas): <?php echo $orcamento['avaliacao'] ?></h3> <br>
                        <h3>Este é a data do orcamento: <?php echo $orcamento['data'] ?></h3> <br>
                    <?php endforeach; ?>
                </div>
            </section>

            <div class="quadro">
                <div>
                    <h3>Quantidade de Serviços prestados: <?php echo implode(",", $nDetalhe); ?></h3>
                </div>

                <table class="table">
                    <tr>
                        <th>ID do Orçamento</th>
                        <th>Serviço Prestado</th>
                        <th>Veículo</th>
                        <th>ID Fun</th>
                        <th>Funcionario</th>
                    </tr>
                    <?php foreach ($detalhaOrcas as $detalhaOrca) : ?>
                        <tr>
                            <td> <input type="text" name="id" value="<?php echo $detalhaOrca['idOrca']; ?>"></td>
                            <td> <?php echo $detalhaOrca['servico']; ?> </td>
                            <td> <?php echo $detalhaOrca['veiculo']; ?> </td>
                            <td> <?php echo $detalhaOrca['idFun']; ?> </td>
                            <td> <?php echo $detalhaOrca['funcionario']; ?> </td>>
                        </tr>
                    <?php endforeach; ?>
            </div>
        </section>
    </section>

    <script src="./../js/animacao.js"></script>
</body>

</html>