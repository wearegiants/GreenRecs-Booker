<section class="form-part" id="CalendarPicker">
    <form role="form" action="<?php echo $this->getFormActionUrl(); ?>" method="POST" enctype="multipart/form-data" class="show" id="calendarform">
    <?php echo $this->getSubmitFields('CalendarForm');?>
    <input type="hidden" name="data[redirect_to]" value="<?php echo \YerbaVerde\controllerVerde::getPageUrl('agreement'); ?>" />
        <div class="apptCalendar">
            <div id="calendar"></div>
        </div>
    </form>
</section>
