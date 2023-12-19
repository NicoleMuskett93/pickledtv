<?php
$heroTitle = get_field('banner_title');
$heroVideo = get_field('hero_video');

preg_match('/<video.*?src=[\'"](.*?)[\'"].*?>/i', $heroVideo, $matches);
$src = isset($matches[1]) ? $matches[1] : '';
// $title = get_field('title');
// $subTitle = get_field('sub_title');
// Get the page ID of the home page and about page
$home_page_id = get_option('page_on_front');
$about_page_id = get_option('page_for_posts');

$title = get_field('title');
$subTitle = get_field('sub_title');
$isBar = get_field('show_bar');
$menuCategory = get_field('menu_category');

// Determine the class based on the current page
if (is_front_page()) {
    $section_class = 'hero_home';
} else {
    $section_class = 'hero_about'; // Set a default class if needed
}
?>


<section class="<?php echo esc_attr($section_class); ?>" id="<?php echo esc_attr($block_id); ?>">
    <div class="title-container">
        <?php if ($heroTitle) {
            $title_parts = explode(' ', $heroTitle, 4);
        ?>
            <h1>
                <span class="smaller-text"><?php echo esc_html($title_parts[0] . ' ' . $title_parts[1]); ?></span>
                <span class="larger-text"><?php echo esc_html($title_parts[2]); ?></span>
                <span class="medium-text"><?php echo esc_html($title_parts[3]); ?></span>
            </h1>
        <?php } ?>
        <div class="embed-container">
            <?php if ($heroVideo) { ?>
                <?php
                $params = array(
                    'autoplay' => '1',
                    'controls' => '0'
                );
                $new_src = add_query_arg($params, $src);
                $heroVideo = str_replace($src, $new_src, $heroVideo);

                echo $heroVideo;
                ?>
            <?php } ?>
            <div class="title-block">
                <?php if ($title) { ?>
                    <div class="container-top">
                        <?php $title_parts = explode(' ', $title, 2); ?>
                        <h2><span class="black-text"><?php echo esc_html($title_parts[0]); ?></span> <span class="coloured-text"><?php echo esc_html($title_parts[1]); ?></span></h2>
                    </div>
                <?php } ?>
                <?php if ($subTitle) { ?>
                    <div class="container-mid">
                        <p><?php echo esc_html($subTitle); ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <div class="menu-category">
        <?php
        if ($isBar) { ?>
            <div class="container-menu">
                <?php if ($menuCategory) { ?>
                    <?php echo ($menuCategory); ?>
                <?php } ?>
            </div>
        <?php }
        ?>
    </div>


</section>