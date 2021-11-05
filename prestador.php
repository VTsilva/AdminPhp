<?php

include('conexao.php');
include('funcoes.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/estilo.css">

    <title>PRESTADOR VULCAR</title>
</head>

<body>
    <div class="div">
        <ul class="menu">
            <li><a href="home.php" style="box-shadow: 0 -5px 0 #38d38f;">Home</a></li>
            <li><a href="cliente.php">Clientes</a></li>
            <li><img src="img/logo.png" style="width: 100px; padding-top:4px; position: center center;display: table;">
            <li><a href="prestador.php">Prestadores</a>
            </li>
            <li><a href="index.php">Sair</a></li>
        </ul>
    </div>

    <?php

        listarPrestador($conexao);

        if ($nrows > 0) {
            do {
    ?>
            <p> 
                <?=$rows['id']> . "/" .
                <?=$rows['nome']> . "/" .
                <?=$rows['cpnj']> "/"   
                <?=$rows['email']> "/"
                <?=$rows['tel']> "/"
                <?=$rows['senha']> "/"
                <?=$rows['cep']> "/"
                <?=$rows['status']> "/"
                <?=$rows['img']> "/"
            </p>
    <?php
            }
        }else{
        
        }
    ?>
</body>

</html>