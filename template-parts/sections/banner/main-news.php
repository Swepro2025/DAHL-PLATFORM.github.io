<?php
$main_news_query = new WP_Query( $main_news_args );
if ( $main_news_query->have_posts() ) {
	$section_title       = get_theme_mod( 'infinite_news_main_news_title', __( 'Main News', 'infinite-news' ) );
	$view_all_button     = get_theme_mod( 'infinite_news_main_news_button_label', __( 'View All', 'infinite-news' ) );
	$view_all_button_url = get_theme_mod( 'infinite_news_main_news_button_link' );
	?>
	<div class="banner-main-part">
		<div class="title-heading">
			<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
			<a href="<?php echo esc_url( $view_all_button_url ); ?>" class="view-all"><?php echo esc_html( $view_all_button ); ?></a>
		</div>
		<div class="banner-main-part-wrapper">
			<?php
			$i = 1;
			while ( $main_news_query->have_posts() ) :
				$main_news_query->the_post();
				$excerpt_length = get_theme_mod( 'infinite_news_main_news_excerpt_length', 20 );
				?>
				<div class="blog-post-container <?php echo esc_attr( $i === 1 ? 'tile-layout' : 'list-layout' ); ?>">
					<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="blog-post-image">
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>
							</div>
						<?php } ?>
						<div class="blog-post-detail">
								<?php infinite_news_categories_list( $i === 1 ? true : false ); ?>
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="post-excerpt">
								<?php echo wp_kses_post( wp_trim_words( get_the_content(), $excerpt_length ) ); ?>
							</p>
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
				$i++;
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
	<?php
}
