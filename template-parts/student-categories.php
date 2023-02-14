<?php
		$terms = get_terms(
			array(
				'taxonomy' => 'fwd-student-category',
			)
		);

		if($terms && ! is_wp_error($terms)) :
			?>
			<section>
				<h2><?php esc_html_e('The Class', 'fwd'); ?></h2>

				<ul>
					<?php foreach($terms as $term) : ?>
						<li>
							<a href="<?php get_term_link($term); ?>"> <?php echo $term->name; ?></a>
							<?php echo $term->count; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
			<?php
		endif;
        
	?>