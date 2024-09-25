<?php
$top_news_query = new WP_Query( $top_news_args );
if ( $top_news_query->have_posts() ) {
	$section_title       = get_theme_mod( 'infinite_news_top_news_title', __( 'Top News', 'infinite-news' ) );
	$view_all_button     = get_theme_mod( 'infinite_news_top_news_button_label', __( 'View All', 'infinite-news' ) );
	$view_all_button_url = get_theme_mod( 'infinite_news_top_news_button_link' );
	?>
	<div class="top-stories">
		<div class="title-heading">
			<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
			<a href="<?php echo esc_url( $view_all_button_url ); ?>" class="view-all"><?php echo esc_html( $view_all_button ); ?></a>
		</div>
		<div class="banner-main-part-wrapper">
			<?php
			while ( $top_news_query->have_posts() ) :
				$top_news_query->the_post();
				?>
				<div class="blog-post-container list-layout">
					<div class="blog-post-inner">
						<div class="blog-post-detail">
								<?php infinite_news_categories_list(); ?>
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
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
