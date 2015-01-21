<section class="form-part" id="CalendarPicker">
    <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="calendarform">
    <?php echo $this->getSubmitFields('CalendarForm');?>
    <input type="hidden" name="data[redirect_to]" value="<?php echo \YerbaVerde\controllerVerde::getPageUrl('AgreementForm'); ?>" />
        <div id="apptCalendar">
        	<div class="help-text">
        		<h2> Select A Time That Works Best For You </h2>
        	</div>
            <div class="c">
				<div class="c-list-container">
					<ul class="c-list" id="scheduleList">
					</ul>
				</div>
				<nav class="c-nav">
					<a href="#" class="prev">&larr; Prev</a>
					<a href="#" class="next">Next &rarr;</a>
				</nav>
			</div>
        </div>
        <div>
	        <div class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Confirm Date Selection</h4>
			      </div>
			      <div class="modal-body">
			        <p id="appointment-date-seed"></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <input type="submit" class="btn btn-success" value="Request This Appointment">
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
        	
        </div>
    </form>
</section>
