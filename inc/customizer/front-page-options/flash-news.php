<?php
/**
 * Flash News Section
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_flash_news_section',
	array(
		'panel' => 'infinite_news_front_page_options',
		'title' => esc_html__( 'Flash News Section', 'infinite-news' ),
	)
);

// Flash News Section - Enable Section.
$wp_customize->add_setting(
	'infinite_news_enable_flash_news_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_enable_flash_news_section',
		array(
			'label'    => esc_html__( 'Enable Flash News Section', 'infinite-news' ),
			'section'  => 'infinite_news_flash_news_section',
			'settings' => 'infinite_news_enable_flash_news_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'infinite_news_enable_flash_news_section',
		array(
			'selector' => '#infinite_news_flash_news_section .section-link',
			'settings' => 'infinite_news_enable_flash_news_section',
		)
	);
}

// Flash News Section - Speed Controller.
$wp_customize->add_setting(
	'infinite_news_flash_news_speed_controller',
	array(
		'default'           => 30,
		'sanitize_callback' => 'infinite_news_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'infinite_news_flash_news_speed_controller',
	array(
		'label'           => esc_html__( 'Speed Controller', 'infinite-news' ),
		'description'     => esc_html__( 'Note: Default speed value is 30.', 'infinite-news' ),
		'section'         => 'infinite_news_flash_news_section',
		'settings'        => 'infinite_news_flash_news_speed_controller',
		'type'            => 'number',
		'input_attrs'     => array(
			'min' => 1,
		),
		'active_callback' => 'infinite_news_is_flash_news_section_enabled',
	)
);

// Flash News Section - Content Type.
$wp_customize->add_setting(
	'infinite_news_flash_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_flash_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'infinite-news' ),
		'section'         => 'infinite_news_flash_news_section',
		'settings'        => 'infinite_news_flash_news_content_type',
		'type'            => 'select',
		'active_callback' => 'infinite_news_is_flash_news_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'infinite-news' ),
			'category' => esc_html__( 'Category', 'infinite-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Flash News Section - Select Post.
	$wp_customize->add_setting(
		'infinite_news_flash_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'infinite_news_flash_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'infinite-news' ), $i ),
			'section'         => 'infinite_news_flash_news_section',
			'settings'        => 'infinite_news_flash_news_content_post_' . $i,
			'active_callback' => 'infinite_news_is_flash_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => infinite_news_get_post_choices(),
		)
	);

}

// Flash News Section - Select Category.
$wp_customize->add_setting(
	'infinite_news_flash_news_content_category',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_flash_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'infinite-news' ),
		'section'         => 'infinite_news_flash_news_section',
		'settings'        => 'infinite_news_flash_news_content_category',
		'active_callback' => 'infinite_news_is_flash_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => infinite_news_get_post_cat_choices(),
	)
);
