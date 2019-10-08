
	var Senario = function(name) {
		this.senario_data;
		this.senario_id = 0;
		this.speed = 1;
		this.request = {
			name: name,
			seen_id: '1'
		};
		this.next_url;
		this.ajax_client = new AjaxClient();
	};

	Senario.prototype.messageWrite = function(msg) {
		$('#next').hide();
		var count = 0;
		this.speed = 200;

		write(msg, this);

		function write(msg, self) {

			var type = msg.substring(0, count);
			$('#message').html(type);

			count ++;

			var rep = setTimeout(function() {write(msg, self);}, self.speed);

			if(count > msg.length){
				clearTimeout(rep);
				$('#next').show();

				setTimeout(function() {self.senarioMain();}, 500);
			}

		};
	};

	Senario.prototype.messageAll = function() {
		this.speed = 1;
	}

	Senario.prototype.fadeIn = function(element, time, img) {
		var self = this;

		var element = '#' + element + ' .fadein';

		var src = $(element).attr('src').replace(/character[0-9].png/, img);
		$(element).attr('src', src);

		$(element).css('display', 'none').fadeIn(time).promise().done(function () {
			self.senarioMain();
		});
	}

	Senario.prototype.fadeOut = function(element, time) {
		var self = this;
		$('#' + element + ' .fadeout').fadeOut(time).promise().done(function () {
			self.senarioMain();
		});
	}

	Senario.prototype.question = function(answers) {

		var self = this;
		$('#question_area').css('display', 'none').fadeIn(300).promise().done(function () {

			answers.forEach(function(answer) {
				$('#answers').prepend('<li><a href="#" data-id="' + answer.next_seen_id + '">' + answer.text + '</a></li>');
			});

			$('#answers li a').click(function() {

				var click_li = $(this);
				var click_id = click_li.data('id');

				$('#question_area').fadeOut(500).promise().done(function () {
					self.request["seen_id"] = click_id;
					self.senarioMain();
				});
				return false;
			});
		
		});

	}

	Senario.prototype.senarioEnd = function(url) {

		this.next_url = url;
		var self = this;

		var successCallBack = function(data) {
			location.href = '/' + self.next_url;
		}

		this.ajax_client.send('api/progress_set', {url: this.next_url}, 'POST', successCallBack);

	}

	Senario.prototype.senarioMain = function() {

		var self = this;

		var successCallBack = function(data) {

			if (data) {
				switch (data["effect"]) {
					case "message":
						self.messageWrite(data["text"]);
						break;
					case "fadeOut":
						self.fadeOut(data["element"], data["time"]);
						break;
					case "fadeIn":
						self.fadeIn(data["element"], data["time"], data["img"]);
						break;
					case "question":
						self.question(data["answers"]);
						break;
					case "end":
						$('#click_area').click(function() {
							$("#click_area").unbind("click");
							self.senarioEnd(data["url"]);
						});
						break;
				}

				if (data["next_seen_id"]) {
					var seen_id = data["next_seen_id"];
					self.request["seen_id"] = seen_id;
				}
			}

		};

		this.ajax_client.send('api/senario', this.request, 'GET', successCallBack);

	}

	Senario.prototype.senarioStart = function() {
		this.senarioMain();
	}

