<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/styles.css">

    <title>VULCAR ADM</title>
</head>

<body>

    <section>
        <div class="container">
            <div class="form">
                <div class="img-logo">
                    <img src="img/carro.png">
                </div>
                <form action="./php/verificacao.php" method="post" id="form">
                    <div class="input">
                        <input type=" email" name="login" placeholder="Usuário">

                        <input type="password" name="password" placeholder="Senha">

                        <input type="submit" name="btn-login" value="Entrar" id="btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>