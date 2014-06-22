<?php 


namespace grBooker;



class grBoot {
	function __construct() {
			add_action('wp_enqueue_scripts', array($this, 'register_calendar_script'), 10 );
	}


	public function register_calendar_script() {
		wp_register_script( 'jquery_calendar', plugins_url( 'vendors/js/jquery.weekcalendar.js',  __FILE__  ) , array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-position', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-resizable', 'jquery-ui-selectable', 'jquery-ui-sortable', 'jquery-ui-dialog', 'jquery-ui-datepicker'));
		wp_register_script('calendar_custom', plugins_url( 'js/Schedule-Runner.js', __FILE__), 'jquery' );
		wp_enqueue_script('jquery_calendar' );
		wp_enqueue_script( 'calendar_custom');
		wp_enqueue_style('jquery_cal_style', plugins_url( 'vendors/css/jquery.weekcalendar.css',  __FILE__  ), 'jquery-ui-core' );

	}

	public function markup() {
		global $post;
		var_dump($post);
	}
}
