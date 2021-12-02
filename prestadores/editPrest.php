<?php
include('../php/conexao.php');
include("../php/funcoesPrest.php");

$id = $_COOKIE['idPrest'];

$vPrestador = verPrestEdit($conexao, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/editPrest.css">

    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>

    <script>
        $(document).ready(function() {
            $('#ufPrest').mask('SS');
            $('#cnpjPrest').mask('00.000.000/0000-00');
            $('#telPrest').mask('(00) 00000-0000');
            $('#cepPrest').mask('00000-000');
        });
    </script>

    <title>Editar prestador</title>
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
            <h2>Editar Prestador de Serviços</h2>
        </div>

        <center>
            <form action="../php/verificacao.php" method="post">
                <input id="idPrest" type="text" name="idPrest" disabled required value="<?php echo $vPrestador['id'];?>">
                <input id="cnpjPrest" type="text" name="cnpjPrest" required value="<?php echo $vPrestador['cnpj'];?>">
                <input id="nomePrest" type="text" name="nomePrest" required value="<?php echo $vPrestador['nome'];?>">
                <input id="emailPrest" type="email" name="emailPrest" required value="<?php echo $vPrestador['email'];?>">
                <input id="telPrest" type="text" name="telPrest" required value="<?php echo $vPrestador['tel'];?>">
                <input id="senhaPrest" type="text" name="senhaPrest" required value="<?php echo $vPrestador['senha'];?>">
                <input id="cepPrest" type="text" name="cepPrest" required value="<?php echo $vPrestador['cep'];?>">
                <input type="text" name="endPrest" required value="<?php echo $vPrestador['end'];?>">
                <input type="text" name="numPrest" required value="<?php echo $vPrestador['num'];?>">
                <input type="text" name="compPrest" value="<?php echo $vPrestador['comp'];?>">
                <input type="text" name="bairroPrest" required value="<?php echo $vPrestador['bairro'];?>">
                <input type="text" name="cidadePrest" required value="<?php echo $vPrestador['cidade'];?>">
                <input id="ufPrest" type="text" name="ufPrest" required value="<?php echo $vPrestador['uf'];?>">

                <button type="submit" name="btn-editPrest" class="btn-funcao">Salvar</button>

            </form>    
        </center>
    </section>
    
</body>
</html>