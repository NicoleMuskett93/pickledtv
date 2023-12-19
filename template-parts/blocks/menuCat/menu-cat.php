<?php 
$menuCategory = get_field('menu_category');
?>

<section class="menu-cat" >
    <div class="container-menu-cat">
        <?php if($menuCategory) { ?>
                <?php echo $menuCategory;?>
            </div>
    <?php } ?>

</section>