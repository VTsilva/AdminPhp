<?php
include('../php/conexao.php');
include('../php/funcoes.php');

$num = contarCliente($conexao);
$clientes = listarCliente($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br" ng-app="cliente">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>CLIENTES VULCAR</title>
</head>

<body>
    <div class="div">
        <ul class="menu">
            <li><a href="../home.php">Home</a></li>
            <li><a href="cliente.php">Clientes</a></li>
            <li><img src="../img/carro.png">
            <li><a href="../Prestador/prestador.php">Prestadores</a>
                <ul class="sub-menu">
                    <li><a href="../Prestador/ativos.php">Prestadores Ativos</a></li>
                    <li><a href="../Prestador/analise.php">Prestadores para Análise</a></li>
                    <li><a href="../Prestador/recusados.php">Prestadores Recusadas</a></li>
                </ul>
            </li>
            <li><a href="../index.php">Sair</a></li>
        </ul>
    </div>

    <section class="section-table">
        <div class="quadro">
            <div>
                <h3>Quantidade de Cliente Cadastrados: <?php echo implode(",", $num); ?> </h3>
            </div>

            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>TEL</th>
                    <th>STATUS</th>
                </tr>

                <?php foreach ($clientes as $cliente) : ?>

                    <tr>
                        <td> <?php echo $cliente['id']; ?> </td>
                        <td> <?php echo $cliente['nome']; ?> </td>
                        <td> <?php echo $cliente['cpf']; ?> </td>
                        <td> <?php echo $cliente['tel']; ?> </td>
                        <td> <?php echo $cliente['status']; ?> </td>
                    </tr>

                <?php endforeach; ?>

            </table>
        </div>
    </section>


</body>

</html>