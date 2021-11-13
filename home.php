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
        <div class="sidebar">
            <div class="logo-details">
                <div class="img"><img src="./img/car-white.svg" alt=""></div>
                <div class="logo-name">VulCar</div>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">
                    <span class="icon"><img src="./img/ic-home.svg" alt=""></span>
                        <span class="link-name">Home</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a href="#" class="link-name">Home</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <span class="material-icons icon">groups</span>
                            <span class="link-name">Clientes</span>
                        </a>
                        <span class="material-icons icon seta">expand_more</span>  
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link-name" href="#">Clientes</a></li>
                        <li><a href="#">Ativos</a></li>
                        <li><a href="#">Banidos</a></li>
                    </ul>
                </li>
                <li>
                    <div class="icon-link">
                        <a href="#">
                            <span class="material-icons icon">engineering</span>
                            <span class="link-name">Prestadores</span>
                        </a>
                        <span class="material-icons icon seta">expand_more</span>  
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link-name" href="#">Prestadores</a></li>
                        <li><a href="#">Ativos</a></li>
                        <li><a href="#">Em Análise</a></li>
                        <li><a href="#">Recusados</a></li>
                        <li><a href="#">Banidos</a></li>
                    </ul>
                </li>
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <img src="./img/profile.jpg" alt="">
                        </div>
                        <div class="name-job">
                            <div class="profile-name">Daniel556</div>
                            <div class="job">Web Designer</div>
                        </div>
                        <span class="material-icons icon logout">logout</span>
                    </div>
                </li>
            </ul>
        </div>

        <section class="home-section">
            <div class="home-content">
                <span class="material-icons menu-side-bar">menu</span>
                <span class="text">Drop Down</span>
            </div>
        </section>

        <!-- <div class="div">
            <ul class="menu">
                <li><a href="./home.php">Home</a></li>
                <li><a href="./Cliente/cliente.php">Clientes</a></li>
                <li><img src="./img/carro.png" class="img-logo">
                <li><a href="./Prestador/prestador.php">Prestadores</a>
                    <ul class="sub-menu">
                        <li><a href="./Prestador/ativos.php">Ativos</a></li>
                        <li><a href="./Prestador/analise.php">Para Análise</a></li>
                        <li><a href="./Prestador/recusados.php">Recusadas</a></li>
                    </ul>
                </li>
                <li><a href="./index.php">Sair</a></li>
            </ul>
        </div> -->
        <script type="text/javascript">
            let seta = document.querySelectorAll(".seta");
            console.log(seta);
            for (var i = 0; i < seta.length; i++) {
                seta[i].addEventListener("click", (e) => {
                    let arrowParent = e.target.parentElement.parentElement;
                    console.log(arrowParent);
                    arrowParent.classList.toggle("showMenu");
                });
            }

            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".menu-side-bar");
            
            sidebarBtn.addEventListener("click", (e) => {
                console.log(e);
                sidebar.classList.toggle("close");
            });
            console.log(sidebar);
        </script>
    </body>
</html>