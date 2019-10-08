<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/senario.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('/js/gamen.js') }}"></script>
		<script src="{{ asset('/js/ajax_client.js') }}"></script>
		<script src="{{ asset('/js/senario.js') }}"></script>
		<script>
			$(function(){

				$('#title_area').fadeIn(1500).promise().done(function () {

					$('#title_area').click(function() {

						$("#title_area").unbind("click");

						$('body').css('background', 'white');

						$(this).fadeOut(300);

						$('#click_area').fadeIn(2000).promise().done(function () {
							var senario = new Senario('{{$event}}');
							senario.senarioStart();

							$('#click_area').click(function() {
								senario.messageAll();
							});

							$('#click_area #my_room a').click(function() {
								var ajax_client = new AjaxClient();
								ajax_client.send('api/progress_set', {url: 'mypage'}, 'POST', function(data) {
									location.href = '/mypage';
								});

								return false;
							});

						});

					});
				});

			});
		</script>
	</head>
	<body>
		<div id="title_area">
			<img border="0" src="{{ asset('/img/event_title.jpg') }}"></img>
			<div id="title">
				<h1>{{$title}}</h1>
			</div>
			<div id="detail_area">
				<div id="detail">{{$detail}}</div>
			</div>
		</div>

		<div id="question_area">
			<ul id="answers">
			</ul>
		</div>

		<div id="click_area">
			@if ($event != 'tutorial')
				<div id="my_room">
					<a>マイページへ</a>
				</div>
			@endif

			<img id="back_img" border="0" src="{{ asset('/img/' . $back_img) }}"></img>
			<div id="left">
				<img border="0" class="fadein fadeout" src="{{ asset('/img/character2.png') }}"></img>
			</div>
			<div id="center">
				<img border="0" class="fadein fadeout" src="{{ asset('/img/character1.png') }}"></img>
			</div>
			<div id="right">
				<img border="0" class="fadein fadeout" src="{{ asset('/img/character3.png') }}"></img>
			</div>
			<div id="text_area">
				<div id="message" ></div>
				<img border="0" src="{{ asset('/img/message.jpg') }}"></img>
				<div id="next"></div>
			</div>
		</div>
	</body>
</html>
