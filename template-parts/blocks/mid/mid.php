<?php
if ($is_preview) {
    // Use this because wp_unique_id doesn't work in preview
    $block_id = wp_unique_id('pickledtv-') . uniqid();
} else {
    $block_id = wp_unique_id('pickledtv-');
}
$title = get_field('title');
$subTitle = get_field('sub_title');
$titleContent = get_field('title_content');

$menuCategory = get_field('menu_category');

$content_image = get_field('content_image');

// Get the page ID of the home page and about page
$home_page_id = get_option('page_on_front');
$about_page_id = get_option('page_for_posts');

// Determine the class based on the current page
if (is_front_page()) {
    $section_class = 'home';
} else {
    $section_class = 'about'; // Set a default class if needed
}
?>


<section class="<?php echo esc_attr($section_class); ?>" id="<?php echo esc_attr($block_id); ?>">

    <?php if (have_rows('columns')) :

        while (have_rows('columns')) : the_row();

            $title_copy = get_sub_field('title_copy');
            $subTitle_copy = get_sub_field('sub_title_copy');
            $titleContent_copy = get_sub_field('title_content_copy');

            $menuCategory_copy = get_sub_field('menu_category_copy');
            $isBar = get_sub_field('show_bar');
            $content_image_copy = get_sub_field('content_image_copy');
            ?>

            <div class="column <?php if ($title_copy) { echo "title-column"; } if ($menuCategory_copy) {echo "menu-column";} ?>">
                <?php if($title_copy || $subTitle_copy || $titleContent_copy || $menuCategory_copy){ ?>
                    <div class="title-container" id="<?php echo $block_id; ?>">
                        <div class="title-block">
                            <?php if ($title_copy) { ?>
                                <div class="container-top">
                                    <?php $title_parts = explode(' ', $title_copy, 2); ?>
                                    <h2><span class="black-text"><?php echo esc_html($title_parts[0]); ?></span> <span class="coloured-text"><?php echo esc_html($title_parts[1]); ?></span></h2>
                                </div>
                            <?php } ?>
                            <?php if ($subTitle_copy) { ?>
                                <div class="container-mid">
                                    <p><?php echo esc_html($subTitle_copy); ?></p>
                                </div>
                            <?php } ?>
                            <?php if ($titleContent_copy) { ?>
                                <div class="container-bot">
                                    <?php echo ($titleContent_copy); ?></div>
                            <?php } ?>
                        </div>
                        <?php
                        if ($isBar) { ?>
                            <div class="container-menu">
                                <?php if ($menuCategory_copy) { ?>
                                    <?php echo ($menuCategory_copy); ?>
                                <?php } ?>
                            </div>
                        <?php } ?>

                    </div>
                <?php } ?>

                <div class="mid-content-container">
                    <div class="mid-image-container">
                        <?php if ($content_image_copy) { ?>
                            <img src="<?php echo ($content_image_copy)['url']; ?>" />
                        <?php } ?>
                    </div>

                    <div class="mid-info-container">
                        <?php

                        // Check rows exists.
                        if (have_rows('content_copy')) :
                            echo '<div class="top-container">';
                                // Loop through rows.
                                while (have_rows('content_copy')) : the_row();
                                    echo '<div class="row">';
                                        // Load sub field value.
                                        $content_title_copy = get_sub_field('content_title_copy');
                                        $content_paragraph_copy = get_sub_field('content_paragraph_copy');
                                        $content_menu_category = get_sub_field('content_menu_category');

                                        // Do something...
                                        echo '<div class="wrapper-top">';
                                            if ($content_title_copy) { ?>
                                                <h3><?php echo esc_html($content_title_copy); ?></h3>
                                            <?php }
                                        echo '</div>';
                                        echo '<div class="wrapper-bot">';
                                            if ($content_paragraph_copy) { ?>
                                                <?php echo $content_paragraph_copy; ?>
                                            <?php }
                                        echo '</div>';
                                        if ( $content_menu_category ) { ?>
                                            <div class= "menu-category">
                                                <?php echo $content_menu_category; ?>
                                            </div>
                                        <?php }
                                    echo '</div>';
                                // End loop.
                                endwhile;
                            echo '</div>';
                        endif;
                        echo '<div class="bot-container">';
                            $contact_link_copy = get_sub_field('contact_copy');
                            if ($contact_link_copy) { ?>
                                <a href="<?php echo esc_url($contact_link_copy['url']); ?>"><?php echo esc_html($contact_link_copy['title']); ?></a>
                            <?php }

                        echo '</div>'
                        ?>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    ?>
</section>