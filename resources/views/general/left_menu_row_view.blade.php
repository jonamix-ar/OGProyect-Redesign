<li>
	<span class="menu_icon">
		<a {!!$sub_link!!}
			class="{{$is_overlay}} tooltipRight js_hideTipOnMobile "
			target="_self"
			title="{{$sub_name}}">
		<div class="menuImage {{$selected2}} {{$menu_object}}"></div>
		</a>
	</span>
	<a class="menubutton {{$premium}} {{$selected}}"
		href="{{$menu_link}}"
		accesskey="" target="{{$target}}">
		<span class="textlabel">{{$menu_item}}</span>
	</a>
</li>