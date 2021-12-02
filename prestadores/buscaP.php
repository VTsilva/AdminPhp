<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$clausula = $_POST['clausula'];

$status = $_POST['bstatus'];

// echo "<center>" . $status . "</center>";

if ($clausula == 1) {
    $busca = $_POST['buscaid'];
} elseif ($clausula == 2) {
    $busca = $_POST['buscanome'];
} elseif ($clausula == 3) {
    $busca = $_POST['buscacnpj'];
}


$bPrestador = buscarPrest($conexao, $clausula, $busca, $inicio, $qnt_result_pg, $status);

$nBuscap = contarBusca($conexao, $clausula, $busca, $inicio, $qnt_result_pg, $status);

$quantidade_pg = quantidadePg($qnt_result_pg, contarBusca($conexao, $clausula, $busca, $inicio, $qnt_result_pg, $status));
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

    <script type="text/javascript">
        function setcla(valor) {
            if (valor == 1) {
                document.getElementById("bid").style.display = 'block';
                document.getElementById("bnom").style.display = 'none';
                document.getElementById("bcnpj").style.display = 'none';
            } else if (valor == 2) {
                document.getElementById("bid").style.display = 'none';
                document.getElementById("bnom").style.display = 'block';
                document.getElementById("bcnpj").style.display = 'none';
            } else if (valor == 3) {
                document.getElementById("bid").style.display = 'none';
                document.getElementById("bnom").style.display = 'none';
                document.getElementById("bcnpj").style.display = 'block';
            }
        }

        $(document).ready(function() {
            $('#bcnpj').mask('00.000.000/0000-00');
        });
    </script>

    <title>Prestadores de Serviços</title>
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
            <h2>BUSCA DE PRESTADORES DE SERVIÇO</h2>
        </div>

        <div class="busca">
            <form action="buscaP.php" method="post" class="frm-busca">

                <!-- STATUS -->
                <input name="bstatus" type="text" style="display: none;" value="<?php echo $status; ?>">

                <!-- CLAUSULA -->
                <select id="clausula" name="clausula" onchange="javascript:setcla(this.value);" class="combobox">
                    <option value="1" selected>Por id</option>
                    <option value="2">Por nome</option>
                    <option value="3">Por cnpj</option>
                </select>
                <!-- BUSCA POR ID -->
                <input id="bid" min=1 type="number" name="buscaid" placeholder="Insira aqui" class="search" />
                <!-- BUSCA POR NOME -->
                <input id="bnom" style="display: none;" type="text" name="buscanome" placeholder="Insira aqui" class="search" />
                <!-- BUSCA POR CNPJ -->
                <input id="bcnpj" style="display: none;" type="text" name="buscacnpj" placeholder="Insira aqui" class="search" />


                <button type="submit" name="btn-buscar" class="btn-buscar">Buscar</button>
            </form>
        </div>

        <section class="table100">
            <div class="quadro">
                <div>
                    <h3 class="qtd">Quantidade de Registros Achados: <?php echo implode(",", $nBuscap); ?></h3>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">NOME</th>
                            <th class="column3">CNPJ</th>
                            <th class="column4">EMAIL</th>
                            <th class="column5">TEL</th>
                            <th class="column6">CEP</th>
                            <th class="column3">STATUS</th>
                            <th class="column2">IMG</th>
                            <th></th>
                        </tr>
                    </thead>

                    <?php foreach ($bPrestador as $prestador) : ?>
                        <tr>
                            <form action="verPrest.php" method="post">
                                <td class="column1"> <input type="text" name="id" value="<?php echo $prestador['id']; ?>"></td>
                                <td class="column2"> <?php echo $prestador['nome']; ?> </td>
                                <td class="column3"> <?php echo $prestador['cnpj']; ?> </td>
                                <td class="column4"> <?php echo $prestador['email']; ?> </td>
                                <td class="column5"> <?php echo $prestador['tel']; ?> </td>
                                <td class="column6"> <?php echo $prestador['cep']; ?> </td>
                                <td class="column3"> <?php echo $prestador['status']; ?> </td>
                                <td class="column2"> <?php echo $prestador['img']; ?> </td>

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