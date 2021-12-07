<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$id = $_COOKIE['idPrest'];

$orcamentos = vOrcaP($conexao, $id, $inicio, $qnt_result_pg);

$nOrca = contarOrca($conexao, $id);

$quantidade_pg = quantidadePg($qnt_result_pg, contarOrca($conexao, $id));
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
    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>

    <title>Prestadores de Serviços - Orçamentos</title>


    <script type="text/javascript">
        function setcla(valor) {
            if (valor == 1) {
                document.getElementById("bid").style.display = 'block';
                document.getElementById("bsta").style.display = 'none';
                document.getElementById("bdat").style.display = 'none';
            } else if (valor == 2) {
                document.getElementById("bid").style.display = 'none';
                document.getElementById("bsta").style.display = 'block';
                document.getElementById("bdat").style.display = 'none';
            } else if (valor == 3) {
                document.getElementById("bid").style.display = 'none';
                document.getElementById("bsta").style.display = 'none';
                document.getElementById("bdat").style.display = 'block';
            }
        }

        $(document).ready(function() {
            $('#bdat').mask('0000-00-00 00:00:00');
        });
    </script>
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
            <form action="buscaO.php" method="post" class="frm-busca">
                <!-- id da loja -->
                <input type="text" style="display: none;" name="idLoja" value="<?php echo $id; ?>">

                <!-- Clausula da query -->
                <select id="clausula" onchange="javascript:setcla(this.value);" name="clausula" class="combobox">
                    <option value="1" selected>Por id</option>
                    <option value="2">Por status</option>
                    <option value="3">Por Data</option>
                </select>

                <!-- Pesquisa por ID dos orçamentos -->
                <input type="number" min=1 id="bid" name="buscaid" placeholder="Insira aqui" class="search" />

                <!-- Pesquisa por Statos dos orçamentos -->
                <select name="buscasta" id="bsta" style="display: none;" class="search">
                    <option value="Recusado" selected>Recusado</option>
                    <option value="Em espera">Em espera</option>
                    <option value="Em andamento">Em andamento</option>
                    <option value="Concluido">Concluido</option>
                </select>

                <!-- Pesquisa pela data dos orçamentos -->
                <input type="text" style="display: none;" id="bdat" name="buscadat" placeholder="Insira aqui" class="search" />

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
                                <td class="column4"> <?php echo $orcamento['nomecliente']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['idcliente']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['nomeloja']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['idloja']; ?></td>
                                <td class="column4"> <?php echo $orcamento['status']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['valor']; ?> </td>
                                <td class="column1"> <?php echo $orcamento['avaliacao']; ?> </td>
                                <td class="column4"> <?php echo $orcamento['data']; ?> </td>

                                <td> <button type="submit" name="btn-verP" id="botao">Ver</button> </td>
                            </form>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <div class="vorca">
                    <button class="btn-funcao" onclick="location.href = document.referrer">Voltar</button>
                </div>

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