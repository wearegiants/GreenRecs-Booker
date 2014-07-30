"no conflict";
jQuery(document).ready(function($) {


//Collect all our data off a form on the page, 
function fData (context) {
		if (!context.getAttribute('data-form-id')) {
     	 		var curForm = ($('form')[0]);
	  	} else {
	 		var curForm = ($('form#'+context.getAttribute('data-form-id'))[0]);
		}
		return curForm;
	};

$('input[type="submit"]').on('click', function(){
	event.preventDefault();
	var formSelect = fData(this);
	var dataForm = new FormData(formSelect);
	if (formSelect == $('form#cal_schedule')[0]) {
		var captureEvents = $('#calendar').weekCalendar('serializeEvents');

		if (captureEvents.length == 0) { 
			console.log('hey buddy you\'re missing an appointment');
			return false;
		} else {
			mutableId = captureEvents[0].userId;
			captureEvents[0]['doc_name'] = $schedule['userNames'][mutableId];
			var CalEventJSON = $.param(captureEvents[0]);
			dataForm.append('data[event]', CalEventJSON);

		}
	}
	var dataAction = formSelect.getAttribute('action');
	ajaxSubmit(dataForm, dataAction);
	
	});

	function ajaxSubmit(formData, actionPost) {
		return $.ajax({
			url: actionPost,
			type: 'POST',
			success: function (data) {
				console.log(data);
			 if ('appt_cookie' in data) {
			 	docCookies.setItem('appointment_hash', data.appt_cookie, 3600, null, window.location.hostname);
			 }
			 if ('redirect' in data) {
			 	window.location = data.redirect ;
			 }

			},
			error: function (data) {
				console.log(data);
			},
			data: formData,
			cache: false,
			contentType: false,
			processData: false
		}, 'json');

	};

});