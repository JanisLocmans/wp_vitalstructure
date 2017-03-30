<?php
/**
 * Vital Custom Archive widget extended from wp-includes/class-wp-widget.php
 * @package VitalStructure 
 * @since VitalStructure 1.0
 */
class Vital_Archive extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'vital_archive', // Base ID
			esc_html__( 'Vital Structure Custome Archive', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Custom archive widget created for this themes desing', 'text_domain' ), ) // Args
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
		echo $args['before_widget'];
			if ( ! empty( $instance['title'] ) ) { // adds title and applies filters, IF SET. 
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
			} else { // IF is not set, Title = Archives.
				echo $args['before_title'] . 'Archives' . $args['after_title'];
			}
				get_template_part( 'inc/widgets/widget_outputs/archive_output' );
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 * Note : You must use get_field_name() and get_field_id() function to generate form element name and id.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
									<?php esc_attr_e( 'Title:', 'text_domain' ); ?>
			</label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}

} 
