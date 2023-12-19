<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pickledtv
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="archive-container">

		<header class="page-header">
			<div class="title-block">
				<?php
				$archive_title = get_the_archive_title();
				$modified_title = str_replace('Archives: ', '', $archive_title);
				$capitalized_title = strtoupper($modified_title);
				$title_parts = explode(' ', $capitalized_title, 2);
				if ($title_parts) { ?>
					<h1>
						<span class="black-text"><?php echo ($title_parts[0]); ?></span>
						<span class="coloured-text"><?php echo ($title_parts[1]); ?></span>
					</h1>
				<?php } ?>

			</div>
		</header><!-- .page-header -->

		<div class="post-archive-container">

			<?php if (have_posts()) : ?>


			<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();


					/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
					get_template_part('template-parts/content', get_post_type());

				endwhile;



			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>
		</div>
		<?php the_posts_navigation(); ?>

</main><!-- #main -->

<?php

get_footer();
