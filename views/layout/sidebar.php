<!--BARRA LATERAL-->
<aside id="lateral">
    <div id="carrito" class="bloack_aside">
        <h3>Mi carrito</h3>
        <ul>
            <?php  $stats = Utils::statsCarrito() ?>
            <li> <a href="<?= baseUrl ?>carrito/index">Ver carrito</a></li>
            <li> <a href="<?= baseUrl ?>carrito/index">Productos (<?= $stats['count']?>)</a></li>
            <li> <a href="<?= baseUrl ?>carrito/index">Total: $<?= $stats['total'] ?></a></li>
        </ul>
    </div>

    <div id="login" class="bloack_aside">
        <?php if (!isset($_SESSION['identity'])) : ?>
            <h3>Entrar a la web</h3>
            <form action="<?= baseUrl ?>usuario/login" method="post">
                <label for="email">Email</label>
                <input type="email" name="email" id="">

                <label for="password">Contraseña</label>
                <input type="password" name="password" id="">

                <input type="submit" value="Enviar">
            </form>

        <?php else : ?>
            <h3>Bienvenido <?= $_SESSION['identity']->nombre . " " . $_SESSION['identity']->apellidos  ?></h3>

        <?php endif; ?>

        <ul>

            <?php if (isset($_SESSION['admin'])) : ?>
                <li>
                    <a href="<?= baseUrl ?>categoria/index">Gestionar categorias</a>
                </li>
                <li>
                    <a href="<?= baseUrl ?>producto/gestion">Gestionar productos</a>
                </li>
                <li>
                    <a href="<?= baseUrl ?>pedido/gestion">Gestionar pedidos</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION['identity'])) : ?>
                <li>
                    <a href="<?= baseUrl ?>pedido/misPedidos">Mis pedidos</a>
                </li>
                <li>
                    <a href="<?= baseUrl ?>usuario/logout">Cerrar Sesion</a>
                </li>
            <?php else : ?>
                <a href="<?= baseUrl ?>usuario/registro">Registrate Aqui</a>
            <?php endif; ?>

        </ul>
    </div>
</aside>

<!--CONTENIDO CENTRAL-->
<div id="central">