<?php 
if ( $is_preview ) { 
    // Use this because wp_unique_id doesn't work in preview
    $block_id = wp_unique_id( 'pickledtv-' ) . uniqid();
} else {
    $block_id = wp_unique_id( 'pickledtv-' );
}

$menuCategory = get_field('menu_category');
?>

<section class="menu-cat" id="<?php echo $block_id;?>">
    <div class="container-menu">
        <?php if($menuCategory) { ?>
                <?php echo ($menuCategory);?>
    <?php } ?>

</section>