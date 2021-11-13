<?php
include('../php/conexao.php');
include('../php/funcoesCli.php');

$num = contarBanido($conexao);
$clientes = clienteBanido($conexao);
