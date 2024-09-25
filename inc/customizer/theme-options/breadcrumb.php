<?php
/**
 * Breadcrumb
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'infinite-news' ),
		'panel' => 'infinite_news_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'infinite_news_enable_breadcrumb',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'infinite-news' ),
			'section' => 'infinite_news_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'infinite_news_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'infinite_news_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'infinite-news' ),
		'active_callback' => 'infinite_news_is_breadcrumb_enabled',
		'section'         => 'infinite_news_breadcrumb',
	)
);
