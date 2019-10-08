

	var AjaxClient = function() {

	}

	AjaxClient.prototype.send = function(url, request, type = 'POST', successCallBack = function(data){}, errorCallBack = function(data){}) {

		//var host = $(location).attr('host');

		url = 'http://' + location.host + '/' +  url;

		$.ajax({
			url: url,
			type: type,
			data: request,
			dataType: 'json',
		})
		.done(function(data, status, xhr) {
			console.log('done : ' + data);
			console.log('status : ' + status);
			if (status == 'success') {
				return successCallBack(data);
			} else {
				return errorCallBack(data);
			}

		})
		.fail(function(data, status, xhr) {
			console.log('fail : ' + data);
			console.log('status : ' + status);
			return errorCallBack(data);
		});

	};

