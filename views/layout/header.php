<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= baseUrl ?>assets/css/styles.css">
    <title>Tienda de Camisetas</title>
</head>

<body>
    <div id="container">
        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="<?= baseUrl ?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?= baseUrl ?>">
                    Tienda de camisetas
                </a>
            </div>
        </header>

        <!--MENU-->
        <?php $categorias = Utils::showCategorias() ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?= baseUrl ?>">Inicio</a>
                </li>
                <?php while ($cat = $categorias->fetch_object()) : ?>
                    <li>
                        <a href="<?=baseUrl?>categoria/ver&id=<?=$cat->id?>"><?= $cat->nombre; ?></a>
                    </li>
                <?php endwhile; ?>

            </ul>
        </nav>

        <div id="content">