<?php
$editor_query = new WP_Query( $editor_args );
if ( $editor_query->have_posts() ) {
	$section_title       = get_theme_mod( 'infinite_news_editor_choice_title', __( 'Editor Choice', 'infinite-news' ) );
	$excerpt_length      = get_theme_mod( 'infinite_news_editor_choice_excerpt_length', 20 );
	$view_all_button     = get_theme_mod( 'infinite_news_editor_choice_button_label', __( 'View All', 'infinite-news' ) );
	$view_all_button_url = get_theme_mod( 'infinite_news_editor_choice_button_link' );
	?>
	<div class="editors-choice">
		<div class="title-heading">
			<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
			<a href="<?php echo esc_url( $view_all_button_url ); ?>" class="view-all"><?php echo esc_html( $view_all_button ); ?></a>
		</div>
		<div class="editors-choice-wrap">
			<?php
			while ( $editor_query->have_posts() ) :
				$editor_query->the_post();
				?>
				<div class="blog-post-container grid-layout">
					<div class="blog-post-inner">
						<div class="blog-post-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
							<?php infinite_news_categories_list( true ); ?>
						</div>
						<div class="blog-post-detail">
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<?php if ( ! has_post_thumbnail() ): ?>
								<p class="post-excerpt">
									<?php echo wp_kses_post( wp_trim_words( get_the_content(), $excerpt_length ) ); ?>
								</p>
							<?php endif; ?>
							<div class="post-meta">
								<?php
								infinite_news_posted_by();
								infinite_news_posted_on();
								?>
							</div>
						</div>
					</div>
				</div>
				<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}
