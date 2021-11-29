<?php

//Recebe o número da página
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//Seta a quaqntidade de intens por página
$qnt_result_pg = 10;

//Calcula o inicio da visualizção
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

//Limitar os links antes e depois
$max_links = 2;

//Quantidade de páginas
function quantidadePg($qnt_result_pg, $funcao_contar)
{
    $num = $funcao_contar;
    $quantidade_pg = ceil($num['quantidade'] / $qnt_result_pg);

    return $quantidade_pg;
}