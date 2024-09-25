<?php
/**
 * Header Options
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_header_options',
	array(
		'panel' => 'infinite_news_theme_options',
		'title' => esc_html__( 'Header Options', 'infinite-news' ),
	)
);

// Header Section - Enable Topbar Section.
$wp_customize->add_setting(
	'infinite_news_enable_topbar_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_enable_topbar_section',
		array(
			'label'    => esc_html__( 'Enable Topbar Section', 'infinite-news' ),
			'section'  => 'infinite_news_header_options',
			'settings' => 'infinite_news_enable_topbar_section',
		)
	)
);
