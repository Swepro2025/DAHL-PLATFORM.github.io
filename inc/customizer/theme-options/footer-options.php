<?php
/**
 * Footer Options
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_footer_options',
	array(
		'panel' => 'infinite_news_theme_options',
		'title' => esc_html__( 'Footer Options', 'infinite-news' ),
	)
);

// Footer Options - Copyright Text.
/* translators: 1: Year, 2: Site Title with home URL. */
$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'infinite-news' ), '[the-year]', '[site-link]' );
$wp_customize->add_setting(
	'infinite_news_footer_copyright_text',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'wp_kses_post',
	)
);

$wp_customize->add_control(
	'infinite_news_footer_copyright_text',
	array(
		'label'    => esc_html__( 'Copyright Text', 'infinite-news' ),
		'section'  => 'infinite_news_footer_options',
		'settings' => 'infinite_news_footer_copyright_text',
		'type'     => 'textarea',
	)
);
