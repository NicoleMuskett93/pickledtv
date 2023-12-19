<?php 

if ( $is_preview ) { 
    // Use this because wp_unique_id doesn't work in preview
    $block_id = wp_unique_id( 'pickledtv-' ) . uniqid();
} else {
    $block_id = wp_unique_id( 'pickledtv-' );
}
$title = get_field('title');
$subTitle = get_field('sub_title');
$titleContent = get_field('title_content');
?>

<section class="title-block" id="<?php echo $block_id;?>">
    <div class="title-container">
        <?php if($title) { ?>
            <div class="container-top">
                <h2><?php echo esc_html($title);?></h2>
            </div>
        <?php } ?>
        <?php if($subTitle) { ?> 
            <div class="container-mid">
                <p><?php echo esc_html($subTitle);?></p>
            </div>
            <?php } ?>
            <?php if($titleContent) { ?>
            <div class="container-bot">
                <?php echo ($titleContent);?></div>
        <?php } ?>
    </div>

</section>