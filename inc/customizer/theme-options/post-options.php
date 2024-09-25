<?php
/**
 * Post Options
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'infinite-news' ),
		'panel' => 'infinite_news_theme_options',
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'infinite_news_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'infinite-news' ),
			'section' => 'infinite_news_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'infinite_news_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'infinite-news' ),
			'section' => 'infinite_news_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'infinite_news_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'infinite-news' ),
			'section' => 'infinite_news_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'infinite_news_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'infinite-news' ),
			'section' => 'infinite_news_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'infinite_news_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'infinite-news' ),
		'section'  => 'infinite_news_post_options',
		'settings' => 'infinite_news_post_related_post_label',
		'type'     => 'text',
	)
);
