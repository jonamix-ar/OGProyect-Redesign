<table cellspacing="0" cellpadding="0" class="construction active">
    <tbody>
        <tr>
            <th colspan="2">{{ $building_name }}</th>
        </tr>
        <tr class="data">
            <td class="first" rowspan="3">
                <div>
                    <a href="javascript:void(0);" class="tooltip js_hideTipOnMobile" style="display: block;"
                        onclick="cancelbuilding({{ $building_id }}, {{ $building_current }}, '{{ $building_cancel }}'}); return false;"
                        title="{{ $building_cancel }}">
                        <img class="queuePic" width="40" height="40"
                            src="{{ $img_path . 'small/small_' . $building_id . '.jpg' }}" alt="{{ $building_name }}">
                    </a>
                    <a href="javascript:void(0);" class="tooltip js_hideTipOnMobile abortNow"
                        onclick="cancelbuilding({{ $building_id }}, {{ $building_current }}, '{{ $building_cancel }}'); return false;"
                        title="{{ $building_cancel }}">
                        <img src="{{ $img_path . 'layout/pixel.gif' }}" height="15" width="15">
                    </a>
                </div>
            </td>
            <td class="desc ausbau">{{ $improve_to }}
                <span class="level">{{ $level . $building_level }}</span>
            </td>
        </tr>
        <tr class="data">
            <td class="desc">{{ $duration }}:</td>
        </tr>
        <tr class="data">
            <td class="desc timer">
                <span id="buildingCountdown">{{ $building_time_end_formated }}</span>
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
            </td>
        </tr>
    </tbody>
</table>
<script>
    var refreshLinkbuilding = '{{ $game_url }}game.php?page=overview';
    var cancelLinkbuilding =
        'game.php?page=resources&r=overview&listid=0&cmd=cancel&planet={{ $planet_id }}"';
    var questionbuilding = '{{ $build_cancel }}';
    var pricebuilding = 0;
    var referrerPage = $.deparam.querystring().page;

    var countdownIdbuilding = '#buildingCountdown';
    var techDetailsbuilding = '#countdownbuildingDetails';
    var restTimebuilding = {{ $building_time }} - Math.floor((Date.now() + window.timeDiff + window
            .timeZoneDiffSeconds *
            1000) /
        1000);
    new baulisteCountdown(countdownIdbuilding, restTimebuilding, refreshLinkbuilding, null, techDetailsbuilding);

    if (true) { //$type == 'TemplateHelper::TYPE_PBOX_RESEARCH'
        function cancelbuilding(id, listId, question) {
            errorBoxDecision(
                'Caution',
                "" + question + "",
                'yes',
                'No',
                function() {
                    window.location.replace(cancelLinkbuilding + "&type=" + id + "&listid=" + listId);
                }
            );
        }

        function redirectPremium() {
            location.href = 'https://s801-en.ogame.gameforge.com/game/index.php?page=premium&showDarkMatter=1';
        }
    }

    $(function() {});
</script>
