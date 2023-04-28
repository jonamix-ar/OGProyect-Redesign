<table cellspacing="0" cellpadding="0" class="construction active">
    <tbody>
        <tr>
            <th colspan="2">{{ $shipyard_name }}</th>
        </tr>
        <tr class="data">
            <td class="first" rowspan="5">
                <div>
                    <a href="{{ $game_url }}game.php?page=shipyard&amp;openTech={{ $shipyard_id }}">
                        <img class="queuePic" width="40" height="40"
                            src="{{ $img_path . 'small/small_' . $shipyard_id . '.jpg' }}" alt="{{ $shipyard_name }}">
                    </a>
                </div>
                <div class="shipSumCount" id="shipSumCount7">{{ $shipyard_count }}</div>
            </td>
        </tr>
        <tr class="data">
            <td class="desc">{{ $building_duration }}</td>
        </tr>
        <tr class="data">
            <td class="desc timer">
                <span id="shipyardCountdown" style="height: 4px; margin-top: 9px;">{{ $shipyard_time_formated }}</span>
            </td>
        </tr>
        <tr class="data">
            <td class="desc">{{ $total_time }}:</td>
        </tr>
        <tr class="data">
            <td class="desc timer">
                <span id="shipyardCountdown2">{{ $shipyard_total_time }}</span>
            </td>
        </tr>
    </tbody>
</table>
{!! $shipyard_queue !!}
<script type="text/javascript">
    var refreshLinkship = '{{ $game_url }}game.php?page=overview';
    var cancelLinkship =
        '';
    var questionship =
        'Do\u0020you\u0020want\u0020to\u0020reduce\u0020the\u0020construction\u0020time\u0020by\u002050\u0025\u0020of\u0020the\u0020total\u0020construction\u0020time\u0020\u002830s\u0029\u0020for\u0020\u003Cb\u003E750\u0020Dark\u0020Matter\u003C\/b\u003E\u003F';
    var priceship = 750;
    var referrerPage = $.deparam.querystring().page;

    new schiffbauCountdown(document.getElementById('shipyardCountdown'), {{ $shipyard_count }}, {{ $shipyard_count }},
        {{ $shipyard_time }}, {{ $shipyard_total_time }}, refreshLinkship);
    var countdownIdship2 = '#shipyardCountdown2';
    var techDetailsship2 = '#countdownshipDetails';
    var restTimeship2 = {{ $shipyard_total_time }};
    new baulisteCountdown(countdownIdship2, restTimeship2, refreshLinkship, null, techDetailsship2);

    if (true) { //$type == 'TemplateHelper::TYPE_PBOX_RESEARCH'
        function cancelship(id, listId, question) {
            errorBoxDecision(
                'Caution',
                "" + question + "",
                'yes',
                'No',
                function() {
                    window.location.replace(cancelLinkship + "&type=" + id + "&listid=" + listId);
                }
            );
        }

        function redirectPremium() {
            location.href = 'https://s801-en.ogame.gameforge.com/game/index.php?page=premium&showDarkMatter=1';
        }
    }

    $(function() {});
</script>
