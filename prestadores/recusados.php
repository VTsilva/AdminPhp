<?php
    include('../php/conexao.php');
    include('../php/funcoes.php');

    $nRecusado = contarRecusados($conexao);
    $recusados = prestRecusado($conexao);

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

        <title>Prestadores Recusados</title>
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
                        <li><a href="#" class="link-name">Home</a></li>
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
                        <li><a href="#">Ativos</a></li>
                        <li><a href="#">Banidos</a></li>
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
                        <li><a href="#">Banidos</a></li>
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
                <div class="quadro">
                    <div>
                        <h3>Quantidade de Prestadores Ativos Cadastrados: <?php echo implode(",", $nRecusado); ?> </h3>
                    </div>

                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>CNPJ</th>
                            <th>EMAIL</th>
                            <th>TEL</th>
                            <th>CEP</th>
                            <th>STATUS</th>
                            <th>IMG</th>
                        </tr>

                        <?php foreach ($recusados as $recusado) : ?>

                            <tr>
                                <td> <?php echo $recusado['id']; ?> </td>
                                <td> <?php echo $recusado['nome']; ?> </td>
                                <td> <?php echo $recusado['cnpj']; ?> </td>
                                <td> <?php echo $recusado['email']; ?> </td>
                                <td> <?php echo $recusado['tel']; ?> </td>
                                <td> <?php echo $recusado['cep']; ?> </td>
                                <td> <?php echo $recusado['status']; ?> </td>
                                <td> <?php echo $recusado['img']; ?> </td>
                            </tr>

                        <?php endforeach; ?>

                    </table>
                </div>
            </section>
        </section>

        <script src="./../js/animacao.js"></script>
    </body>
</html>