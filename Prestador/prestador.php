<?php
include('../php/conexao.php');
include('../php/funcoes.php');

$num = contarPrestador($conexao);
$prestadores = listarPrestador($conexao);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilo.css">

    <title>PRESTADOR VULCAR</title>
</head>

<body>
    <div class="div">
        <ul class="menu">
            <li><a href="../home.php" style="box-shadow: 0 -5px 0 #38d38f;">Home</a></li>
            <li><a href="../Cliente/cliente.php">Clientes</a></li>
            <li><img src="../img/logo.png" style="width: 100px; padding-top:4px; position: center center;display: table;">
            <li><a href="../Prestador/prestador.php">Prestadores</a>
                <ul class="sub-menu">
                    <li><a href="./Prestador/ativos.php">Prestadores Ativos</a></li>
                    <li><a href="./Prestador/analise.php">Prestadores para Análise</a></li>
                    <li><a href="./Prestador/recusados.php">Prestadores Recusadas</a></li>
                </ul>
            </li>
            <li><a href="index.php">Sair</a></li>
        </ul>
    </div>

    <h3>Quantidade de Prestadores Cadastrados: <?php echo implode(",", $num); ?> </h3>

    <table>
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

        <?php foreach ($prestadores as $prestador) : ?>

            <tr>
                <td> <?php echo $prestador['id']; ?> </td>
                <td> <?php echo $prestador['nome']; ?> </td>
                <td> <?php echo $prestador['cnpj']; ?> </td>
                <td> <?php echo $prestador['email']; ?> </td>
                <td> <?php echo $prestador['tel']; ?> </td>
                <td> <?php echo $prestador['cep']; ?> </td>
                <td> <?php echo $prestador['status']; ?> </td>
                <td> <?php echo $prestador['img']; ?> </td>
            </tr>

        <?php endforeach; ?>

    </table>


</body>

</html>