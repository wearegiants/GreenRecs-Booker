jQuery(document).ready(function($){
   $.ajax({
   	url: $('input#scheduleUrl').val(),
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
	$(window).bind('scroll.modal', method.center);

    $modal.show();
    $overlay.show();

    };

    // Close the modal
    method.close = function () {
	    $modal.hide();
	    $overlay.hide();
	    $(window).unbind('resize.modal');
	    $(window).unbind('scroll.modal');
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

    window.$schedule = {
    	options: {
    		timeslotHeight: 60,
    		defaultFreeBusy: {free: true}
    	},
    	// events: rawData.appointments,
    	events: [],
    	freebusys: rawData.availibility,
    	userNames : rawData.doctors
    };

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
    			// $totalEvents = this.weekCalendar('serializeEvents');
    			// if ($totalEvents.length > 1 ) { 
    			// 	return false;
    			// }
    		},
    		beforeEventNew: function ($event, ui) {
    			$totalEvents = $(this).weekCalendar('serializeEvents');
    			if ($totalEvents.length > 1 ) {
    			 	return false;
    			}
    		
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
	    			alert("We're sorry but GreenRecs does not currently have this availible time slot with this doctor, please choose another time or another doctor.");
	    			return false;
	    		}
	    		
	    		$(calendar).weekCalendar('updateFreeBusy', {
	    			userId: calEvent.userId,
	    			start: calEvent.start,
	    			end: calEvent.end,
	    			free: true,
	    	
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
		maxDate:  new Date(+new Date + 12096e5), //can't make appt's more than 2 weeks in advance
		minDate: new Date(), //can't make appointments in the past. 
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

$calendar.weekCalendar('refresh');	
}

//mdn's rec'd cookie maker. 



});
docCookies = {
  getItem: function (sKey) {
    return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
  },
  setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
    if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
    var sExpires = "";
    if (vEnd) {
      switch (vEnd.constructor) {
        case Number:
          sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
          break;
        case String:
          sExpires = "; expires=" + vEnd;
          break;
        case Date:
          sExpires = "; expires=" + vEnd.toUTCString();
          break;
      }
    }
    document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
    return true;
  },
  removeItem: function (sKey, sPath, sDomain) {
    if (!sKey || !this.hasItem(sKey)) { return false; }
    document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + ( sDomain ? "; domain=" + sDomain : "") + ( sPath ? "; path=" + sPath : "");
    return true;
  },
  hasItem: function (sKey) {
    return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
  },
  keys: /* optional method: you can safely remove it! */ function () {
    var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
    for (var nIdx = 0; nIdx < aKeys.length; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
    return aKeys;
  }
};





