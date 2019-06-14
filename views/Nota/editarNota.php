<section>
    <h3>Editar Nota</h3>
    <form action="<?=URL?>nota/actualizar" method="POST">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" required value="<?= $nota->getTitulo() ?>">
        </p>
        <p>
            <label for="color">Color: </label>
            <select name="color">
                <option value="yellow" <?php if ($nota->getColor() == 'yellow') { echo 'selected'; } ?>>Amarillo</option>
                <option value="blue" <?php if ($nota->getColor() == 'blue') { echo 'selected'; } ?>>Azul</option>
                <option value="green" <?php if ($nota->getColor() == 'green') { echo 'selected'; } ?>>Verde</option>
            </select>
        </p>
        <p>
            <label for="contenido">Contenido: </label>
            <textarea name="contenido" required><?= $nota->getContenido() ?></textarea>
        </p>
        <p>
            <input type="submit" name="submit" value="Editar Nota">
            <input type="reset" value="Reiniciar Datos">
        </p>
        <input type="hidden" name="id" value="<?= $nota->getId() ?>">
    </form>
</section>