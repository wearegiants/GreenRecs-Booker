jQuery(document).ready(function($){
  (function($) {
   // var d = new Date();
   //  d.setDate(d.getDate() - d.getDay());
   //  var year = d.getFullYear();
   //  var month = d.getMonth();
   //  var day = d.getDate();

   $.ajax({
   	// url: 'https://greenrecs.com/yerbaverde/BookSchedule'
   	url: 'https://yerbaverde.local/BookSchedule',
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
function TriggerInit(rawData){

    var $schedule = {
    	options: {
    		timeslotHeight: 40
    	},
    	events: rawData.appointments,
    	freebusys: rawData.availibility,
    	userNames : rawData.doctors
    };
   
    	var $calendar = $('#calendar').weekCalendar({
    		timeslotsPerHour: 2,
    		scrollToHourMillis: 0,
		height: function($calendar){
			return 800 -$('h1').outerHeight(true);
		},
    		eventRender: function(calEvent, $event){
    			if (calEvent.end.getTime() < new Date().getTime()) {
    				$event.css('backgroundColor', '#22b73a');
    			}
    		},
    		eventNew: function(calEvent, $event, FreeBusyManager, calendar){
	    		var isFree = true;
	    		console.log(FreeBusyManager);
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
	    		calEvent.id - calEvent.userId + '_' + calEvent.start.getTime();
	    		$(calendar).weekCalendar('updateFreeBusy', {
	    			userId: calEvent.userId,
	    			start: calEvent.start,
	    			end: calEvent.end,
	    			free: false
	    		});
		},
		data: function(start, end, callback) {
			callback($schedule);
		},
		businessHours: {start: 9, end: 18, limitDisplay: true},
		users: $schedule.userNames,
		showAsSeperateUser: true,
		displayOddEven: false,
		displayFreeBusys: true,
        		daysToShow: 3,
		headerSeperator: '</br> ',
		useShortDayNames: true,
		dateFormat: 'd F y',
		hourLine: true,
    	});
	// $('#data_source').change(function(){
	// 	$calendar.weekCalendar('refresh');
	// });

	
}

});





