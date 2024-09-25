<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Infinite News
 */

get_header();
$column_layout = get_theme_mod( 'infinite_news_archive_column_layout', 'column-2' );
?>
	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="blog-archive-layout grid-layout <?php echo esc_attr( $column_layout ); ?>">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/*
					* Include the Post-Type-specific template for the content.
					* If you want to override this in a child theme, then include a file
					* called content-___.php (where ___ is the Post Type name) and that will be used instead.
					*/
					get_template_part( 'template-parts/content', get_post_type() );

				endwhile;
				?>
			</div>
			<?php

			do_action( 'infinite_news_posts_pagination' );

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

	</main><!-- #main -->
	<?php
	if ( infinite_news_is_sidebar_enabled() ) {
		get_sidebar();
	}
	?>

<?php

get_footer();
