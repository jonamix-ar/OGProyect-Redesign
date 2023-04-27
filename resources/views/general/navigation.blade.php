<div id="bar">
    <ul>
        <li id="playerName">
            {{ $player_text }}
            <span class="textBeefy">
                <a href="http://localhost/OGProyect-redesign/game.php?page=notes"
                    class="overlay textBeefy" data-overlay-title="" data-overlay-popup-width="400"
                    data-overlay-popup-height="200">{{ $player_name }}</a>
            </span>
        </li>
        {!! $navigation_menu !!}
        <li class="OGameClock">{{ $date }} <span>{{ $time }}</span></li>
    </ul>
</div>
