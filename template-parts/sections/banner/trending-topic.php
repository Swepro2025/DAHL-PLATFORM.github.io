<div class="banner-trending-area">
	<?php
	$trending_topic_query = new WP_Query( $trending_args );
	if ( $trending_topic_query->have_posts() ) {
		$section_title       = get_theme_mod( 'infinite_news_trending_topic_title', __( 'Trending Topic', 'infinite-news' ) );
		$view_all_button     = get_theme_mod( 'infinite_news_trending_topic_button_label', __( 'View All', 'infinite-news' ) );
		$view_all_button_url = get_theme_mod( 'infinite_news_trending_topic_button_link' );
		?>
		<div class="trending-topics">
			<div class="title-heading">
				<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
				<a href="<?php echo esc_url( $view_all_button_url ); ?>" class="view-all"><?php echo esc_html( $view_all_button ); ?></a>
			</div>
			<div class="trending-topics-wrapper">
				<?php
				while ( $trending_topic_query->have_posts() ) :
					$trending_topic_query->the_post();
					?>
					<div class="blog-post-container list-layout">
						<div class="blog-post-inner">
							<?php if ( has_post_thumbnail() ) { ?>
								<div class="blog-post-image">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
								</div>
							<?php } ?>
							<div class="blog-post-detail">
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
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
	require get_template_directory() . '/template-parts/sections/banner/top-news.php';
	?>
</div>
