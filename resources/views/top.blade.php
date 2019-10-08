<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
		<link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
		<script src="{{ asset('/js/gamen.js') }}"></script>
		<script>
			$(function () {
				$('#click_area').click(function() {
					location.href = 'start';
				});
			});
		</script>
	</head>
	<body>
		<div id="click_area">
			<img id="back_img" border="0" src="{{ asset('/img/top.jpg') }}"></img>
		</div>
	</body>
</html>
