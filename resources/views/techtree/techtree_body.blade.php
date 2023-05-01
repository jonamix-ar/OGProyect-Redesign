<div id="technologytree" data-title="Técnica">
	<nav data-current-action="{{$current_tab}}">
		<ul>
			<li>
				<a class="overlay"
				   data-action="technologytree"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId={{$tech_id}}&amp;tab=1"
				>
					{{$tt_techtree}}
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="applications"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId={{$tech_id}}&amp;tab=4"
				>
					{{$tt_applications}}
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="technologyinformation"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId={{$tech_id}}&amp;tab=2"
				>
					{{$tt_techinfo}}
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="technologies"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId={{$tech_id}}&amp;tab=3"
				>
					{{$tt_technology}}
				</a>
			</li>
		</ul>
	</nav>

	{!! $techtree_view !!}
</div>
<script type="text/javascript">
  (function($){
    initOverlayName();
  })(jQuery);
</script>