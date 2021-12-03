<?php
include('../php/conexao.php');
include('../php/funcoesCli.php');

$id = $_COOKIE['idCli'];

$eClies = verCliEdit($conexao, $id);

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

        <div class="outdoor">
            <h2>Editar Cliente</h2>
        </div>

        <section>
            <center>
                <form action="../php/verificacao.php" method="post">
                    <input type="text" disabled name="teste" value="<?php echo $eClies['id']; ?>">
                    <input type="text" style="display: none;" name="id" value="<?php echo $eClies['id']; ?>">
                    <input type="text" name="nome" value="<?php echo $eClies['nome']; ?>">
                    <input type="text" name="cpf" value="<?php echo $eClies['cpf']; ?>">
                    <input type="text" name="email" value="<?php echo $eClies['email']; ?>">
                    <input type="text" name="tel" value="<?php echo $eClies['tel']; ?>">
                    <input type="text" name="senha" value="<?php echo $eClies['senha']; ?>">
                    <input type="text" name="ende" value="<?php echo $eClies['ende']; ?>">
                    <input type="text" name="num" value="<?php echo $eClies['num']; ?>">
                    <input type="text" name="comp" value="<?php echo $eClies['comp']; ?>">
                    <input type="text" name="bairro" value="<?php echo $eClies['bairro']; ?>">
                    <input type="text" name="cidade" value="<?php echo $eClies['cidade']; ?>">
                    <input type="text" name="uf" value="<?php echo $eClies['uf']; ?>">
                    <input type="text" name="cep" value="<?php echo $eClies['cep']; ?>">

                    <button type="submit" name="btn-editCli" class="btn-funcao">Salvar</button>
                </form>
                <div>
                    <button class="btn-funcao"><a href="verCli.php"> Cancelar</a></button>
                </div>
            </center>
        </section>

    </section>
    <script src="./../js/animacao.js"></script>
</body>

</html>