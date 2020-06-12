<h1>Algunos de nuestros productos</h1>

<?php while ($pro = $productos->fetch_object()) : ?>
    <div class="product">
        <?php if ($pro->imagen != null) : ?>
            <a href="<?= baseUrl ?>producto/ver&id=<?= $pro->id ?>">
                <img src="<?= baseUrl ?>uploads/images/<?= $pro->imagen ?>" alt="" width="100">
            <?php else : ?>
                <a href="<?= baseUrl ?>producto/ver&id=<?= $pro->id ?>">
                    <img src="<?= baseUrl ?>assets/img/default.png" alt="" width="100">
                <?php endif; ?>
                <h2><?= $pro->nombre ?></h2>
                </a>
                <p>$ <?= $pro->precio ?></p>
                <a href="<?=baseUrl?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
    </div>

<?php endwhile; ?>


</div>