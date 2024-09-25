<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Infinite News
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="main-wrap">
		<div class="blog-post-container tile-layout">
			<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
				<div class="blog-post-image">
					<?php infinite_news_post_thumbnail(); ?>
					<?php if ( 'post' === get_post_type() ) : ?>
						<?php infinite_news_categories_list( true ); ?>
					<?php endif; ?>
				</div>
				<div class="blog-post-detail">
					<?php
					if ( is_singular() ) :
						the_title( '<h1 class="post-main-title">', '</h1>' );
					else :
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					endif;
					?>
					<div class="post-excerpt">
						<?php the_excerpt(); ?>
					</div>
					<div class="post-meta">
						<?php
						infinite_news_posted_by();
						infinite_news_posted_on();
						?>
					</div>
				</div>
			</div>
		</div>	
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
