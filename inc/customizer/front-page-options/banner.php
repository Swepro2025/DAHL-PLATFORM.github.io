<?php
/**
 * Banner Section
 *
 * @package Infinite News
 */

$wp_customize->add_section(
	'infinite_news_banner_section',
	array(
		'panel' => 'infinite_news_front_page_options',
		'title' => esc_html__( 'Banner Section', 'infinite-news' ),
	)
);

// Banner Section - Enable Section.
$wp_customize->add_setting(
	'infinite_news_enable_banner_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'infinite_news_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Infinite_News_Toggle_Switch_Custom_Control(
		$wp_customize,
		'infinite_news_enable_banner_section',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'infinite-news' ),
			'section'  => 'infinite_news_banner_section',
			'settings' => 'infinite_news_enable_banner_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'infinite_news_enable_banner_section',
		array(
			'selector' => '#infinite_news_banner_section .section-link',
			'settings' => 'infinite_news_enable_banner_section',
		)
	);
}

// Banner Section - Main News Title.
$wp_customize->add_setting(
	'infinite_news_main_news_title',
	array(
		'default'           => __( 'Main News', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_main_news_title',
	array(
		'label'           => esc_html__( 'Main News Title Label', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_main_news_title',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Main News Content Type.
$wp_customize->add_setting(
	'infinite_news_main_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_main_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_main_news_content_type',
		'type'            => 'select',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'infinite-news' ),
			'category' => esc_html__( 'Category', 'infinite-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'infinite_news_main_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'infinite_news_main_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'infinite-news' ), $i ),
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_main_news_content_post_' . $i,
			'active_callback' => 'infinite_news_is_main_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => infinite_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'infinite_news_main_news_content_category',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_main_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_main_news_content_category',
		'active_callback' => 'infinite_news_is_main_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => infinite_news_get_post_cat_choices(),
	)
);

// Banner Section - Main News Button Label.
$wp_customize->add_setting(
	'infinite_news_main_news_button_label',
	array(
		'default'           => __( 'View All', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_main_news_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_main_news_button_label',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Main News Button Link.
$wp_customize->add_setting(
	'infinite_news_main_news_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'infinite_news_main_news_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_main_news_button_link',
		'type'            => 'url',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Horizontal Line.
$wp_customize->add_setting(
	'infinite_news_main_news_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Infinite_News_Customize_Horizontal_Line(
		$wp_customize,
		'infinite_news_main_news_horizontal_line',
		array(
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_main_news_horizontal_line',
			'active_callback' => 'infinite_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Editor Choice Title.
$wp_customize->add_setting(
	'infinite_news_editor_choice_title',
	array(
		'default'           => __( 'Editor Choice', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_editor_choice_title',
	array(
		'label'           => esc_html__( 'Editor Choice Title', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_editor_choice_title',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Editor Choice Content Type.
$wp_customize->add_setting(
	'infinite_news_editor_choice_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_editor_choice_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_editor_choice_content_type',
		'type'            => 'select',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'infinite-news' ),
			'category' => esc_html__( 'Category', 'infinite-news' ),
		),
	)
);

for ( $i = 1; $i <= 2; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'infinite_news_editor_choice_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'infinite_news_editor_choice_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'infinite-news' ), $i ),
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_editor_choice_content_post_' . $i,
			'active_callback' => 'infinite_news_is_editor_choice_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => infinite_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'infinite_news_editor_choice_content_category',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_editor_choice_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_editor_choice_content_category',
		'active_callback' => 'infinite_news_is_editor_choice_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => infinite_news_get_post_cat_choices(),
	)
);

// Banner Section - Main News Button Label.
$wp_customize->add_setting(
	'infinite_news_editor_choice_button_label',
	array(
		'default'           => __( 'View All', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_editor_choice_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_editor_choice_button_label',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Main News Button Link.
$wp_customize->add_setting(
	'infinite_news_editor_choice_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'infinite_news_editor_choice_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_editor_choice_button_link',
		'type'            => 'url',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Main News Horizontal Line.
$wp_customize->add_setting(
	'infinite_news_editor_choice_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Infinite_News_Customize_Horizontal_Line(
		$wp_customize,
		'infinite_news_editor_choice_horizontal_line',
		array(
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_editor_choice_horizontal_line',
			'active_callback' => 'infinite_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Trending Topic Title.
$wp_customize->add_setting(
	'infinite_news_trending_topic_title',
	array(
		'default'           => __( 'Trending Topic', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_trending_topic_title',
	array(
		'label'           => esc_html__( 'Trending Topic Title', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_trending_topic_title',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Trending Topic Content Type.
$wp_customize->add_setting(
	'infinite_news_trending_topic_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_trending_topic_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_trending_topic_content_type',
		'type'            => 'select',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'infinite-news' ),
			'category' => esc_html__( 'Category', 'infinite-news' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'infinite_news_trending_topic_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'infinite_news_trending_topic_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'infinite-news' ), $i ),
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_trending_topic_content_post_' . $i,
			'active_callback' => 'infinite_news_is_trending_topic_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => infinite_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'infinite_news_trending_topic_content_category',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_trending_topic_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_trending_topic_content_category',
		'active_callback' => 'infinite_news_is_trending_topic_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => infinite_news_get_post_cat_choices(),
	)
);

// Banner Section - Trending Topic Button Label.
$wp_customize->add_setting(
	'infinite_news_trending_topic_button_label',
	array(
		'default'           => __( 'View All', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_trending_topic_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_trending_topic_button_label',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Trending Topic Button Link.
$wp_customize->add_setting(
	'infinite_news_trending_topic_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'infinite_news_trending_topic_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_trending_topic_button_link',
		'type'            => 'url',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Trending Topic Horizontal Line.
$wp_customize->add_setting(
	'infinite_news_trending_topic_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Infinite_News_Customize_Horizontal_Line(
		$wp_customize,
		'infinite_news_trending_topic_horizontal_line',
		array(
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_trending_topic_horizontal_line',
			'active_callback' => 'infinite_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);

// Banner Section - Top News Title.
$wp_customize->add_setting(
	'infinite_news_top_news_title',
	array(
		'default'           => __( 'Top News', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_top_news_title',
	array(
		'label'           => esc_html__( 'Top News Title', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_top_news_title',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Top News Content Type.
$wp_customize->add_setting(
	'infinite_news_top_news_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_top_news_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_top_news_content_type',
		'type'            => 'select',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'infinite-news' ),
			'category' => esc_html__( 'Category', 'infinite-news' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// Banner Section - Select Post.
	$wp_customize->add_setting(
		'infinite_news_top_news_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'infinite_news_top_news_content_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Select Post %d', 'infinite-news' ), $i ),
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_top_news_content_post_' . $i,
			'active_callback' => 'infinite_news_is_top_news_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => infinite_news_get_post_choices(),
		)
	);

}

// Banner Section - Select Category.
$wp_customize->add_setting(
	'infinite_news_top_news_content_category',
	array(
		'sanitize_callback' => 'infinite_news_sanitize_select',
	)
);

$wp_customize->add_control(
	'infinite_news_top_news_content_category',
	array(
		'label'           => esc_html__( 'Select Category', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_top_news_content_category',
		'active_callback' => 'infinite_news_is_top_news_section_and_content_type_category_enabled',
		'type'            => 'select',
		'choices'         => infinite_news_get_post_cat_choices(),
	)
);

// Banner Section - Top News Button Label.
$wp_customize->add_setting(
	'infinite_news_top_news_button_label',
	array(
		'default'           => __( 'View All', 'infinite-news' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'infinite_news_top_news_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_top_news_button_label',
		'type'            => 'text',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Top News Button Link.
$wp_customize->add_setting(
	'infinite_news_top_news_button_link',
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'infinite_news_top_news_button_link',
	array(
		'label'           => esc_html__( 'Button Link', 'infinite-news' ),
		'section'         => 'infinite_news_banner_section',
		'settings'        => 'infinite_news_top_news_button_link',
		'type'            => 'url',
		'active_callback' => 'infinite_news_is_banner_section_enabled',
	)
);

// Banner Section - Top News Horizontal Line.
$wp_customize->add_setting(
	'infinite_news_top_news_horizontal_line',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Infinite_News_Customize_Horizontal_Line(
		$wp_customize,
		'infinite_news_top_news_horizontal_line',
		array(
			'section'         => 'infinite_news_banner_section',
			'settings'        => 'infinite_news_top_news_horizontal_line',
			'active_callback' => 'infinite_news_is_banner_section_enabled',
			'type'            => 'hr',
		)
	)
);
