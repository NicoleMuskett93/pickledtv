<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pickledtv
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="container-links">
			<h3>Quick Links</h3>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer-menu',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</div>

		<div class="site-info">
			<div class="site-info-container-one">
				<p>© Pickled Pepper Productions Ltd</p>
				<span class="sep"> | </span>
				<p>Registered Address: St George’s Pl, Liverpool L1 1JJ</p>
				<span class="sep"> | </span>
				<p>UK Company Number: 08031778</p>
				</div>
				<div class="site-info-container-two">
				<a href="<?php echo esc_url( __( 'https://step3.digital/', 'pickledtv' ) ); ?>">
					<?php
					/* translators: %s: CMS name, i.e. WordPress. */
					printf( esc_html__( 'Site by %s', 'pickledtv' ), 'Step3' );
					?>
				</a>
				</div>
			</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
