<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

try {
    if ($_POST) {
        $id = $_POST['id'];
        setcookie('idPrest', $id);
    } else {
        $id = $_COOKIE['idPrest'];
    }
} catch (Exception $e) {
    echo "Houve um erro. " . $e;
}

$vPrestador = verPrestador($conexao, $id);

$funcionarios = buscarFuncionario($conexao, $id, $inicio, $qnt_result_pg);

$nFuncionarios = contarFuncionario($conexao, $id);

$quantidade_pg = quantidadePg($qnt_result_pg, contarFuncionario($conexao, $id));

$page_name = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/table.css">

    <title>Prestadores de Serviços</title>
</head>

<body>
    <div class="sidebar close">
        <div class="logo-details">
            <div class="img menu-side-bar"><img src="./../img/car-white.svg" alt=""></div>
            <div class="logo-name">VulCar</div>
        </div>
        <ul class="nav-links">
            <li>
                <a href="./../home.php">
                    <span class="icon"><img src="./../img/ic-home.svg" alt=""></span>
                    <span class="link-name">Home</span>
                </a>
                <ul class="sub-menu blank">
                    <li><a href="./../home.php" class="link-name">Home</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="./../clientes/cliente.php">
                        <span class="icon"><img src="./../img/ic-cliente.png" alt=""></span>
                        <span class="link-name">Clientes</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="./../clientes/cliente.php">Clientes</a></li>
                    <li><a href="./../clientes/ativos.php">Ativos</a></li>
                    <li><a href="./../clientes/banidos.php">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="icon-link">
                    <a href="prestador.php">
                        <span class="icon"><img src="./../img/ic-prestador.png" alt=""></span>
                        <span class="link-name">Prestadores</span>
                    </a>
                    <span class="material-icons icon seta">expand_more</span>
                </div>
                <ul class="sub-menu">
                    <li><a class="link-name" href="prestador.php">Prestadores</a></li>
                    <li><a href="ativos.php">Ativos</a></li>
                    <li><a href="analise.php">Em Análise</a></li>
                    <li><a href="recusados.php">Recusados</a></li>
                    <li><a href="banidos">Banidos</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <div class="profile-content">
                        <img src="./../img/profile2.png" alt="">
                    </div>
                    <div class="name-job">
                        <div class="profile-name">Daniel556</div>
                        <div class="job">Web Designer</div>
                    </div>
                    <a href="./../index.php"><span class="material-icons icon logout">logout</span></a>
                </div>
            </li>
        </ul>
    </div>

    <section class="home-section">
        <div class="outdoor">
            <h2>PRESTADOR DE SERVIÇOS</h2>
        </div>
        <section class="verp-section">
            <section class="info">
                <div class="quadro-info">
                    <p> ID: <b> <?php echo $vPrestador['id'] ?></b> </p> <br>
                    <p> Nome: <b> <?php echo $vPrestador['nome'] ?></b> </p> <br>
                    <p> CNPJ: <b> <?php echo $vPrestador['cnpj'] ?></b> </p> <br>
                    <p> Email: <b> <?php echo $vPrestador['email'] ?></b> </p> <br>
                    <p> TEL: <b> <?php echo $vPrestador['tel'] ?></b> </p> <br>
                    <p> CEP: <b> <?php echo $vPrestador['cep'] ?></b> </p> <br>
                    <p> Status: <b> <?php echo $vPrestador['status'] ?></b> </p> <br>
                    <p> IMG de Perfil: <a id="botao" href="<?php echo $vPrestador['img'] ?>">Ver</a></p> <br>
                    <a href="editprest"></a>
                    <?php
                    $status = $vPrestador['status'];
                    if ($status == 'ACEITO') {
                        echo "<div class='vorca'> 
                                <form action='editPrest.php'>
                                    <button type='submit' class='btn-funcao' style='margin-right: 5px;'>Editar</button>
                                </form>
                                <form action='../php/verificacao.php' method='post'> 
                                    <input style='display: none' type='text' name='id' value='" . $id . "'>
                                    <button type='submit' name='btn-banirP' class='btn-funcao'> Banir </button> 
                                </form>
                                <div class='btn-voltar'>
                                    <button type='submit' class='btn-funcao'><a class='btn-funcao' href='prestador.php'>Voltar</a></button>
                                </div>
                              </div>
                            ";
                    } elseif ($status == 'EM ANÁLISE') {
                        echo "<div class='vorca'>
                                <form action='editPrest.php'>
                                    <button type='submit' class='btn-funcao' style='margin-right: 5px;'>Editar</button>
                                </form>
                                <form action='../php/verificacao.php' method='post'> 
                                    <input style='display: none' type='text' name='id' value='" . $id . "'>
                                    <button type='submit' name='btn-aceitarP' class='btn-funcao'> Aceitar </button>
                                    <button type='submit' name='btn-recusarP' class='btn-funcao'> Recusar </button> 
                                </form>
                                <div class='btn-voltar'>
                                    <button type='submit' class='btn-funcao'><a class='btn-funcao' href='prestador.php'>Voltar</a></button>
                                </div>
                              </div>";
                    } else {
                        echo "<div class='vorca'>
                              <form action='editPrest.php'>
                                 <button type='submit' class='btn-funcao' style='margin-right: 5px;'>Editar</button>
                              </form>
                              <form action='../php/verificacao.php' method='post'> 
                                <input style='display: none' type='text' name='id' value='" . $id . "'>
                                <button type='submit' name='btn-desbanirP' class='btn-funcao'> Desbanir </button>
                              </form>
                                <div class='btn-voltar'>
                                    <button type='submit' class='btn-funcao'><a class='btn-funcao' href='prestador.php'>Voltar</a></button>
                                </div>
                              </div>";
                    }
                    ?>
                </div>
            </section>

            <section class="table100">
                <div class="quadro">
                    <div>
                        <h3 class="qtd">Quantidade de Funcionarios cadastrados da Loja: <?php echo implode(",", $nFuncionarios); ?></h3>
                    </div>

                    <table class="table">
                        <thead>
                            <tr class="table100-head">
                                <th class="column1">ID</th>
                                <th class="column2">NOME</th>
                                <th class="column3">CPF</th>
                                <th class="column4">LOJA</th>
                                <th class="column5">STATUS</th>
                            </tr>
                        </thead>
                        <?php foreach ($funcionarios as $funcionario) : ?>
                            <tr>
                                <td class="column1"> <input type="text" name="id" value="<?php echo $funcionario['id']; ?>"></td>
                                <td class="column2"> <?php echo $funcionario['nome']; ?> </td>
                                <td class="column3"> <?php echo $funcionario['cpf']; ?> </td>
                                <td class="column4"> <?php echo $funcionario['loja']; ?> </td>
                                <td class="column5"> <?php echo $funcionario['status']; ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                    <div class="vorca">
                        <form action="orcaP.php" method="post">
                            <input type="text" style="display: none;" name="id" value="<?php echo $id ?>">

                            <button type="submit" name="btn-verO" class='btn-funcao'>Ver Orcamentos</button>
                        </form>
                    </div>

                    <?php
                    if ($quantidade_pg > 1) {
                        include('../php/menuPaginas.php');
                    } else {
                        die;
                    }

                    ?>

                </div>
            </section>
        </section>
    </section>

    <script src="./../js/animacao.js"></script>


</body>

</html>