<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$nBanidos = contarBanidos($conexao);
$banidos = prestBanidos($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>PRESTADOR VULCAR BANIDOS</title>
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
                <ul class="sub-menu">
                    <li><a href="ativos.php">Prestadores Ativos</a></li>
                    <li><a href="analise.php">Prestadores para Análise</a></li>
                    <li><a href="recusados.php">Prestadores Recusadas</a></li>
                    <li><a href="banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li><a href="../index.php">Sair</a></li>
        </ul>
    </div>

    <section class="section-table">
        <div class="quadro">
            <div>
                <h3>Quantidade de Prestadores Banidos: <?php echo implode(",", $nBanidos); ?> </h3>
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

                <?php foreach ($banidos as $banido) : ?>

                    <tr>
                        <form action="../php/verificacao.php" method="post">
                            <td> <input type="text" name="id" value="<?php echo $banido['id']; ?>"></td>
                            <td> <?php echo $banido['nome']; ?> </td>
                            <td> <?php echo $banido['cnpj']; ?> </td>
                            <td> <?php echo $banido['email']; ?> </td>
                            <td> <?php echo $banido['tel']; ?> </td>
                            <td> <?php echo $banido['cep']; ?> </td>
                            <td> <?php echo $banido['status']; ?> </td>
                            <td> <?php echo $banido['img']; ?> </td>

                            <td> <button type="submit" name="btn-desbanirP">Desbanir</button> </td>
                        </form>
                    </tr>

                <?php endforeach; ?>

            </table>
        </div>
    </section>
</body>

</html>