<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MaiSchool
 */

get_header();
?>

	<main id="primary" class="site-main">

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<?php 
			$args = array(
				'post_type' => 'fwd-student',
				'post_per_page' => -1,
				'order' => 'ASC',
				'orderby' => 'title'
			);

			$query = new WP_Query($args);
			if($query -> have_posts()){
				
				while($query -> have_posts()){
					$query -> the_post();
					$the_post_ID = get_the_ID();
					$article_terms = wp_get_post_terms( $the_post_ID, 'fwd-student-category');
					?>
					<article>
						<a href="<?php the_permalink(); ?>">

							<h3><?php the_title(); ?></h3>
							<?php the_post_thumbnail('student-blog'); ?>
							
						</a>
						<?php the_excerpt(); ?>

						<?php
						foreach ($article_terms as $terms) :
							?>
								<a href="<?php echo esc_url(get_the_excerpt($article_term)); ?>"> 
								 <?php echo esc_html($terms->name); ?></a>
							<?php
						endforeach;
						}
						?>
						
					</article>
					<?php
				}
				wp_reset_postdata();
				echo '</section>';
			?>

	</main><!-- #main -->

<?php
get_footer();