<?php
/**
 * Active Callbacks
 *
 * @package Infinite News
 */

// Theme Options.
function infinite_news_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'infinite_news_enable_pagination' )->value() );
}
function infinite_news_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'infinite_news_enable_breadcrumb' )->value() );
}

// Flash News Section.
function infinite_news_is_flash_news_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'infinite_news_enable_flash_news_section' )->value() );
}
function infinite_news_is_flash_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_flash_news_content_type' )->value();
	return ( infinite_news_is_flash_news_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function infinite_news_is_flash_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_flash_news_content_type' )->value();
	return ( infinite_news_is_flash_news_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Banner Section.
function infinite_news_is_banner_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'infinite_news_enable_banner_section' )->value() );
}
// Banner Section - Main Banner.
function infinite_news_is_main_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_main_news_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function infinite_news_is_main_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_main_news_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Banner Section - Editor Choice.
function infinite_news_is_editor_choice_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_editor_choice_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function infinite_news_is_editor_choice_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_editor_choice_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Banner Section - Trending Topic.
function infinite_news_is_trending_topic_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_trending_topic_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function infinite_news_is_trending_topic_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_trending_topic_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}
// Banner Section - Top News.
function infinite_news_is_top_news_section_and_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_top_news_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'post' === $content_type ) );
}
function infinite_news_is_top_news_section_and_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'infinite_news_top_news_content_type' )->value();
	return ( infinite_news_is_banner_section_enabled( $control ) && ( 'category' === $content_type ) );
}

// Check if static home page is enabled.
function infinite_news_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
