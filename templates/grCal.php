<div id='overlayBg'></div>
<div id='scheduleModal'>
<div class="modal-container">
	<div class="row clearfix"><a href='#' id='closeModal'>&times;</a></div>
    	<div class="row clearfix"> <div class="ErrorMsg"></div>
    	<div id='calendar'></div></div>
    	<div class="row clearfix">
	    	<form method="post" id="cal_schedule" action="<?php echo $this->getFormActionUrl(); ?>" method="POST">
	    	<?php echo $this->getSubmitFields('ScheduleEvent'); ?>
	    	<input type="hidden" name="data[redirect_to]" value="/sign-up/">
	    	<div class="spacer"></div>
	    	<input type="submit"  value="Confirm Appointment" class="btn btn-lrg btn-default" data-form-id="cal_schedule" data-error="data[event]">
	    	</form>
    	</div>
    </div>
   </div>