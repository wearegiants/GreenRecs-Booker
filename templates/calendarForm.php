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
        	<input type="submit" value="Request This Appointment" class="btn ">
        </div>
    </form>
</section>
