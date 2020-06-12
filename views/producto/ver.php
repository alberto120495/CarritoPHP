<?php if (isset($pro)) : ?>
    <h1><?= $pro->nombre ?></h1>


    <div class="detail-product">
        <div class="image">
            <?php if ($pro->imagen != null) : ?>
                <a href="<?= baseUrl ?>producto/ver&id=<?= $pro->id ?>">
                    <img src="<?= baseUrl ?>uploads/images/<?= $pro->imagen ?>" alt="">
                <?php else : ?>
                    <a href="<?= baseUrl ?>producto/ver&id=<?= $pro->id ?>">
                        <img src="<?= baseUrl ?>assets/img/default.png" alt="">
                    <?php endif; ?>
        </div>
        <div class="data">
            <h2><?= $pro->nombre ?></h2>
            </a>
            <p>$ <?= $pro->precio ?></p>
            <p><?= $pro->descripcion ?></p>
            <a href="<?=baseUrl?>carrito/add&id=<?=$pro->id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>