<div class="smallplanet {{$planet_size_1}}" id="planet-{{$planet_id}}">
    <a href="game.php?page={{$current_page}}&amp;cp={{$planet_id}}" class="planetlink{{$actual_planet}} tooltipRight tooltipClose js_hideTipOnMobile"
				title="&lt;b&gt;{{$planet_name}} [{{$planet_galaxy}}:{{$planet_system}}:{{$planet_planet}}]&lt;/b&gt;
				&lt;br/&gt;{{$planet_diameter}}{{$lm_distance_unit}} ({{$planet_field_current}}/{{$planet_field_max}})
				&lt;br&gt;{{$lm_of}} {{$planet_temp_min}} {{$lm_temp_unit}} {{$lm_to}} {{$planet_temp_max}} {{$lm_temp_unit}}
				&lt;br/&gt;&lt;a href=&quot;game.php?page=overview&amp;cp={{$planet_id}}&quot;&gt;{{$lm_overview}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=buildings&amp;cp={{$planet_id}}&quot;&gt;{{$lm_resources}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=research&amp;cp={{$planet_id}}&quot;&gt;{{$lm_research}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=station&amp;cp={{$planet_id}}&quot;&gt;{{$lm_station}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=shipyard&amp;cp={{$planet_id}}&quot;&gt;{{$lm_shipyard}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=defense&amp;cp={{$planet_id}}&quot;&gt;{{$lm_defenses}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=fleet1&amp;cp={{$planet_id}}&quot;&gt;{{$lm_fleet}}&lt;/a&gt;
				&lt;br/&gt;&lt;a href=&quot;game.php?page=galaxy&amp;cp={{$planet_id}}&amp;galaxy={{$planet_galaxy}}&amp;system={{$planet_system}}&amp;position={{$planet_planet}}&quot;&gt;{{$lm_galaxy}}&lt;/a&gt;">
		<img class="planetPic js_replace2x"
					alt="{{$planet_name}}"
					src="img/planets/{{$planet_image}}_{{$planet_size_2}}.png"
					width="{{$planet_size_3}}"
					height ="{{$planet_size_3}}"/>
					<br>
        <span class="planet-name ">{{$planet_name}}</span>
        <span class="planet-koords ">[{{$planet_galaxy}}:{{$planet_system}}:{{$planet_planet}}]</span>
    </a>
	{{$is_activity}}
	{!! $is_build !!}
	{!! $moon_img !!}
</div>