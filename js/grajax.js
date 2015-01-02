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

$('input[type="submit"]').on('click', function(){
	event.preventDefault();


	var formSelect = fData(this);
	var dataForm = new FormData(formSelect);
	if (docCookies.hasItem('pid')) {
		dataForm.append('pid', docCookies.getItem('pid'));
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
			//RESET our errors states to normal
			$('.ErrorMsg').removeClass('ErrorMsg');
			$('.has-error').removeClass('has-error');
			$('[data-error]').off('focus');
			$('[data-error]').off('blur');
			if ('session_hash' in data) {
				var domainPath = decodeURI(window.location.hostname);
			 	docCookies.setItem('session_hash', data['session_hash'], 3600, '/', domainPath, false);
			 	if ('pid' in data) {
			 		if (!docCookies.hasItem('pid')){
			 			docCookies.setItem('pid', data['pid'], 3600, '/', domainPath, false);
			 		}
			 		if ('redirect' in data) {
				 		window.location = data['redirect'];
					}
				}
				
			}

			if ('errors' in data) {
				//need to do complete rewrite of the errors states. 
				for (var iter = 0, errLength = data['errors'].length; iter < errLength; iter++) {
					var errItem = data['errors'][iter];
					console.log(errItem);
					errorTooltips(errItem.field, errItem.message);
				}
			} 
			if (data['status'] == 0) {
				
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

	function errorTooltips(field, msg) {
		var input = $('[data-error="data['+field+']"]');
		var label = $('label[for="data['+field+']"]');

		label.addClass('ErrorMsg');
		input.parent().addClass('has-error');
		input.on('focus', function() {
			input.parent().append('<span id="msgBubble">' + msg + '</span>');
		});
		input.on('blur', function(){
			$('#msgBubble').remove();
		});		
		
	}

});