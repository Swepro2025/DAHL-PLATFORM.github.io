<?php
/**
 * Theme Options
 *
 * @package Infinite News
 */

$wp_customize->add_panel(
	'infinite_news_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'infinite-news' ),
		'priority' => 130,
	)
);

// Header Options.
require get_template_directory() . '/inc/customizer/theme-options/header-options.php';

// Typography.
require get_template_directory() . '/inc/customizer/theme-options/typography.php';

// Archive Layout.
require get_template_directory() . '/inc/customizer/theme-options/archive-layout.php';

// Excerpt.
require get_template_directory() . '/inc/customizer/theme-options/excerpt.php';

// Breadcrumb.
require get_template_directory() . '/inc/customizer/theme-options/breadcrumb.php';

// Layout.
require get_template_directory() . '/inc/customizer/theme-options/sidebar-layout.php';

// Post Options.
require get_template_directory() . '/inc/customizer/theme-options/post-options.php';

// Pagination.
require get_template_directory() . '/inc/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/inc/customizer/theme-options/footer-options.php';
