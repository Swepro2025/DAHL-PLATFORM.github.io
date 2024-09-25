<?php
if ( ! get_theme_mod( 'infinite_news_enable_banner_section', false ) ) {
	return;
}

$main_news_content_ids = $editor_content_ids = $trending_content_ids = $top_news_content_ids = array();
$main_content_type     = get_theme_mod( 'infinite_news_main_news_content_type', 'post' );
$editor_content_type   = get_theme_mod( 'infinite_news_editor_choice_content_type', 'post' );
$trending_content_type = get_theme_mod( 'infinite_news_trending_topic_content_type', 'post' );
$top_news_content_type = get_theme_mod( 'infinite_news_top_news_content_type', 'post' );

if ( $main_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$main_news_content_ids[] = get_theme_mod( 'infinite_news_main_news_content_post_' . $i );
	}
	$main_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $main_news_content_ids ) ) ) {
		$main_news_args['post__in'] = array_filter( $main_news_content_ids );
		$main_news_args['orderby']  = 'post__in';
	} else {
		$main_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'infinite_news_main_news_content_category' );
	$main_news_args = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$main_news_args = apply_filters( 'infinite_news_banner_section_args', $main_news_args );

if ( $editor_content_type === 'post' ) {
	for ( $i = 1; $i <= 2; $i++ ) {
		$editor_content_ids[] = get_theme_mod( 'infinite_news_editor_choice_content_post_' . $i );
	}
	$editor_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 2 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $editor_content_ids ) ) ) {
		$editor_args['post__in'] = array_filter( $editor_content_ids );
		$editor_args['orderby']  = 'post__in';
	} else {
		$editor_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'infinite_news_editor_choice_content_category' );
	$editor_args    = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 2 ),
	);
}
$editor_args = apply_filters( 'infinite_news_banner_section_args', $editor_args );

if ( $trending_content_type === 'post' ) {
	for ( $i = 1; $i <= 5; $i++ ) {
		$trending_content_ids[] = get_theme_mod( 'infinite_news_trending_topic_content_post_' . $i );
	}
	$trending_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $trending_content_ids ) ) ) {
		$trending_args['post__in'] = array_filter( $trending_content_ids );
		$trending_args['orderby']  = 'post__in';
	} else {
		$trending_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'infinite_news_trending_topic_content_category' );
	$trending_args  = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}
$trending_args = apply_filters( 'infinite_news_banner_section_args', $trending_args );

if ( $top_news_content_type === 'post' ) {
	for ( $i = 1; $i <= 3; $i++ ) {
		$top_news_content_ids[] = get_theme_mod( 'infinite_news_top_news_content_post_' . $i );
	}
	$top_news_args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 3 ),
		'ignore_sticky_posts' => true,
	);
	if ( ! empty( array_filter( $top_news_content_ids ) ) ) {
		$top_news_args['post__in'] = array_filter( $top_news_content_ids );
		$top_news_args['orderby']  = 'post__in';
	} else {
		$top_news_args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'infinite_news_top_news_content_category' );
	$top_news_args  = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 3 ),
	);
}
$top_news_args = apply_filters( 'infinite_news_banner_section_args', $top_news_args );

infinite_news_render_banner_section( $main_news_args, $editor_args, $trending_args, $top_news_args );

/**
 * Render Banner Section.
 */
function infinite_news_render_banner_section( $main_news_args, $editor_args, $trending_args, $top_news_args ) {
	?>
	<section id="infinite_news_banner_section" class="magazine-banner section-splitter banner-style-1">
		<?php
		if ( is_customize_preview() ) :
			infinite_news_section_link( 'infinite_news_banner_section' );
		endif;
		?>
		<div class="section-wrapper">
			<div class="banner-container-wrapper">
				<div class="banner-wrapper">
					<?php
					require get_template_directory() . '/template-parts/sections/banner/trending-topic.php';
					require get_template_directory() . '/template-parts/sections/banner/main-news.php';
					require get_template_directory() . '/template-parts/sections/banner/editor-choice.php';
					?>
				</div>
			</div>
		</div>
	</section>

	<?php

}
