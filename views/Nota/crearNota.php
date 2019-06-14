<section>
    <h3>Crear Nota</h3>
    <form action="<?=URL?>nota/guardarNota" method="POST">
        <p>
            <label for="titulo">Titulo: </label>
            <input type="text" name="titulo" required>
        </p>
        <p>
            <label for="color">Color: </label>
            <select name="color">
                <option value="yellow" selected>Amarillo</option>
                <option value="blue">Azul</option>
                <option value="green">Verde</option>
            </select>
        </p>
        <p>
            <label for="contenido">Contenido: </label>
            <textarea name="contenido" required></textarea>
        </p>
        <p>
            <input type="submit" name="submit" value="Crear Nota">
            <input type="reset" value="Reiniciar Datos">
        </p>
    </form>
</section>