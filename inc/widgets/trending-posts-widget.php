<?php
if ( ! class_exists( 'Infinite_News_Trending_Posts_Widget' ) ) {
	/**
	 * Adds Infinite_News_Trending_Posts_Widget Widget.
	 */
	class Infinite_News_Trending_Posts_Widget extends WP_Widget {

		/**
		 * Register widget with WordPress.
		 */
		public function __construct() {
			$infinite_news_grid_widget_ops = array(
				'classname'   => 'trending-post-section ascendoor-widget',
				'description' => __( 'Retrive Trending Posts Widgets', 'infinite-news' ),
			);
			parent::__construct(
				'infinite_news_trending_posts_widget',
				__( 'Ascendoor Trending Posts Widget', 'infinite-news' ),
				$infinite_news_grid_widget_ops
			);
		}

		/**
		 * Front-end display of widget.
		 *
		 * @see WP_Widget::widget()
		 *
		 * @param array $args     Widget arguments.
		 * @param array $instance Saved values from database.
		 */
		public function widget( $args, $instance ) {
			if ( ! isset( $args['widget_id'] ) ) {
				$args['widget_id'] = $this->id;
			}
			$trending_posts_title        = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
			$trending_posts_title        = apply_filters( 'widget_title', $trending_posts_title, $instance, $this->id_base );
			$trending_posts_button_label = ( ! empty( $instance['button_label'] ) ) ? $instance['button_label'] : '';
			$trending_posts_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$trending_posts_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			$trending_posts_button_link  = ( ! empty( $instance['button_link'] ) ) ? $instance['button_link'] : esc_url( get_category_link( $trending_posts_category ) );

			echo $args['before_widget'];
			?>
			<div class="main-wrap">
				<?php if ( ! empty( $trending_posts_title || $trending_posts_button_label ) ) { ?>
					<div class="title-heading">
						<?php echo $args['before_title'] . esc_html( $trending_posts_title ) . $args['after_title']; ?>
						<?php if ( ! empty( $trending_posts_button_label ) ) : ?>
							<a href="<?php echo esc_url( $trending_posts_button_link ); ?>" class="view-all"><?php echo esc_html( $trending_posts_button_label ); ?></a>
						<?php endif; ?>
					</div>
				<?php } ?>
				<div class="trending-post-container trending-post-carousel">
					<?php
					$trending_posts_widgets_args = array(
						'post_type'      => 'post',
						'posts_per_page' => absint( 5 ),
						'offset'         => absint( $trending_posts_post_offset ),
						'cat'            => absint( $trending_posts_category ),
					);

					$query = new WP_Query( $trending_posts_widgets_args );
					if ( $query->have_posts() ) :
						$i = 1;
						while ( $query->have_posts() ) :
							$query->the_post();
							?>
							<div class="blog-post-container list-layout">
								<div class="blog-post-inner <?php echo esc_attr( has_post_thumbnail() ? '' : 'no-thumbnail' ); ?>">
									<?php if ( has_post_thumbnail() ) { ?>
									<div class="blog-post-image">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail(); ?>
										</a>
										<span><?php echo absint( $i ); ?></span>
									</div>
									<?php } else { ?>
										<span class="count"><?php echo absint( $i ); ?></span>
										<?php } ?>
									<div class="blog-post-detail">
										<h3 class="post-main-title">
											<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
										</h3>
										<div class="post-meta">
											<?php infinite_news_posted_by(); ?>
										</div>
									</div>
								</div>
							</div>
							<?php
							$i++;
						endwhile;
						wp_reset_postdata();
					endif;
					?>
				</div>
			</div>
			<?php
			echo $args['after_widget'];
		}

		/**
		 * Back-end widget form.
		 *
		 * @see WP_Widget::form()
		 *
		 * @param array $instance Previously saved values from database.
		 */
		public function form( $instance ) {
			$trending_posts_title        = isset( $instance['title'] ) ? $instance['title'] : '';
			$trending_posts_button_label = isset( $instance['button_label'] ) ? $instance['button_label'] : '';
			$trending_posts_button_link  = isset( $instance['button_link'] ) ? $instance['button_link'] : '';
			$trending_posts_post_offset  = isset( $instance['offset'] ) ? absint( $instance['offset'] ) : '';
			$trending_posts_category     = isset( $instance['category'] ) ? absint( $instance['category'] ) : '';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Section Title:', 'infinite-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $trending_posts_title ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>"><?php esc_html_e( 'View All Button:', 'infinite-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_label' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_label' ) ); ?>" type="text" value="<?php echo esc_attr( $trending_posts_button_label ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>"><?php esc_html_e( 'View All Button URL:', 'infinite-news' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'button_link' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'button_link' ) ); ?>" type="text" value="<?php echo esc_attr( $trending_posts_button_link ); ?>" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>"><?php esc_html_e( 'Number of posts to displace or pass over:', 'infinite-news' ); ?></label>
				<input class="tiny-text" id="<?php echo esc_attr( $this->get_field_id( 'offset' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'offset' ) ); ?>" type="number" step="1" min="0" value="<?php echo absint( $trending_posts_post_offset ); ?>" size="3" />
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select the category to show posts:', 'infinite-news' ); ?></label>
				<select id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>" class="widefat" style="width:100%;">
					<?php
					$categories = infinite_news_get_post_cat_choices();
					foreach ( $categories as $category => $value ) {
						?>
						<option value="<?php echo absint( $category ); ?>" <?php selected( $trending_posts_category, $category ); ?>><?php echo esc_html( $value ); ?></option>
						<?php
					}
					?>
				</select>
			</p>
			<?php
		}

		/**
		 * Sanitize widget form values as they are saved.
		 *
		 * @see WP_Widget::update()
		 *
		 * @param array $new_instance Values just sent to be saved.
		 * @param array $old_instance Previously saved values from database.
		 *
		 * @return array Updated safe values to be saved.
		 */
		public function update( $new_instance, $old_instance ) {
			$instance                 = $old_instance;
			$instance['title']        = sanitize_text_field( $new_instance['title'] );
			$instance['button_label'] = sanitize_text_field( $new_instance['button_label'] );
			$instance['button_link']  = esc_url_raw( $new_instance['button_link'] );
			$instance['offset']       = (int) $new_instance['offset'];
			$instance['category']     = (int) $new_instance['category'];
			return $instance;
		}
	}
}
