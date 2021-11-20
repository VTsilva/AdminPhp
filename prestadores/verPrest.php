<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$id = $_POST['id'];

if (!$id) {
    echo "Prestador não encontrado. <a href='./../prestadores/prestador.php'>VOLTAR</a>";
}

$vPrestador = verPrestador($conexao, $id);

$funcionarios = buscarFuncionario($conexao, $id);

$nFuncionarios = contarFuncionario($conexao, $id);

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
        <section class="section-table">
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

                    <?php
                    $status = $vPrestador['status'];
                    if ($status == 'ACEITO') {
                        echo "<form action='../php/verificacao.php' method='post'> 
                                 <input style='display: none' type='text' name='id' value='" . $id . "'>
                                 <button type='submit' name='btn-banirP'> Banir </button> 
                              </form>";
                    } elseif ($status == 'EM ANÁLISE') {
                        echo "<form action='../php/verificacao.php' method='post'> 
                                 <input style='display: none' type='text' name='id' value='" . $id . "'>
                                 <button type='submit' name='btn-aceitarP'> Aceitar </button>
                                 <button type='submit' name='btn-recusarP'> Recusar </button> 
                              </form>";
                    } else {
                        echo "<form action='../php/verificacao.php' method='post'> 
                                <input style='display: none' type='text' name='id' value='" . $id . "'>
                                <button type='submit' name='btn-desbanirP'> Aceitar </button>
                              </form>";
                    }
                    ?>
                </div>
            </section>

            <div class="quadro">
                <div>
                    <form action="orcaP.php" method="post">
                        <input type="text" style="display: none;" name="id" value="<?php echo $id ?>">

                        <button type="submit" name="btn-verO">Ver Orcamentos</button>
                    </form>


                    <h3>Quantidade de Funcionarios cadastrados da Loja: <?php echo implode(",", $nFuncionarios); ?></h3>
                </div>

                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>LOJA</th>
                        <th>STATUS</th>
                    </tr>
                    <?php foreach ($funcionarios as $funcionario) : ?>
                        <tr>
                            <td> <input type="text" name="id" value="<?php echo $funcionario['id']; ?>"></td>
                            <td> <?php echo $funcionario['nome']; ?> </td>
                            <td> <?php echo $funcionario['cpf']; ?> </td>
                            <td> <?php echo $funcionario['loja']; ?> </td>
                            <td> <?php echo $funcionario['status']; ?> </td>>
                        </tr>
                    <?php endforeach; ?>
            </div>
        </section>
    </section>

    <script src="./../js/animacao.js"></script>
</body>

</html>