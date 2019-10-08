
	var ProgressSetAjaxClient = function(url) {
		this.url = url;
	}

	ProgressSetAjaxClient.prototype.send = function() {

		var host = $(location).attr('host');

		url = 'http://' + host + '/api/progress_set';

		var request = {
			url: this.url,
		};

		var self = this;

		$.ajax({
			url: 'api/progress_set',
			type: 'POST',
			data: request,
		})
		.always( (data) => {
			location.href = self.url;
		});

	};

