<?php
if ( is_active_sidebar( 'primary-widgets-area' ) || is_active_sidebar( 'secondary-widgets-area' ) ) :
	$class = is_active_sidebar( 'primary-widgets-area' ) && is_active_sidebar( 'secondary-widgets-area' ) ? '' : 'no-sidebar';
	?>
<div class="main-widget-area section-splitter">
	<div class="section-wrapper">
		<div class="widget-area-wrapper frontpage-right-sidebar <?php echo esc_attr( $class ); ?>">
			<?php if ( is_active_sidebar( 'primary-widgets-area' ) ) : ?>
				<div class="primary-widgets-area">
					<?php dynamic_sidebar( 'primary-widgets-area' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'secondary-widgets-area' ) ) : ?>
				<div class="secondary-widgets-area">
					<?php dynamic_sidebar( 'secondary-widgets-area' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php endif; ?>
