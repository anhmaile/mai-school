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

			// Solution Reference: https://stackoverflow.com/questions/34989806/acf-loop-repeater-values-with-get-field *Foreach Version
			?>
			<div class="table-container">
			<div class="table-date">
			<?php
			$rows = get_field('weekly_course_schedule');
			if($rows) {
				echo '<ul>';
				echo '<h3>Date</h3>';
				foreach ($rows as $row) {
					echo '<li>' . $row['date'] . '</li>';
				}
				echo '</ul>';
			}
			?>
			</div>

			<div class="table-course">
			<?php
			if($rows) {
				echo '<ul>';
				echo '<h3>Course</h3>';
				foreach ($rows as $row) {
					echo '<li>' . $row['course'] . '</li>';
				}
				echo '</ul>';
			}

			?>
			</div>

			<div class="table-instructor">
			<?php
			if($rows) {
				echo '<ul>';
				echo '<h3>Instructor</h3>';
				foreach ($rows as $row) {
					echo '<li>' . $row['instructor'] . '</li>';
				}
				echo '</ul>';
			}
			?>
			</div>
			</div>

			<?php

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
	</main><!-- #main -->

<?php
get_footer();