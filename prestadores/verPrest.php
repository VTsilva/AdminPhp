<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$id = $_POST['id'];

$vPrestador = verPrestador($conexao, $id);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>PRESTADOR VULCAR DETALHES</title>
</head>

<body>
    <div class="div">
        <ul class="menu">
            <li><a href="../home.php">Home</a></li>
            <li><a href="../Cliente/cliente.php">Clientes</a>
                <ul class="sub-menu">
                    <li><a href="../Cliente/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li><img src="../img/logo.png" style="width: 100px; padding-top:4px; position: center center;display: table;">
            <li><a href="prestador.php" style="box-shadow: 0 -5px 0 #2F343D;">Prestadores</a>
                <ul class=" sub-menu">
                    <li><a href="ativos.php">Prestadores Ativos</a></li>
                    <li><a href="analise.php">Prestadores para Análise</a></li>
                    <li><a href="recusados.php">Prestadores Recusadas</a></li>
                    <li><a href="banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li><a href="../index.php">Sair</a></li>
        </ul>
    </div>

    <section class="info">

        <div>
            <h3>Este é o id: <?php echo $vPrestador['id'] ?></h3> <br>
            <h3>Este é o nome: <?php echo $vPrestador['nome'] ?></h3> <br>
            <h3>Este é o cnpj: <?php echo $vPrestador['cnpj'] ?></h3> <br>
            <h3>Este é o email: <?php echo $vPrestador['email'] ?></h3> <br>
            <h3>Este é o tel: <?php echo $vPrestador['tel'] ?></h3> <br>
            <h3>Este é o cep: <?php echo $vPrestador['cep'] ?></h3> <br>
            <h3>Este é o status: <?php echo $vPrestador['status'] ?></h3> <br>
            <h3>Este é caminho para a img: <?php echo $vPrestador['img'] ?></h3> <br>
        </div>

    </section>


</body>

</html>