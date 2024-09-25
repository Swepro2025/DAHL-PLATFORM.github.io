<?php
/**
 * Archive Layout
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_archive_layout',
	array(
		'title' => esc_html__( 'Archive Layout', 'infinite-news' ),
		'panel' => 'infinite_news_theme_options',
	)
);

// Archive Layout - Column Layout.
$wp_customize->add_setting(
	'infinite_news_archive_column_layout',
	array(
		'default'           => 'column-2',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_archive_column_layout',
	array(
		'label'   => esc_html__( 'Column Layout', 'infinite-news' ),
		'section' => 'infinite_news_archive_layout',
		'type'    => 'select',
		'choices' => array(
			'column-2' => __( 'Column 2', 'infinite-news' ),
			'column-3' => __( 'Column 3', 'infinite-news' ),
		),
	)
);
