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
	// if (formSelect == 'cal_schedule') {
	// 	console.log(dataForm);
	// 	return false;
	// }
	var dataAction = formSelect.getAttribute('action');
	console.log(dataForm, dataAction);
	ajaxSubmit(dataForm, dataAction);
	
	});

function ajaxSubmit(formData, actionPost) {
	return $.ajax({
		url: actionPost,
		type: 'POST',
		success: function (data) {
			console.log(data);
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