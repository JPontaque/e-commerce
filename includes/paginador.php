<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item<?php if ($pagina == 1) echo " disabled"; ?>">
            <a class="page-link" href="?pagina=<?= $pagina - 1?>" tabindex="-1">Previous</a>
        </li>
        <?php
        for ($i = 0; $i < $numero_paginas; $i++){
            ?>
            <li class="page-item<?php if ($pagina == ($i + 1)) echo " disabled"; ?>">
                <a class="page-link" href="?pagina=<?= $i + 1?>"><?= $i + 1?></a>
            </li>
            <?php
        }
        ?>
        <li class="page-item <?php if (($pagina == $numero_paginas) || ($numero_paginas == 0)) echo " disabled"; ?>">
            <a class="page-link" href="?pagina=<?= $pagina + 1?>">Next</a>
        </li>
    </ul>
</nav>