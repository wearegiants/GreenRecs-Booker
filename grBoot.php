<?php 

/*
Plugin Name: GreenRecs Scheduler Calendar
Author: scneptune
Description: A plugin to allow patients to schedule an appt with a doctor.
Version: 0.0.1
*/

class grBoot {
	function __construct() {
		$this->callback_hooks();
	}
	function callback_hooks () {
			add_action('wp_enqueue_scripts', array($this, 'register_calendar_script'));
			add_action('wp_footer', array($this, 'markup'));
			add_action('wp_ajax_eventPost', array($this, 'eventPost'));
			add_action('wp_ajax_no_priv_eventPost', array($this, 'eventPost'));
	}
	function register_calendar_script() {
		wp_register_script( 'jquery_calendar', plugins_url( 'vendors/js/jquery.weekcalendar.js',  __FILE__  ) , array('jquery', 'jquery-migrate', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-position', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-resizable', 'jquery-ui-selectable', 'jquery-ui-sortable', 'jquery-ui-dialog', 'jquery-ui-datepicker'));
		wp_register_script('date_lib', plugins_url( 'vendors/js/date.js', __FILE__ ), 'jquery');
		wp_register_script('calendar_custom', plugins_url( 'js/Schedule-Runner.js', __FILE__), 'jquery' );
		wp_enqueue_script('date_lib');
		wp_enqueue_script('jquery_calendar' );
		wp_enqueue_script( 'calendar_custom');
		wp_enqueue_style('cal_add_greenrec', plugins_url( 'css/greensched.min.css', __FILE__ ) );
		wp_enqueue_style('jquery_cal_style', plugins_url( 'vendors/css/jquery.weekcalendar.css',  __FILE__  ), 'jquery-ui-core' );
		wp_enqueue_style('cal_add_style', plugins_url('vendors/css/default.css', __FILE__) );
		wp_enqueue_style('cal_add_gcal_style', plugins_url('vendors/css/gcalendar.css', __FILE__) );
		//wp_enqueue_style('jquery_ui_custom', plugins_url('vendors/css/jquery-ui-1.8.11.custom.css', __FILE__), 'jquery-ui-core');

	}

	public function markup() {
		?>
	<div id='overlayBg'></div>
	<div id='scheduleModal'>
	<div class="modal-container">
		<div class="row clearfix"><a href='#' id='closeModal'>&times;</a></div>
	    	<div class="row clearfix"> <div class="ErrorMsg"></div>
	    	<div id='calendar'></div></div>
	    	<div class="row clearfix">
		    	<form method="post" id="cal_schedule" action="eventPost">
		    		<?php wp_nonce_field('schedule_nonce', 'schedule_nonce'); ?>
		    		<input type="submit" value="Confirm Appointment" id="cal_submit" >
		    	</form>
	    	</div>
	    </div>
	   </div>
	<?php 
	}
	function eventPost ($data) {

		// if (!isset(wp_verify_nonce( 'schedule_nonce', 'schedule_nonce'))) {

		// }
		// $_POST['schedule_nonce'];

	}

}
new grBoot();
