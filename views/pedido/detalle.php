<h1>Detalle del pedido</h1>

<?php if (isset($pedido)) : ?>
    <?php if (isset($_SESSION['admin'])) : ?>
        <h3>Cambiar estado del pedido</h3>
        <form action="<?= baseUrl ?>pedido/estado" method="POST">
        <input type="hidden" value="<?= $pedido->id?>" name="pedido_id">
            <select name="estado" id="">
                <option value="confirm" <?= $pedido->estado == "confirm" ? "selected": ""; ?> >Pendiente</option>
                <option value="preparation" <?= $pedido->estado == "preparation" ? "selected": ""; ?> >En preparacion</option>
                <option value="ready"<?= $pedido->estado == "ready" ? "selected": ""; ?> >Preparado para enviar</option>
                <option value="sended"<?= $pedido->estado == "sended" ? "selected": ""; ?> >Enviado</option>
            </select>
            <input type="submit" value="Cambiar estado">

        </form>
    <?php endif; ?>

    <h3>Direccion de envio</h3>
    Provincia: <?= $pedido->provincia; ?> <br>
    Localidad: <?= $pedido->localidad; ?> <br>
    Direccion: <?= $pedido->direccion; ?> <br>

    <h3>Datos del pedido</h3>
    <table>
        Estado: <?= Utils::showEstatus($pedido->estado) ?> <br>
        Numero de pedido: <?= $pedido->id; ?> <br>
        Total a pagar: $ <?= $pedido->coste; ?> <br>
        <br>
        <tr>
            <th>Producto</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
        </tr>

        <?php while ($producto = $productos->fetch_object()) : ?>

            <tr>
                <td>
                    <?php if ($producto->imagen != null) : ?>
                        <a href="<?= baseUrl ?>producto/ver&id=<?= $producto->id ?>">
                            <img src="<?= baseUrl ?>uploads/images/<?= $producto->imagen ?>" alt="" class="img_carrito">
                        <?php else : ?>
                            <a href="<?= baseUrl ?>producto/ver&id=<?= $producto->id ?>">
                                <img src="<?= baseUrl ?>assets/img/default.png" alt="" class="img_carrito">
                            <?php endif; ?>
                </td>

                <td>
                    <?= $producto->nombre; ?>
                </td>
                <td>
                    $<?= $producto->precio; ?>
                </td>
                <td>
                    x<?= $producto->unidades; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>



<?php endif; ?>