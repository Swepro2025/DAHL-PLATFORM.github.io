<?php
/**
 * Typography
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_typography',
	array(
		'panel' => 'infinite_news_theme_options',
		'title' => esc_html__( 'Typography', 'infinite-news' ),
	)
);

// Typography - Site Title Font.
$wp_customize->add_setting(
	'infinite_news_site_title_font',
	array(
		'default'           => 'Antonio',
		'sanitize_callback' => 'infinite_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'infinite_news_site_title_font',
	array(
		'label'    => esc_html__( 'Site Title Font Family', 'infinite-news' ),
		'section'  => 'infinite_news_typography',
		'settings' => 'infinite_news_site_title_font',
		'type'     => 'select',
		'choices'  => infinite_news_get_all_google_font_families(),
	)
);

// Typography - Site Description Font.
$wp_customize->add_setting(
	'infinite_news_site_description_font',
	array(
		'default'           => 'Aleo',
		'sanitize_callback' => 'infinite_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'infinite_news_site_description_font',
	array(
		'label'    => esc_html__( 'Site Description Font Family', 'infinite-news' ),
		'section'  => 'infinite_news_typography',
		'settings' => 'infinite_news_site_description_font',
		'type'     => 'select',
		'choices'  => infinite_news_get_all_google_font_families(),
	)
);

// Typography - Header Font.
$wp_customize->add_setting(
	'infinite_news_header_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'infinite_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'infinite_news_header_font',
	array(
		'label'    => esc_html__( 'Header Font Family', 'infinite-news' ),
		'section'  => 'infinite_news_typography',
		'settings' => 'infinite_news_header_font',
		'type'     => 'select',
		'choices'  => infinite_news_get_all_google_font_families(),
	)
);

// Typography - Body Font.
$wp_customize->add_setting(
	'infinite_news_body_font',
	array(
		'default'           => 'Inter',
		'sanitize_callback' => 'infinite_news_sanitize_google_fonts',
	)
);

$wp_customize->add_control(
	'infinite_news_body_font',
	array(
		'label'    => esc_html__( 'Body Font Family', 'infinite-news' ),
		'section'  => 'infinite_news_typography',
		'settings' => 'infinite_news_body_font',
		'type'     => 'select',
		'choices'  => infinite_news_get_all_google_font_families(),
	)
);
