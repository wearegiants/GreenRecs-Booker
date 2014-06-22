 $(document).ready(function(){
  (function($) {
   var d = new Date();
    d.setDate(d.getDate() - d.getDay());
    var year = d.getFullYear();
    var month = d.getMonth();
    var day = d.getDate();

   $.ajax({
   	// url: 'https://greenrecs.com/yerbaverde/BookSchedule'
   	url: 'https://yerbaverde.local/BookSchedule',
   	type: 'GET',
   	datatype: "jsonp",
   	success: function (data){
   		TriggerInit(data);
   	},
   	error : function( data ) {
   		console.log('Error : ' + data);
   		$('.ErrorMsg').html('<p class="warning"> It appears there is an error with retrieving the scheduling calendar, please try again later...</p>');
   	}

   });

function TriggerInit(rawData){

    var $schedule = {
    	options: {
    		timeslotsPerHour: rawData['doctors'].length,
    		defaultFreeBusy: {free: false}
    	},
    	events: rawData.appointments,
    	freebusys: rawData.availibility,
    	userNames : rawData.doctors
    };

console.log($schedule, 'this is the schedule');
   
    	var $calendar = $('#calendar').weekCalendar({
    		timeslotsPerHour : $schedule.options.timeslotsPerHour,
    		scrollToHourMillis: 0,
		height: function($calendar){

    		},
    		eventRender: function(calEvent, $event){
    			if (calEvent.end.getTime() < new Date().getTime()) {
    				$event.css('backgroundColor', '#22b73a');
    			}
    		},
    		eventNew: function(calEvent, $event, FreeBusyManager, calendar){
	    		var isFree = true;
	    		$.each(FreeBusyManager.getgetFreeBusys(calEvent.start, calEvent.end), function() {
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
		users: $schedule.userNames,
		showAsSeperateUser: true,
		displayOddEven: true,
		displayFreeBusy: true,
		daysToShow: 7,
		switchDisplay: {'1 day': 1, 'work week' : 5, 'full week': 7},
		headerSeperator: ' ',
		useShortDayNames: true,
		dateFormat: 'd F y',
		hourLine: true,
    	});
	// $('#data_source').change(function(){
	// 	$calendar.weekCalendar('refresh');
	// });

	
}
    })(jQuery);
});





