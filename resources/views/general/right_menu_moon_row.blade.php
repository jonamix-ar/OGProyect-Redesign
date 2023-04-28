<a class="moonlink {{$actual_planet}} tooltipLeft tooltipClose js_hideTipOnMobile"
   title="&lt;b&gt;{{$planet_name}} [{{$planet_galaxy}}:{{$planet_system}}:{{$planet_planet}}]&lt;/b&gt;&lt;br&gt;{{$planet_diameter}}{{$lm_distance_unit}} ({{$planet_field_current}}/{{$planet_field_max}})&lt;br/&gt;
   &lt;a href=&quot;game.php?page=resources&amp;cp={{$planet_id}}&quot;&gt;{{$lm_resources}}&lt;/a&gt;
   &lt;br/&gt;&lt;a href=&quot;game.php?page=station&amp;cp={{$planet_id}}&quot;&gt;{{$lm_station}}&lt;/a&gt;
   &lt;br/&gt;&lt;a href=&quot;game.php?page=defense&amp;cp={{$planet_id}}&quot;&gt;{{$lm_defenses}}&lt;/a&gt;
   &lt;br/&gt;&lt;a href=&quot;game.php?page=fleet1&amp;cp={{$planet_id}}&quot;&gt;{{$lm_fleet}}&lt;/a&gt;
   &lt;br/&gt;&lt;a href=&quot;game.php?page=galaxy&amp;cp={{$planet_id}}&amp;galaxy={{$planet_galaxy}}&amp;system={{$planet_system}}&amp;position={{$planet_position}}&quot;&gt;{{$lm_galaxy}}&lt;/a&gt;"
   href="game.php?page={{$current_page}}&amp;cp={{$planet_id}}">

	<img src="img/planets/moon/{{$planet_image}}_small.gif"
		 width="16"
		 height="16"
		 alt="{{$planet_name}}"
		 class="icon-moon" />
</a>
{!! $is_build !!}