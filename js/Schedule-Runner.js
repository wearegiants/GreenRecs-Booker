jQuery(document).ready(function($){
  (function($) {
   // var d = new Date();
   //  d.setDate(d.getDate() - d.getDay());
   //  var year = d.getFullYear();
   //  var month = d.getMonth();
   //  var day = d.getDate();


   $.ajax({
   	// url: 'https://greenrecs.com/yerbaverde/BookSchedule'
   	url: 'https://yerbaverde.local/freeschedule',
   	type: 'GET',
   	datatype: "json",
   	success: function (data){
   		TriggerInit(data);
   	},
   	error : function( data ) {
   		console.log('Error : ' + data);
   		$('.ErrorMsg').html('<p class="warning"> It appears there is an error with retrieving the scheduling calendar, please try again later...</p>');
   	}

   });
    })(jQuery);

var modal = (function(){
    var 
    method = {},
    $overlay,
    $modal,
    $close;

    $modal = $('#scheduleModal');
    $overlay = $('#overlayBg');
    $close = $('#closeModal');

    // Center the modal in the viewport
    method.center = function (settings) {
    var top, left;

    top = Math.max($(window).height() - $modal.outerHeight(), 0) / 2;
    left = Math.max($(window).width() - $modal.outerWidth(), 0) / 2;

	    $modal.css({
	        top:top + $(window).scrollTop(), 
	        left:left + $(window).scrollLeft()
	    });
    };
    // Open the modal
    method.open = function (settings) {
    	$modal.css({
	        // width: 600, 
	        height: 'auto'
	    })

	method.center();

	$(window).bind('resize.modal', method.center);

    $modal.show();
    $overlay.show();

    };

    // Close the modal
    method.close = function () {
	    $modal.hide();
	    $overlay.hide();
	    $(window).unbind('resize.modal');
    };

    return method;
}());

modal.close();

$('#calendar_active').click( function (e){
	e.preventDefault();
	modal.open();
});

$('#closeModal').click( function(e) {
	e.preventDefault;
	modal.close();
});


function TriggerInit(rawData){

    var $schedule = {
    	options: {
    		timeslotHeight: 60,
    		defaultFreeBusy: {free: true}
    	},
    	// events: rawData.appointments,
    	events: [],
    	freebusys: rawData.availibility,
    	userNames : rawData.doctors
    };
   	console.log($schedule);

    	var $calendar = $('#calendar').weekCalendar({
    		timeslotsPerHour: 2,
    		scrollToHourMillis: 0,
		height: function($calendar){
			return 480;
		},
    		eventRender: function(calEvent, $event){
    			calEvent.title = 'Your GreenRecs Consultation Appointment';
    			if (calEvent.end.getTime() < new Date().getTime()) {
    				$event.css('backgroundColor', '#22b73a');
    			}
    		},
    		eventClick: function(calEvent, $event) {	
    			$totalEvents = $calendar.weekCalendar('serializeEvents');
    			if ($totalEvents.length > 1 ) { 
    				return false;
    			}
    		},
    		beforeEventNew: function ($event, ui) {
    			// $totalEvents = $calendar.weekCalendar('serializeEvents');
    			// if ($totalEvents.length > 1 ) {
    			// 	console.log($totalEvents[0]);
    			// }
    		
    		},
    		eventNew: function(calEvent, $event, FreeBusyManager, calendar){
	    		var isFree = true;
	    		$.each(FreeBusyManager.getFreeBusys(calEvent.start, calEvent.end), function() {
	    			if (
	    			this.getStart().getTime() != calEvent.end.getTime()
	    			&& this.getEnd().getTime() != calEvent.start.getTime()
	    			&& !this.getOption('free')
	    			) {
	    				isFree = false;
	    				return false;
	    			}
	    		});
	    		if (!isFree) {
	    			$(calendar).weekCalendar('removeEvent', calEvent.id);
	    			alert("We're sorry but GreenRecs does not currently have an availible time slot with this doctor, please choose another time or another doctor.");
	    			return false;
	    		}
	    		// calEvent.id - calEvent.userId + '_' + calEvent.start.getTime();
	    		$(calendar).weekCalendar('updateFreeBusy', {
	    			userId: calEvent.userId,
	    			start: calEvent.start,
	    			end: calEvent.end,
	    			free: false,
	    			// title: 'Your GreenRecs Consultation Appointment'
	    		});
		},
		data: function(start, end, callback) {
			callback($schedule);
		},
		resizable : function (calEvent, $event) {
			return false;
		},
		preventDragOnEventCreation: true,
		businessHours: {start: 8, end: 20, limitDisplay: true},
		users: $schedule.userNames,
		showAsSeperateUser: true,
		displayOddEven: true,
		displayFreeBusys: true,
        		daysToShow: 3,
        		defaultEventLength: 1,
		useShortDayNames: true,
		dateFormat: 'd F y',
		hourLine: true,
    	});

if(window.outerWidth <= 767) {
	$calendar.weekCalendar({daysToShow: 1});
	$('#scheduleModal').css({ width: '100%' });
	$calendar.weekCalendar('refresh');
}
	// $('#data_source').change(function(){
	
	// });
$('#cal_submit').on('click', function(event){
	event.preventDefault();
	$nonce = $('#schedule_nonce').val();
	$eventsList = $calendar.weekCalendar('serializeEvents')
	//fake url switch
	window.location.href = '/sign-up';

	
});


	
}

});




