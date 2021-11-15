<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/styles.css">

    <title>VulCar Adm Home</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <div class="img menu-side-bar"><img src="./img/car-white.svg" alt=""></div>
            <div class="logo-name">VulCar</div>
        </div>
        <ul class="nav-links">
            <li>
                <a href="home.php">
                    <span class="icon"><img src="./img/ic-home.svg" alt=""></span>
                    <span class="link-name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="home.php" class="link-name">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="./clientes/cliente.php">
                        <span class="icon"><img src="./img/ic-cliente.png" alt=""></span>
                        <span class="link-name">Clientes</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="./clientes/cliente.php">Clientes</a></li>
                    <li><a href="./clientes/ativos.php">Ativos</a></li>
                    <li><a href="./clientes/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="./prestadores/prestador.php">
                        <span class="icon"><img src="./img/ic-prestador.png" alt=""></span>
                        <span class="link-name">Prestadores</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="./prestadores/prestador.php">Prestadores</a></li>
                    <li><a href="./prestadores/ativos.php">Ativos</a></li>
                    <li><a href="./prestadores/analise.php">Em Análise</a></li>
                    <li><a href="./prestadores/recusados.php">Recusados</a></li>
                    <li><a href="./prestadores/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="./img/profile2.png" alt="">
                    </div>
                    <div class="name-job">
                        <div class="profile-name">Daniel556</div>
                        <div class="job">Web Designer</div>
                    </div>
                    <a href="./index.php"><span class="material-icons icon logout">logout</span></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <h3>PHP server version: 7.3.21</h3>
        <h3>MySQL WorkBench server version: 8.0.21</h3>
        <h3>Vulcar ADM Sys version: 4.3.21</h3>
    </section>

    <script src="js/animacao.js"></script>
</body>

</html>