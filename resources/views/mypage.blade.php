<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/mypage.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('/js/gamen.js') }}"></script>
		<script src="{{ asset('/js/ajax_client.js') }}"></script>
		<script>
			$(function () {

				var url;
				var ajax_client = new AjaxClient();

				var successCallBack = function(data) {
					location.href = url;
				}

				$('#first_area a').click(function() {
					url = "{{'event/' . $view_character['id'] . $story}}";

					ajax_client.send('api/progress_set', {url: url}, 'POST', successCallBack);

					return false;
				});

				$('.event_area_li').click(function() {
					var click_li = $(this);
					var click_story = click_li.data('story');

					url = 'event/' + {{ $view_character['id'] }} + click_story;

					ajax_client.send('api/progress_set', {url: url}, 'POST', successCallBack);

					return false;
				});

				$('#life_area #cell_1 a').click(function() {
					url = 'mypage_character_select';

					ajax_client.send('api/progress_set', {url: url}, 'POST', successCallBack);

					return false;
				});

				$('a.yes').on('click', function() {
					url = 'mypage';

					var click_li = $(this);
					var click_img = click_li.data('img');
					var click_type = click_li.data('type');

					ajax_client.send('api/image_convert', {img: click_img, type: click_type}, 'POST',  successCallBack);

					return false;
				});

				$('a.no').on('click', function() {
  					$('#get_item').hide();
					return false;
				});

				$('#item').on('click', function() {

					$("#item_dialog").dialog({
						modal:true,
						width:150,
						height:250,
						title:"アイテム",
					});

					$('.item_li').on('click', function() {
						url = 'mypage';

						var click_li = $(this);
						var click_img = click_li.data('img');
						var click_type = click_li.data('type');

						ajax_client.send('api/image_convert', {img: click_img, type: click_type}, 'POST',  successCallBack);
						
					});

				});

			});
		</script>
	</head>
	<body>
		<div id="mypage_main_area" style="background-image: url(./img/mypage_back_img.jpg);">
			<div id="my_room">
				<img id="room_img" border="0" src="{{ asset('/img/' . $my_room_img['id'] . '.png/?' . str_random(8)) }}"></img>
				<div id="item">
					<img border="0" src="{{ asset('/img/item.png') }}">
				</div>
			</div>
			<div id="first_area">
				<a href="#">
					<img border="0" src="{{ asset('/img/event_read.png') }}">
				</img>
				</a>
			</div>
			<div id="life_area">
				<div id="cell_1">
					<a href="#">
						<img border="0" src="{{ asset('img/' . $view_character['img']) }}"></img>
					</a>
				</div>
				<div id="cell_2">
					<img border="0" src="{{ asset('/img/life.png') }}"></img>
				</div>
			</div>
			<div id="event_area">
				<ul>
					@foreach ($event_list as $event)
			    		<a href="#" class="event_area_li" data-story="{{ mb_substr($event['event'], -2) }}" href="#">
							<li >{{ $event['title'] }}：{{ $event['detail'] }}</li>
						</a>
					@endforeach
				</ul>
			</div>

			@if ($clear_item)
				<div id="get_item">
					<div id="item_area">
						<p>
						{{$clear_item['name']}} をGET!!</br></br>
						使用するとマイルームに反映されます<br>
						<br>
						※使用の有無に関わらず、再取得はできません。
						</p>
						<div id="button_area">
							<a data-img="{{ $clear_item['img'] }}" data-type="{{ $clear_item['type'] }}" href="#" class="btn-square-shadow yes">は　い</a>
							<a href="#" class="btn-square-shadow no">いいえ</a>
						</div>
					</div>
				</div>
			@endif

		</div>

        @extends('dialog.item')

	</body>
</html>
