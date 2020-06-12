<h1>Gestionar categorias</h1>
<a href="<?= baseUrl ?>categoria/crear" class="button button-small">Crear Categoria</a>
<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
    </tr>
    <?php while ($cat = $categorias->fetch_object()) : ?>
        <tr>
            <td><?= $cat->id; ?></td>
            <td> <?= $cat->nombre; ?></td>
        </tr>
    <?php endwhile; ?>
</table>