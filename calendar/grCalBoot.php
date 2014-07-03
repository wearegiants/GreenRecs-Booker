<?php 

//grCalBoot.php

namespace GreenRecs;
class grCalBoot {
	function __construct() {
		$this->callback_hooks();
	}
	function callback_hooks () {
			add_action('wp_enqueue_scripts', array($this, 'register_calendar_script'));
			add_action('wp_footer', array($this, 'modalMarkup'));
			add_action('wp_ajax_eventPost', array($this, 'eventPost'));
			add_action('wp_ajax_no_priv_eventPost', array($this, 'eventPost'));
	}
	function register_calendar_script() {
		wp_register_script( 'jquery_calendar', GR_PLUGIN_URL .  'vendors/js/jquery.weekcalendar.js' , array('jquery', 'jquery-migrate', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-mouse', 'jquery-ui-position', 'jquery-ui-draggable', 'jquery-ui-droppable', 'jquery-ui-resizable', 'jquery-ui-selectable', 'jquery-ui-sortable', 'jquery-ui-dialog', 'jquery-ui-datepicker'));
		wp_register_script('date_lib', GR_PLUGIN_URL .  'vendors/js/date.js', 'jquery');
		wp_register_script('calendar_custom', GR_PLUGIN_URL .  'js/Schedule-Runner.js', 'jquery' );
		wp_enqueue_script('date_lib');
		wp_enqueue_script('jquery_calendar' );
		wp_enqueue_script( 'calendar_custom');
		wp_enqueue_style('cal_add_greenrec', GR_PLUGIN_URL .  'css/greensched.min.css' );
		wp_enqueue_style('jquery_cal_style', GR_PLUGIN_URL .  'vendors/css/jquery.weekcalendar.css', 'jquery-ui-core' );
		wp_enqueue_style('cal_add_style', GR_PLUGIN_URL . 'vendors/css/default.css' );
		wp_enqueue_style('cal_add_gcal_style', GR_PLUGIN_URL . 'vendors/css/gcalendar.css' );
		//wp_enqueue_style('jquery_ui_custom', GR_PLUGIN_URL . 'vendors/css/jquery-ui-1.8.11.custom.css', __FILE__), 'jquery-ui-core');

	}

	public function modalMarkup() {
		?>
	<div id='overlayBg'></div>
	<div id='scheduleModal'>
	<div class="modal-container">
		<div class="row clearfix"><a href='#' id='closeModal'>&times;</a></div>
	    	<div class="row clearfix"> <div class="ErrorMsg"></div>
	    	<div id='calendar'></div></div>
	    	<div class="row clearfix">
		    	<form method="post" id="cal_schedule" action="eventPost">
		    		<?php $this->getNonceType('schedule_nonce', 'schedulepost'); ?>
		    		<input type="submit" value="Confirm Appointment" id="cal_submit" >
		    	</form>
	    	</div>
	    </div>
	   </div>
	<?php 
	}
	// set name value for the nonce used. 
	function getNonceType ($name, $action = null){
		wp_nonce_field($action, $name);
	}
	function eventPost ($data) {

		// if (!empty($_POST) && wp_verify_nonce( $_POST['schedule_nonce'],  ))) {

		// }
		

	}

}

