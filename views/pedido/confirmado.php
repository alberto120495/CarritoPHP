<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == "completed") : ?>
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Tu pedido ha sido guardado con exito, una vez que realices la transferencia bancaria a la cuenta <strong>7459215013</strong>
        con el coste del pedido, sera procesado y enviado.
    </p>
    <?php if (isset($pedido)) : ?>
        <h3>Datos del pedido</h3>
        <table>
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
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] != "completed") : ?>
    <h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>