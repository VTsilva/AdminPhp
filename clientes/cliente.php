<?php
include('../php/conexao.php');
include('../php/funcoesCli.php');

$num = contarCliente($conexao);
$clientes = listarCliente($conexao, $inicio, $qnt_result_pg);
$quantidade_pg = quantidadePg($qnt_result_pg, contarCliente($conexao));
$page_name = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="pt-br" ng-app="cliente">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>Clientes</title>
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
                    <a href="cliente.php">
                        <span class="icon"><img src="./../img/ic-cliente.png" alt=""></span>
                        <span class="link-name">Clientes</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="cliente.php">Clientes</a></li>
                    <li><a href="ativos.php">Ativos</a></li>
                    <li><a href="banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="./../prestadores/prestador.php">
                        <span class="icon"><img src="./../img/ic-prestador.png" alt=""></span>
                        <span class="link-name">Prestadores</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="./../prestadores/prestador.php">Prestadores</a></li>
                    <li><a href="./../prestadores/ativos.php">Ativos</a></li>
                    <li><a href="./../prestadores/analise.php">Em Análise</a></li>
                    <li><a href="./../prestadores/recusados.php">Recusados</a></li>
                    <li><a href="./../prestadores/banidos.php">Banidos</a></li>
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
                    <a href="../index.php"><span class="material-icons icon logout">logout</span></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="outdoor">
            <h2>Clientes Cadastrados</h2>
        </div>

        <div class="busca">
            <form action="buscac.php" method="post" class="frm-busca">
                <select name="clausula" class="combobox">
                    <option value="1" selected>Por id</option>
                    <option value="2">Por nome</option>
                    <option value="3">Por cpf</option>
                </select>
                <input type="text" name="busca" placeholder="Insira aqui" class="search" />
                <button type="submit" name="btn-buscar" class="btn-buscar">Buscar</button>
            </form>
        </div>

        <section class="table100">
            <div class="quadro">
                <div>
                    <h3 class="qtd">Quantidade de Cliente Cadastrados: <?php echo implode(",", $num); ?> </h3>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">NOME</th>
                            <th class="column3">CPF</th>
                            <th class="column4">TEL</th>
                            <th class="column5">STATUS</th>
                            <th class="column6">IMG</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach ($clientes as $cliente) : ?>
                        <tr>
                            <form action="verCli" method="post">
                                <td class="column1"> <input type="text" name="id" value="<?php echo $cliente['id']; ?>"> </td>
                                <td class="column2"> <?php echo $cliente['nome']; ?> </td>
                                <td class="column3"> <?php echo $cliente['cpf']; ?> </td>
                                <td class="column4"> <?php echo $cliente['tel']; ?> </td>
                                <td class="column5"> <?php echo $cliente['status']; ?> </td>
                                <td class="column6"> <?php echo $cliente['img']; ?> </td>

                                <td>
                                    <button type="submit" name="btn-verP" id="botao">Ver</button>
                                </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
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