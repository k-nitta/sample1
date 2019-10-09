<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('/js/gamen.js') }}"></script>
		<script src="{{ asset('/js/ajax_client.js') }}"></script>
		<script>
			$(function () {

				$('#button_area p').click(function() {

					var ajax_client = new AjaxClient();

					var url = 'character_select';

					var successCallBack = function(data) {
						location.href = url;
					}

					ajax_client.send('api/progress_set', {url: url}, 'POST', successCallBack);

				});

				var kirakira_num = 5;

				var kirakira_outer = $('.kira');

				function kirakira(c, x, y) {

					var x_max = kirakira_outer.width();
					var y_max = kirakira_outer.height();

					x = Math.floor(Math.random() * (x_max - 20 - 10)) + 10;
					y = Math.floor(Math.random() * (y_max - 20 - 10)) + 10;

					$('.kirakira_inner').css({'margin-left': x + 'px', 'margin-top': y + 'px'});

					$('.kirakira_inner').fadeIn(200).fadeOut(200, function() {

						setTimeout(function() {

							// 回数をカウント
							c++;

							// アニメーション回数の上限に達していない
							if (c < kirakira_num){
								// 再起動
								kirakira(c, x, y);
							} else {
								$('#button_area').fadeIn(400);
							
							}
						}, 100);
					});

				}

				//初期起動
				kirakira(0, 0, 0);
			});
		</script>
		
		<style type="text/css">
			.kirakira { position: absolute; left: 0; top: 0; }
			.kirakira_inner { position: relative; display: none; }
			.kirakira_one { position: absolute; left: 0; top: 0; }

			.kirakira-x { position: relative; width: 20px; height: 20px; }
			.kirakira-x::before { position: absolute; left: 50%; top: 50%; content: ''; width: 0; height: 0; margin-top:-10%; border-width:2px 10px; border-style:solid; border-color: transparent; border-left-color: yellow; }
			.kirakira-x::after { position: absolute; right: 50%; top: 50%; content: ''; width: 0; height: 0; margin-top:-10%; border-width:2px 10px; border-style:solid; border-color:transparent; border-right-color: yellow; }

			.kirakira-y { position: relative; width: 20px; height: 20px; }
			.kirakira-y::before { position: absolute; left: 50%; top: 50%; content: ''; width: 0; height: 0; margin-left: -10%; border-width: 10px 2px; border-style: solid; border-color: transparent; border-top-color: yellow; }
			.kirakira-y::after { position: absolute; left: 50%; bottom: 50%; content: ''; width: 0; height: 0; margin-left: -10%; border-width: 10px 2px; border-style: solid; border-color: transparent; border-bottom-color: yellow; }

			.btn-square-shadow {
				display: inline-block;
				padding: 0.5em 1em;
				text-decoration: none;
				background: #668ad8;
				color: #FFF;
				border-bottom: solid 4px #627295;
				border-radius: 3px;
				font-size: 20px;
				display: none;
			}

			.btn-square-shadow:active {
				-webkit-transform: translateY(4px);
				transform: translateY(4px);
				box-shadow: 0px 0px 1px rgba(0, 0, 0, 0.2);
				border-bottom: none;
			}
		</style>
	</head>
	<body style="margin: 0">
		<div id="main_area" width="100%" height="100%">

			<img id="back_img" border="0" src="../img/img2.jpg" width="100%"
			style="z-index: 1; position: absolute; top: 0px;"></img>
				<div id="center">
				<img border="0" src="../img/turorial_end.png" width="100%" height="100%"
					style="position: absolute; display: inline; width: 100%; height: 50%; z-index: 2;"></img>
			</div>

			<div class="kira" style="width: 100%; height: 300px; margin: 40px auto; position: absolute; z-index: 10;">
				<div class="kirakira">
					<div class="kirakira_inner">
						<div class="kirakira_one"><div class="kirakira-x"></div></div>
						<div class="kirakira_one"><div class="kirakira-y"></div></div>
					</div>
				</div>
			</div>

			<div id="button_area"  style="display: none; z-index: 1; position: absolute; bottom: 10%; width: 100%; text-align: center;">
				<p class="btn-square-shadow" style="display: inline-block; width:50%;" >お相手選択へ</p>
			</div>

		</div>
	</body>
</html>
