<?php
$post_title = get_the_title();
$post_description = get_field('post_description');
$post_video = get_field('post_video');
$post_sub_title = get_field('post_sub_title');
$post_content = get_field('post_content');
$side_image = get_field('post_content_side_image');
$images = get_field('post_gallery');


// Get the post type of the current post in the WordPress Loop
$current_post_type = get_post_type();
$post_type_object = get_post_type_object($current_post_type);

// Initialize variables
$post_type_title_without_hyphen = '';
$post_type_title_parts = '';

if ($post_type_object) {
    $post_type_title = $post_type_object->labels->singular_name;
    $post_type_title_without_hyphen = str_replace('-', ' ', $post_type_title);
    $post_type_title_parts = explode(' ', $post_type_title_without_hyphen, 2);
}
if (is_array($post_type_title)) {
    $post_type_title = implode(' ', $post_type_title);
}
$capitalized_title = strtoupper($post_type_title);
$title_parts = explode(' ', $capitalized_title, 2);

$posts = get_field('projects');
?>




<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        the_content();
    endwhile; // End of the loop.
    ?>
</main><!-- #main -->

<section class="post">
    <div class="post-type-container">
        <div class="title-block">
            <?php if ($title_parts && count($title_parts) === 2) { ?>
                <h1>
                    <span class="black-text"><?php echo esc_html($title_parts[0]); ?></span>
                    <span class="coloured-text"><?php echo esc_html($title_parts[1]); ?></span>
                </h1>
            <?php } else { ?>
                <h1><?php echo esc_html($capitalized_title); ?> </h1>
            <?php } ?>
        </div>
    </div>

    <div class="post-container">
        <?php if ($post_title) { ?>
            <div class="title-container">
                <h1><?php echo esc_html($post_title); ?></h1>
            <?php } ?>
            <?php if ($post_description) { ?>
                <?php echo ($post_description); ?>
            </div>
        <?php } ?>
        <div class="embed-container">
            <?php if ($post_video) { ?>
                <?php
                $params = array(
                    'autoplay' => '1',
                    'controls' => '0'
                );
                $new_src = add_query_arg($params, $src);
                $post_video = str_replace($src, $new_src, $post_video);

                echo ($post_video);

                ?>
            <?php } ?>
        </div>
        <div class="post-content-container">
            <div class="post-content">
                <?php if ($post_sub_title) { ?>
                    <h3><?php echo esc_html($post_sub_title); ?></h3>
                <?php } ?>

                <?php if ($post_content) {
                    echo ($post_content); ?>
            </div>
        <?php } ?>
        <?php if ($side_image) { ?>
            <img src="<?php echo $side_image['url']; ?>">

        <?php } ?>
        </div>
        <div class="post-gallery">
            <?php if ($images) : ?>
                <?php foreach ($images as $image) : ?>
                    <img src="<?php echo $image['sizes']['large']; ?>">
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="post-container-bot">
        <div class="post-container-bot-content">
            <h3>Your next project?</h3>
            <p>For more information on how we may be of service, please <a href="https://garyb143.sg-host.com/contact/">contact us.</a></p>
            <a href="https://garyb143.sg-host.com/our-work/">Back to Our Work</a>
        </div>
        <div class="all-posts-container">
            <h3>See more projects</h3>
        </div>

        <div class="display-posts">
            <?php
            // Check if there are posts available
            $counter = 0;
            if ($posts) :
                foreach ($posts as $post) : setup_postdata($post);
                    if ($counter < 3) : ?>
                        <div>
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail(); ?></a>
                            <h3><?php the_title(); ?></h3>
                        </div>
            <?php
                        $counter++;
                    endif;
                endforeach;
                wp_reset_postdata(); // Reset the post data after the loop
            endif;
            ?>
        </div>
    </div>
</section>

<?php
get_footer();
