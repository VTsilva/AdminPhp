<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
        <link rel="stylesheet" href="css/styles.css">

        <title>VULCAR ADM</title>
    </head>
    <body>
        <section class="section-login">
            <form action="./php/verificacao.php" method="post" id="form" class="container">
                <img src="img/car.svg" alt="">
                <input type="text" name="login" placeholder="Usuário" autocomplete="off">
                <input type="password" name="password" placeholder="Senha">
                <div class="btn-login">
                    <input type="submit" name="btn-login" id="btn" value="">
                    <img src="img/arrow.svg" alt="">
                </div>
            </form>
            <!-- Mensagens de erro -->
            <p class="message-error"></p>
        </section>
    </body>
</html>