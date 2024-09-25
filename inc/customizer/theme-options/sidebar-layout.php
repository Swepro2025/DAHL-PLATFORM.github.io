<?php
/**
 * Sidebar Option
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_sidebar_option',
	array(
		'title' => esc_html__( 'Layout', 'infinite-news' ),
		'panel' => 'infinite_news_theme_options',
	)
);

// Sidebar Option - Global Sidebar Position.
$wp_customize->add_setting(
	'infinite_news_sidebar_position',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'infinite_news_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'infinite-news' ),
		'section' => 'infinite_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'infinite-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'infinite-news' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'infinite_news_post_sidebar_position',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'infinite_news_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'infinite-news' ),
		'section' => 'infinite_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'infinite-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'infinite-news' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'infinite_news_page_sidebar_position',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'infinite_news_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'infinite-news' ),
		'section' => 'infinite_news_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'infinite-news' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'infinite-news' ),
		),
	)
);
