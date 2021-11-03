<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a7648a74b9.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
    
     <div class="container">
        <img src="img/laranja.jpg">
         <div class="content first-content">
             <div class="first-column">
                 <h2 class="title title-primary">Bem Vindo de Volta</h2>
                 <p class="description description-primary">Para se manter conectado</p>
                 <p class="description  description-primary">por favor, logue com suas informações pessoais</p>
                 <button id="signin" class="btn btn-primary">Login</button>
             </div> <!--first column-->
             <div class="second-column">
                 <h2 class="title title-second">Crie sua conta</h2>
                 <div class="social-media">
                     <ul class="list-social">
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                     </ul>
                 </div>
                 <p class="description description-second">ou utilize seu email para o registro</p>

                <!-- CADASTRO -->

                 <form class="form" action="verificaUser.php" method="POST">
                     <label class="label-input">
                         <i class="far fa-user icon-modify"></i>

                        <input name="nome" type="text" placeholder="Nome">

                     </label>
                     <label  class="label-input">
                         <i class="far fa-envelope icon-modify"></i>

                        <input name="email" type="email" placeholder="Email">

                     </label>
                     <label class="label-input">
                         <i class="fas fa-lock icon-modify"></i>

                        <input name="senha" type="password" placeholder="Senha">

                     </label>
                     <button name="btn-cadastrar" class="btn btn-second">Cadastrar</button>
                 </form>

             </div> <!--second column-->
         </div> <!--first content-->

         <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">Oi, amigo!</h2>
                <p class="description description-primary">Insira os seus dados pessoais</p>
                <p class="description description-primary">e comece sua jornada conosco</p>
                <button id="signup" class="btn btn-primary">Cadastre-se</button>
            </div> <!--first column-->
            <div class="second-column">
                <h2 class="title title-second">Faça seu Login</h2>
                <div class="social-media">
                    <ul class="list-social">
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-facebook-f"></i>
                            </li>
                        </a>
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-google-plus-g"></i>
                            </li>
                        </a>
                        <a class="link-social" href="*">
                            <li class="item-social">
                                <i class="fab fa-linkedin-in"></i>
                            </li>
                        </a>
                     </ul>
                </div>
                <p class="description description-second">ou tilize sua conta do email</p>

                <!-- LOGIN -->

                <form class="form" action="verificaUser.php" method="POST">
                    <label  class="label-input">
                        <i class="far fa-envelope icon-modify"></i>

                       <input name="login" type="email" placeholder="Email">

                    </label>
                    <label class="label-input">
                        <i class="fas fa-lock icon-modify"></i>

                       <input name="password" type="password" placeholder="Senha">

                    </label>
                    <a class="password" href="*">Esqueceu sua senha?</a>
                    <button name="btn-login" class="btn btn-second">Login</button>
                </form>

            </div> <!--second column-->
         </div> <!--second content-->
     </div>
     <script src="js/app.js"></script>
</body>
</html>