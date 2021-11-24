<?php
include('../php/conexao.php');
include('../php/funcoesCli.php');

$id = $_POST['id'];

if (!$id) {
    echo "Cliente não encontrado. <a href='./../clientes/cliente.php'>VOLTAR</a>";
}

$vCliente = verCliente($conexao, $id);

$automoveis = buscarAuto($conexao, $id);

$nAuto = contarAuto($conexao, $id);
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

    <title>Prestadores de Serviços</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <div class="img menu-side-bar"><img src="../img/car-white.svg" alt=""></div>
            <div class="logo-name">VulCar</div>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../home.php">
                    <span class="icon"><img src="../img/ic-home.svg" alt=""></span>
                    <span class="link-name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="../home.php" class="link-name">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="cliente.php">
                        <span class="icon"><img src="../img/ic-cliente.png" alt=""></span>
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
                    <a href="../prestadores/prestador.php">
                        <span class="icon"><img src="./../img/ic-prestador.png" alt=""></span>
                        <span class="link-name">Prestadores</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="../prestadores/prestador.php">Prestadores</a></li>
                    <li><a href="../prestadores/ativos.php">Ativos</a></li>
                    <li><a href="../prestadores/analise.php">Em Análise</a></li>
                    <li><a href="../prestadores/recusados.php">Recusados</a></li>
                    <li><a href="../prestadores/banidos">Banidos</a></li>
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

        <section class="table100">
            <section class="info">
                <div>
                    <h3>Este é o id: <?php echo $vCliente['id'] ?></h3> <br>
                    <h3>Este é o nome: <?php echo $vCliente['nome'] ?></h3> <br>
                    <h3>Este é o cpf: <?php echo $vCliente['cpf'] ?></h3> <br>
                    <h3>Este é o tel: <?php echo $vCliente['tel'] ?></h3> <br>
                    <h3>Este é o status: <?php echo $vCliente['status'] ?></h3> <br>
                    <h3>Este é caminho para a img: <?php echo $vCliente['img'] ?></h3> <br>

                    <?php
                    $status = $vCliente['status'];
                    if ($status == 'ATIVO') {
                        echo "<form action='../php/verificacao.php' method='post'> 
                                 <input style='display: none' type='text' name='id' value='" . $id . "'>
                                 <button type='submit' name='btn-banirC' id='btn-funcao'> Banir </button> 
                              </form>";
                    } else {
                        echo "<form action='../php/verificacao.php' method='post'> 
                                <input style='display: none' type='text' name='id' value='" . $id . "'>
                                <button type='submit' name='btn-desbanirC' id='btn-funcao'> Desbanir </button>
                              </form>";
                    }
                    ?>
                </div>
            </section>

            <div class="quadro">
                <div>
                    <h3>Quantidade de Automoveis do cliente Cadastrados: <?php echo implode(",", $nAuto); ?></h3>
                </div>

                <table class="table">
                    <thead>
                        <tr class="table100-head">
                            <th class="column1">ID</th>
                            <th class="column2">MARCA</th>
                            <th class="column3">MODELO</th>
                            <th class="column4">COR</th>
                            <th class="column5">CATEGORIA</th>
                        </tr>
                    </thead>
                    <?php foreach ($automoveis as $automovel) : ?>
                        <tr>
                            <td class="column1"> <input type="text" name="id" value="<?php echo $automovel['id']; ?>"></td>
                            <td class="column2"> <?php echo $automovel['marca']; ?> </td>
                            <td class="column3"> <?php echo $automovel['modelo']; ?> </td>
                            <td class="column4"> <?php echo $automovel['cor']; ?> </td>
                            <td class="column5"> <?php echo $automovel['categoria']; ?> </td>
                        </tr>
                    <?php endforeach; ?>
            </div>
        </section>
    </section>

    <script src="./../js/animacao.js"></script>
</body>

</html>