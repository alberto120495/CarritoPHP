<?php if (isset($_SESSION['identity'])) : ?>
    <h1>Hacer pedido</h1>
    <p>
    <a href="<?= baseUrl ?>carrito/index">Ver los productos y el precio del pedido</a>
    </p>

    <form action="<?= baseUrl ?>pedido/add" method="post">
        <h3>Direccion para el envio</h3>
        <label for="provincia">Provincia</label>
        <input type="text" name="provincia" id="" required>

        <label for="localidad">Localidad</label>
        <input type="text" name="localidad" id="" required>

        <label for="direccion">Direccion</label>
        <input type="text" name="direccion" id="" required>

        <input type="submit" value="Confirmar pedido">
    </form>


<?php else : ?>
    <h1>Necesitas estar identificado</h1>
    <p>Necesitas estar logueado en la web para poder realizadar tu pedido</p>
<?php endif; ?>