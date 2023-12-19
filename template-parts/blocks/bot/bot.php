<?php 

if ( $is_preview ) { 
    // Use this because wp_unique_id doesn't work in preview
    $block_id = wp_unique_id( 'pickledtv-' ) . uniqid();
} else {
    $block_id = wp_unique_id( 'pickledtv-' );
}

$bot_top_title = get_field('top_title');
$bot_top_paragraph = get_field('top_paragraph');

$bot_title = get_field('title');
$bot_image = get_field('image');

?>

<section class="bot" id="<?php echo $block_id;?>">

    <div class="bot-top-container">
        <?php if($bot_top_title){?>
            <h3><?php echo esc_html($bot_top_title);?></h3>
        <?php } 
        if($bot_top_paragraph){
        echo $bot_top_paragraph;
        }?>

    </div>
    <div class="bot-bot-container">
        <div class="bot-image-container">
        <?php if($bot_image){ ?>
            <img src= "<?php echo ($bot_image)['url']; ?>"/>
            <?php } ?>
        </div>

        <div class="bot-content-container">
            <div class="bot-content-one">
            <?php if($bot_title){ ?>
                <h3><?php echo esc_html( $bot_title); ?></h3>
            <?php } 

            if( have_rows('partner') ):
                 echo '<div class="partner-container">';
                    // Loop through rows.
                    while( have_rows('partner') ) : the_row();
                         echo '<div class="row">';
                             // Load sub field value.
                                
                            $partner_image = get_sub_field('partner_image');
                            $partner_title = get_sub_field('partner_title');
                            $partner_sub_title = get_sub_field('partner_sub_title');
                            $partner_paragraph = get_sub_field('partner_paragraph');
                            // Do something...
                            echo '<div class="wrapper-top">';
                            if ( $partner_image ) { ?>
                                <img src="<?php echo ($partner_image)['url']; ?>"/>
                                    <?php } 
                                    echo '</div>';
                                    echo '<div class="wrapper-mid">';
                                    if ( $partner_title || $partner_sub_title) { ?>
                                            <h4><?php echo esc_html( $partner_title ); ?></h4>
                                            <?php echo $partner_sub_title; ?>
                                    <?php } 
                                    echo '</div>';
                                    echo '<div class="wrapper-bot">';
                                    if ( $partner_paragraph ) { ?> 
                                            <?php echo $partner_paragraph; ?>
                                    <?php } 
                                     
                                    echo '</div>';
                                echo '</div>';

                            // End loop.
                            endwhile;
                        echo '</div>';
                        endif;    
            ?>
            </div>
            <div class="link">
            <?php $contact_link = get_field('contact');
                if ($contact_link) { ?>
                    <a href="<?php echo esc_url($contact_link['url']); ?>"><?php echo esc_html($contact_link['title']); ?></a>
                <?php } ?>
        </div>
        </div>
        
    </div>
</section>
