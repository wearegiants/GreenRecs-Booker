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
				$('span.text-danger').remove();
				
				$('.ErrorMsg').removeClass('ErrorMsg');
			if ('errors' in data) {
				$('span.text-success').remove();
				for (var iter =0, errLength = data['errors'].length; iter < errLength; iter++) {
					if (data['errors'][iter]['field'] !== 'general') {
						var affectedField = $("input[name='data[" + data['errors'][iter]['field'] + "]']").parent();
						console.log(affectedField)
						affectedField.addClass('ErrorMsg');
						affectedField.before("<span class='text-danger'>" + data['errors'][iter]['message'] +"</span>");
					} else if (data['errors'][iter]['field'] == 'general') {
						console.log(data['errors'][iter]['field']);
						var errorStr = "<span class='text-danger col-md-12' style='font-size: 18px; line-height: 21px; padding-top: 20px;'>" + data['errors'][iter]['message'] +"</span>";
						console.log(errorStr);
						$("input[type='submit']").parent().after(errorStr);
					}
				}
			} 
			if (data['status'] == 0) {
				var errorStr = '<span class="text-success col-md-12" style="font-size: 18px; line-height: 21px; padding-top: 20px;">'+ data['message'] +'</span>';
				console.log(errorStr);
				$("input[type='submit']").parent().after(errorStr);
			}
			 // if ('appt_cookie' in data) {
			 // 	docCookies.setItem('appointment_hash', data.appt_cookie, 3600, null, window.location.hostname);
			 // }
			 // if ('redirect' in data) {
			 // 	window.location = data.redirect ;
			 // }

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