<?php
/**
 * Pagination
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_pagination',
	array(
		'panel' => 'infinite_news_theme_options',
		'title' => esc_html__( 'Pagination', 'infinite-news' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'infinite_news_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'infinite-news' ),
			'section'  => 'infinite_news_pagination',
			'settings' => 'infinite_news_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'infinite_news_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'infinite-news' ),
		'section'         => 'infinite_news_pagination',
		'settings'        => 'infinite_news_pagination_type',
		'active_callback' => 'infinite_news_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'infinite-news' ),
			'numeric' => __( 'Numeric', 'infinite-news' ),
		),
	)
);
