<?php
include('../php/conexao.php');
include('../php/funcoes.php');

$nAnalise = contarAnalise($conexao);
$analises = prestAnalise($conexao);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>PRESTADOR VULCAR</title>
</head>

<body>
    <div class="div">
        <ul class="menu">
            <li><a href="../home.php" style="box-shadow: 0 -5px 0 #2F343D;">Home</a></li>
            <li><a href="../Cliente/cliente.php">Clientes</a>
                <ul class="sub-menu">
                    <li><a href="../Cliente/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li><img src="../img/logo.png" style="width: 100px; padding-top:4px; position: center center;display: table;">
            <li><a href="prestador.php">Prestadores</a>
                <ul class="sub-menu">
                    <li><a href="ativos.php">Prestadores Ativos</a></li>
                    <li><a href="analise.php">Prestadores para Análise</a></li>
                    <li><a href="recusados.php">Prestadores Recusadas</a></li>
                </ul>
            </li>
            <li><a href="../index.php">Sair</a></li>
        </ul>
    </div>

    <section class="section-table">
        <div class="quadro">
            <div>
                <h3>Quantidade de Prestadores Em Análise: <?php echo implode(",", $nAnalise); ?> </h3>
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

                <?php foreach ($analises as $analise) : ?>

                    <tr>
                        <form action="../php/verificacao.php" method="post">
                            <td> <input type="text" name="id" value="<?php echo $analise['id']; ?>"></td>
                            <td> <?php echo $analise['nome']; ?> </td>
                            <td> <?php echo $analise['cnpj']; ?> </td>
                            <td> <?php echo $analise['email']; ?> </td>
                            <td> <?php echo $analise['tel']; ?> </td>
                            <td> <?php echo $analise['cep']; ?> </td>
                            <td> <?php echo $analise['status']; ?> </td>
                            <td> <?php echo $analise['img']; ?> </td>

                            <td> <button type="submit" name="btn-aceitarP">Aceitar</button> </td>
                            <td> <button type="submit" name="btn-recusarP">Recusar</button> </td>
                            <td> <button type="submit" name="btn-banirP">Banir</button> </td>
                        </form>
                    </tr>

                <?php endforeach; ?>

            </table>
        </div>
    </section>
</body>

</html>