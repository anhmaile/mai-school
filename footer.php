<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MaiSchool
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info">
			<div class="site-info-wp">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'mai-school' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'mai-school' ), 'WordPress' );
				?>
			</a>
			</div>

			<div class="site-info-theme">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by  %2$s.', 'mai-school' ), 'mai-school', '<a href="http://www.anhmaile.com/"> Mai Le</a>' );
				?>
			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
