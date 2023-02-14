<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaiSchool
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

<?php
$args = array(
    'post_type'      => 'fwd-services',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title',
);
 
$query = new WP_Query( $args );
 
if ( $query -> have_posts() ) {
	echo '<div class="service-nav">';
    // Output Navigation
    while ( $query -> have_posts() ) {
        $query -> the_post();
        echo '<a href="#'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</a>';
    }
    wp_reset_postdata();
	echo '</div>';
}
?>

<?php
// Output Administrative Staff Content
$args = array(
    'post_type'      => 'fwd-staff',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title',
	'tax_query'	=> array(
					array(
						'taxonomy' => 'fwd-staff-category',
						'field' => 'slug',
						'terms' => 'Administrative'
					)
				)
);
 
$query = new WP_Query( $args );
 
if ( $query -> have_posts() ) {
	echo '<section><h2>Administrative</h2>';
 
    while ( $query -> have_posts() ) {
        $query -> the_post();
		?>
		<article>
			<h3><?php the_title(); ?></h3>
			<?php 
				if ( function_exists( 'get_field' ) ) {

					if ( get_field( 'biography' ) ) {
						echo '<p>';
						the_field( 'biography' );
						echo '</p>';
					}
			
				}
				?>
		</article>

		<?php
    }
    wp_reset_postdata();
	echo '</section>';
}
?>


<?php
// Output Faculty Staff Content
$args = array(
    'post_type'      => 'fwd-staff',
    'posts_per_page' => -1,
    'order'          => 'ASC',
    'orderby'        => 'title',
	'tax_query'	=> array(
					array(
						'taxonomy' => 'fwd-staff-category',
						'field' => 'slug',
						'terms' => 'Faculty'
					)
				)
);
 
$query = new WP_Query( $args );
 
if ( $query -> have_posts() ) {
	echo '<section><h2>Faculty</h2>';
 
    while ( $query -> have_posts() ) {
        $query -> the_post();
		?>
		<article>
			<h3><?php the_title(); ?></h3>
			<?php 
				if ( function_exists( 'get_field' ) ) {

					if ( get_field( 'biography' ) ) {
						echo '<p>';
						the_field( 'biography' );
						echo '</p>';
					}
				
					if ( get_field( 'courses' ) ) {
						echo '<p>';
						the_field( 'courses' );
						echo '</p>';
					}

					if ( get_field( 'website' ) ) {
						?>
						<a href="<?php the_field( 'website') ?>">Instructor Website</a>
						<?php
					}
				}
				?>
		</article>

		<?php
    }
    wp_reset_postdata();
	echo '</section>';
}
?>

	</main><!-- #main -->

<?php
get_footer();
