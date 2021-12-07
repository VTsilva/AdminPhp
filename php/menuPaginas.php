<link rel="stylesheet" href="../css/pagination.css">
<section class="section-pag">
    <div class="div-pag">
        <?php
        echo "<a href='$page_name?pagina=1' id='btn-pagina-primeira'> « </a>";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1)
                echo "<a href='$page_name?pagina=$pag_ant' id='btn-pagina'> $pag_ant </a>";
        }

        echo "<a id='btn-pagina-atual'> $pagina </a>";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg)
                echo "<a href='$page_name?pagina=$pag_dep' id='btn-pagina'> $pag_dep </a>";
        }

        echo "<a href='$page_name?pagina=$quantidade_pg' id='btn-pagina-ultima'> » </a>";
        ?>
    </div>
</section>