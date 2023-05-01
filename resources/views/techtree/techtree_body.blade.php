<div id="technologytree" data-title="Técnica">
	<nav data-current-action="{{$current_tab}}">
		<ul>
			<li>
				<a class="overlay"
				   data-action="technologytree"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId=1&amp;tab=1"
				>
					Tecnología
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="applications"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId=1&amp;tab=4"
				>
					Aplicaciones
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="technologyinformation"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId=1&amp;tab=2"
				>
					Información
				</a>
			</li>
			<li>
				<a class="overlay"
				   data-action="technologies"
				   data-overlay-same="true"
				   href="game.php?page=techtree&amp;technologyId=1&amp;tab=3"
				>
					Técnica
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