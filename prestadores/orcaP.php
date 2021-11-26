<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$id = $_POST['id'];

if (!$id) {
    echo "Orçamentos não encontrados. <a href='./../prestadores/prestador.php'>VOLTAR</a>";
}

$orcamentos = vOrcaP($conexao, $id);

$nOrca = contarOrca($conexao, $id);

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

    <title>Prestadores de Serviços - Orçamentos</title>
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
            <h2>ORÇAMENTOS</h2>
        </div>

        <div class="busca">
            <form action="buscaOrca.php" method="post" class="frm-busca">
                <select name="clausula" class="combobox">
                    <option value="1" selected>Por cliente</option>
                    <option value="2">Por id</option>
                    <option value="3">Por avaliação</option>
                    <option value="4">Por status</option>
                </select>
                <input style="display: ;" type="number" name="abc" placeholder="Insira o numero aq" class="search" />
                <input style="display: none;" type="text" name="busca" placeholder="Insira aqui" class="search" />
                <button type="submit" name="btn-buscar" class="btn-buscar">Buscar</button>
            </form>
        </div>

        <section class="table100">
            <div class="quadro">
                <div>
                    <h3 class="qtd">Quantidade de Orçamentos realizados: <?php echo implode(",", $nOrca) ?></h3>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID </th>
                            <th class="column4">CLIENTE</th>
                            <th class="column4">ID CLIENTE</th>
                            <th class="column4">LOJA</th>
                            <th class="column4">ID <br> LOJA</th>
                            <th class="column4">STATUS</th>
                            <th class="column4">VALOR TOTAL</th>
                            <th class="column4">AVALIAÇÃO</th>
                            <th class="column4">DATA</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach ($orcamentos as $orcamento) : ?>
                        <tr>
                            <form action="verOrca.php" method="post">
                                <td class="column1"> <input type="text" name="idOrca" value="<?php echo $orcamento['id']; ?>"></td>
                                <td class="column4"> <?php echo $orcamento['cliente']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['idCliente']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['loja']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['idLoja']; ?>"></td>
                                <td class="column4"> <?php echo $orcamento['status']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['valorTotal']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['avaliacao']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['data']; ?> </td>

                                <td> <button type="submit" name="btn-verP" id="botao">Ver</button> </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </table>

            </div>
        </section>
    </section>
    <script src="./../js/animacao.js"></script>
</body>

</html>