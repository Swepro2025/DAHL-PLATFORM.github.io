<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Infinite News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
	<div id="page" class="site">

		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'infinite-news' ); ?></a>

		<div id="loader" class="loader-4">
			<div class="loader-container">
				<div id="preloader">
				</div>
			</div>
		</div><!-- #loader -->

		<header id="masthead" class="site-header">

			<?php
			$topbar_section = get_theme_mod( 'infinite_news_enable_topbar_section', false );
			?>

			<?php if ( $topbar_section === true ) { ?>
				<div class="infinite-news-topbar">
					<div class="section-wrapper">
						<div class="top-header-container">
							<div class="top-header-left">
								<!-- social icon -->
								<?php if ( has_nav_menu( 'social' ) ) : ?>
									<div class="header-social-icon">
										<div class="header-social-icon-container">
											<?php
											wp_nav_menu(
												array(
													'container'   => 'ul',
													'menu_class'  => 'social-links',
													'theme_location' => 'social',
													'link_before' => '<span class="screen-reader-text">',
													'link_after'  => '</span>',
												)
											);
											?>
										</div>
									</div>
								<?php endif; ?>
							</div>
							<div class="top-header-right">
								<div class="date">
									<span><?php echo esc_html( wp_date( 'l, M j, Y' ) ); ?></span>
								</div>
							</div>
						</div> 
					</div>
				</div>
			<?php } ?>

			<?php $header_image = empty( get_header_image() ) ? '' : 'has-bg-image'; ?>

			<div class="infinite-news-middle-header <?php echo esc_attr( $header_image ); ?>"  style="min-height: 55px;">
				<?php if ( ! empty( get_header_image() ) ) : ?>
					<div class="header-bg-image">
						<img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php esc_attr_e( 'Header Image', 'infinite-news' ); ?>">
					</div>	
				<?php endif; ?>
				<div class="section-wrapper">
					<div class="infinite-news-middle-header-wrapper">
						<!-- site branding -->
						<div class="site-branding">
							<?php if ( has_custom_logo() ) { ?>
								<div class="site-logo" style="max-width: var(--logo-size-custom);">
									<?php the_custom_logo(); ?>
								</div>
							<?php } ?>
							<div class="site-identity">
								<?php
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;
								$infinite_news_description = get_bloginfo( 'description', 'display' );
								if ( $infinite_news_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $infinite_news_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif; ?>
							</div>	
						</div>	
						<!-- navigation -->
						<div class="navigation">
							<nav id="site-navigation" class="main-navigation">
								<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
									<span class="ham-icon"></span>
									<span class="ham-icon"></span>
									<span class="ham-icon"></span>
								</button>
								<div class="navigation-area">
									<?php
									if ( has_nav_menu( 'primary' ) ) {
										wp_nav_menu(
											array(
												'theme_location' => 'primary',
												'menu_id' => 'primary-menu',
											)
										);
									}
									?>
								</div>
							</nav><!-- #site-navigation -->
						</div>
						<div class="middle-header-right-part">
							<div class="infinite-news-header-search">
								<div class="header-search-wrap">
									<a href="#" class="search-icon"><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i></a>
									<div class="header-search-form">
										<?php get_search_form(); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>	
			<!-- end of navigation -->
		</header><!-- #masthead -->

		<?php
		if ( ! is_front_page() || is_home() ) {
			if ( is_front_page() ) {

					// Flash News Section.
				require get_template_directory() . '/sections/flash-news.php';

					// Banner Section.
				require get_template_directory() . '/sections/banner.php';

			}
			?>
			<div class="infinite-news-main-wrapper">
				<div class="section-wrapper">
					<div class="infinite-news-container-wrapper">
					<?php } ?>
