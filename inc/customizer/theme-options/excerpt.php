<?php
/**
 * Excerpt
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_excerpt_options',
	array(
		'panel' => 'infinite_news_theme_options',
		'title' => esc_html__( 'Excerpt', 'infinite-news' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'infinite_news_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'infinite_news_sanitize_number_range',
		'validate_callback' => 'infinite_news_validate_excerpt_length',
	)
);

$wp_customize->add_control(
	'infinite_news_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'infinite-news' ),
		'description' => esc_html__( 'Note: Min 1 & Max 100. Please input the valid number and save. Then refresh the page to see the change.', 'infinite-news' ),
		'section'     => 'infinite_news_excerpt_options',
		'settings'    => 'infinite_news_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
		),
	)
);
