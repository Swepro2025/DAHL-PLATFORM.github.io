<?php
if ( ! get_theme_mod( 'infinite_news_enable_flash_news_section', false ) ) {
	return;
}

$content_ids  = array();
$content_type = get_theme_mod( 'infinite_news_flash_news_content_type', 'post' );

if ( $content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'infinite_news_flash_news_content_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'infinite_news_flash_news_content_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$args = apply_filters( 'infinite_news_flash_news_section_args', $args );

infinite_news_render_flash_news_section( $args );

/**
 * Render Flash News Section.
 */
function infinite_news_render_flash_news_section( $args ) {
	$speed_controller = get_theme_mod( 'infinite_news_flash_news_speed_controller', 30 );

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) :
		?>
		<div id="infinite_news_flash_news_section" class="infinite-news-flash-news">
			<?php
			if ( is_customize_preview() ) :
				infinite_news_section_link( 'infinite_news_flash_news_section' );
			endif;
			?>
			<div class="section-wrapper">
				<div class="flash-news-section ascendoor-customizer-section">
					<div class="flash-news-wrapper">
						<div class="flash-news-icon">
							<i class="fa-solid fa-arrow-trend-up"></i>
						</div>
						<div class="flash-news-area" dir="ltr">
							<div class="marquee flash-news" data-speed="<?php echo absint( $speed_controller ); ?>">
								<div class="flash-news-posts-wrapper">
									<div class="flash-news-post">
										<?php
										while ( $query->have_posts() ) :
											$query->the_post();
											?>
											<div class="single-post-wrap">
												<div class="content-wrap">
													<?php if ( has_post_thumbnail() ) { ?>
														<div class="flash-image">
															<?php the_post_thumbnail( array( 40, 40 ) ); ?>
														</div>
													<?php } ?>
													<div class="flash-title">
														<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
													</div>
												</div>
											</div>
											<?php
										endwhile;
										wp_reset_postdata();
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	endif;
}
