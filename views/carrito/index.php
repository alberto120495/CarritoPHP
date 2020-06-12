<h1>Carrito de la compra</h1>
<?php if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1) : ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Quitar del carrito</th>

        </tr>
        <?php foreach ($carrito as $indice => $elemento) :
            $producto = $elemento['producto'];
        ?>
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
                    <a href="<?= baseUrl ?>producto/ver&id=<?= $producto->id ?>"> <?= $producto->nombre; ?> </a>
                </td>
                <td>
                    <?= $producto->precio; ?>
                </td>
                <td>
                    <div class ="updown-unidades">
                    <a href="<?= baseUrl ?>carrito/up&index=<?= $indice ?> " class="button up" >+</a>
                    </div>
                    <?= $elemento['unidades']; ?>
                    <div class ="updown-unidades">
                    <a href="<?= baseUrl ?>carrito/down&index=<?= $indice ?> " class="button down">-</a>
                    </div>

                </td>
                <td>
                    <a href="<?= baseUrl ?>carrito/remove&index=<?= $indice //$producto->id ?> " class="button button-red button-carrito ">Quitar producto</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <div class="delete-carrito">
        <a href="<?= baseUrl ?>carrito/delete_all " class="button button-delete button-red">Vaciar Carrito</a>
    </div>

    <div class="total-carrito">
        <?php $stats = Utils::statsCarrito() ?>
        <h3>Precio total: $<?= $stats['total'] ?> </h3>
        <a href="<?= baseUrl ?>pedido/hacer " class="button button-pedido">Hacer pedido</a>
    </div>
<?php else : ?>
    <p>El carrito esta vacio, añade algun producto</p>


<?php endif; ?>