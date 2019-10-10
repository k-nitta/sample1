<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('/js/jquery-ui.min.js') }}"></script>
<style>
	.ui-dialog {
		width: 80% !important;
	}

	.ui-widget-overlay {
		opacity: 0.7 !important;
	}

	.button_area {
		text-align: center;
		height: 30%;
		width: 100%;
		top: 80%;
		margin: auto;
	}

	.button_area a {
		display: inline;
	}

	li {
		border-radius: 5%;
		padding: 3%;
		border: medium solid #ff69b4;
		margin-left: -30px;
	}

</style>

<div id="item_dialog" style="display:none;">
	<div>
		<ul style="overflow: auto; list-style-type: none;">
			@foreach ($my_items as $my_item)
				<li class="item_li" data-type="{{ $my_item['type'] }}" data-img="{{ $my_item['img'] }}">{{ $my_item['name'] }}　を使う</li>
			@endforeach
		</ul>
	</div>
</div>

