<?php if ($notas) : ?>
    <?php foreach($notas as $nota): ?>
        <section class="seccion <?= $nota->getColor() ?>">
            <article>
                <h3><?= $nota->getTitulo(); ?></h3>
                <span><?= $nota->getFecha() ?></span>
                <p><?= $nota->getContenido(); ?></p>
            </article>
            <div id="botones" class="botones">
                <a href="<?=URL?>nota/editar/<?= $nota->getId() ?>">Editar</a>
                <a href="<?=URL?>nota/eliminar/<?= $nota->getId() ?>">Eliminar</a>
            </div>
        </section>
    <?php endforeach; ?>
<?php else: ?>
        <h3>Wops! No se encontraron notas en la BBDD. Está vacia.</h3>
<?php endif; ?>