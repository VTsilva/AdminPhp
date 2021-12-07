<?php
include('../php/conexao.php');
include('../php/funcoesPrest.php');

$id = $_POST['id'];
$vFuncionario = verFuncionario($conexao, $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/editPrest.css">

    <script type="text/javascript" src="../js/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../js/jquery.mask.js"></script>

    <script>
        $(document).ready(function() {
            $('#cpfFun').mask('000.000.000-00');
            $('#telFun').mask('(00) 00000-0000');
        });
    </script>

    <title>Editar Funcionário</title>
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
            <h2>Editar Funcionário</h2>
        </div>

        <section class="section-sla">
            <form action="../php/verificacao.php" method="post" class="form-edit">
                <div class="sla">
                    <div class="info1">
                        <label>Id: </label><input id="idFun" type="text" readonly name="id" value="<?php echo $vFuncionario['id']; ?>">
                        <label>CPF: </label><input id="cpfFun" type="text" name="cpfFun" required value="<?php echo $vFuncionario['cpf']; ?>">
                        <label>Nome: </label><input id="nomeFun" type="text" name="nomeFun" required value="<?php echo $vFuncionario['nome']; ?>">
                        <label>Email: </label><input id="emailFrm" type="email" name="emailFun" required value="<?php echo $vFuncionario['email']; ?>">
                    </div>
                    <div class="info2">
                        <label>Tel: </label><input id="telFun" type="text" name="telFun" required value="<?php echo $vFuncionario['tel']; ?>">
                        <label>Senha: </label><input id="senhaFun" type="text" name="senhaFun" required value="<?php echo $vFuncionario['senha']; ?>">
                        <label>Loja: </label><input id="lojaFun" type="text" name="lojaFun" disabled value="<?php echo $vFuncionario['loja']; ?>">
                    </div>
                </div>
                <div class="btn-edit">
                    <button type="submit" name="btn-editFun" class="btn-funcao">Salvar</button>

            </form>


            <button name="btn-cancelarEditFun" class="btn-funcao"><a class="btn-funcao" href="../prestadores/verPrest.php">Cancelar</a></button>
            </div>

        </section>

    </section>

</body>

</html>