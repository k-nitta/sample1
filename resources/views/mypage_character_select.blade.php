<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('css/character_select.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('js/gamen.js') }}"></script>
		<script src="{{ asset('js/jquery.bxslider.js') }}"></script>
		<script src="{{ asset('/js/ajax_client.js') }}"></script>
		<script>
			$(function(){
				var selectIndex = 1;
				$('.bxslider').bxSlider({
					speed: 900,
					minSlides: 1,
					maxSlides: 1,
					moveSlides: 1,
					slideWidth: 270,
					slideMargin: 0,
					infiniteLoop: false,
					pager: false,
					controls: false,

					onSliderLoad: function(index){
						$('.bx-wrapper').css('max-width','100%');
						$('.bx-wrapper li').click(function() {
							var click_li = $(this);
							var click_id = click_li.data('id');
							if (click_id == selectIndex) {
								$('#button_area').show();
							}
						});
					},

					onSlideAfter: function($slideElement, oldIndex, newIndex){
						$('#button_area').hide();
						selectIndex = newIndex + 1;
					},

					onSlideBefore: function($slideElement, oldIndex, newIndex){
						$('#button_area').hide();
						selectIndex = oldIndex + 1;
					}

				});

				$('a.yes').on('click', function() {
					var ajax_client = new AjaxClient();

					ajax_client.send('api/select_character', {character_id: selectIndex}, 'POST',  function(data) {

						var url = 'mypage';
						var successCallBack = function(data) {
							location.href = url;
						}

						ajax_client.send('api/progress_set', {url: url}, 'POST', successCallBack);
					});

					return false;
				});

				$('a.no').on('click', function() {
  					$('#button_area').hide();
					return false;
				});

			});

		</script>

	</head>
	<body>
		<div id="main_area">

			<img id="back_img" border="0" src="{{ asset('img/img1.jpg') }}"></img>

			<ul class="bxslider">
			    @foreach ($characters as $character)
			    	<li data-id="{{ $character['id'] }}"><img src="{{ asset('img/' . $character['img']) }}" alt=""></li>
				@endforeach
			</ul>

			<div id="button_area">
				<p>よろしいですか？</p>
				<a href="" class="btn-square-shadow yes">は　い</a>
				<a href="" class="btn-square-shadow no">いいえ</a>
			</div>

		</div>
	</body>
</html>
