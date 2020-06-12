<h1>Gestion de productos</h1>
<a href="<?= baseUrl ?>producto/crear" class="button button-small">Crear Producto</a>

<?php if (isset($_SESSION['producto']) && $_SESSION['producto'] == "complete") : ?>
    <strong class="alert-green">El producto se ha creado correctamente</strong>
<?php elseif (isset($_SESSION['producto']) && $_SESSION['producto'] == 'failed') : ?>
    <strong class="alert-red">Registro fallido, introduce bien los datos</strong>
<?php endif; ?>
<?php Utils::deleteSession('producto'); ?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "complete") : ?>
    <strong class="alert-green">El producto se ha eliminado correctamente</strong>
<?php elseif (isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed') : ?>
    <strong class="alert-red">Borrado fallido</strong>
<?php endif; ?>
<?php Utils::deleteSession('delete'); ?>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>

    </tr>
    <?php while ($pro = $productos->fetch_object()) : ?>
        <tr>
            <td><?= $pro->id; ?></td>
            <td> <?= $pro->nombre; ?></td>
            <td> <?= $pro->precio; ?></td>
            <td> <?= $pro->stock; ?></td>
            <td>
                <a href="<?= baseUrl?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>
                <a href="<?= baseUrl?>producto/editar&id=<?=$pro->id?>" class="button button-gestion button-blue">Editar</a>
            </td>

        </tr>
    <?php endwhile; ?>
</table>