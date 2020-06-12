<?php if(isset($edit) && isset($pro) && is_object($pro)) :?>

<h1>Editar Producto <?=$pro->nombre?></h1>
<?php  $urlAction = baseUrl."producto/save&id=". $pro->id; ?>

<?php else : ?>

<h1>Crear Nuevos Producto</h1>
<?php $urlAction = baseUrl."producto/save"; ?>

<?php endif;?>

<div class= "form_container">

<form action="<?=$urlAction?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="" value="<?= isset($pro) && is_object($pro) ? $pro->nombre : '' ?> " require>

    <label for="descripcion">Descripcion</label>
    <textarea name="descripcion" id=""  require> <?= isset($pro) && is_object($pro) ? $pro->descripcion : ''; ?> </textarea>

    <label for="precio">Precio</label>
    <input type="text" name="precio" id="" value="<?= isset($pro) && is_object($pro) ? $pro->precio : ''; ?>" require>

    <label for="stock">Stock</label>
    <input type="text" name="stock" value="<?= isset($pro) && is_object($pro) ? $pro->stock : ''; ?> " />

    <label for="categoria">Categoria</label>
    <?php $categorias = Utils::showCategorias(); ?>
    <select name="categoria" id="" require>

    <?php while ($cat = $categorias->fetch_object()) : ?>
                    <option value="<?= $cat->id ?>" <?= isset($pro) && is_object($pro) && $cat->id == $pro->categoria_id ? 'selected' : '' ?> >
                        <?= $cat->nombre; ?>
                    </option>
                <?php endwhile; ?>
    </select>
    <label for="imagen">Imagen</label>
    <?php if(isset($pro) && is_object($pro) && !empty($pro->imagen) ) :?> 
        <img src="<?=baseUrl?>uploads/images/<?= $pro->imagen ?>" alt="" width="100">
    <?php endif; ?>
    <input type="file" name="imagen" id="">

    <input type="submit" value="Guardar">
</form>
</div>
