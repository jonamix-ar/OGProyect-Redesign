<table cellspacing="0" cellpadding="0" class="construction active">
    <tbody>
        <tr>
            <th colspan="2">{{ $research_name }}</th>
        </tr>
        <tr class="data">
            <td class="first" rowspan="3">
                <div>
                    <a href="javascript:void(0);" class="tooltip js_hideTipOnMobile" style="display: block;"
                        onclick="cancelresearch({{ $research_id }}, {{ $research_time_cancel }}, &quot;{{ $button_cancel_text }}&quot;); return false;"
                        title="{{ $button_cancel_text }}">
                        <img class="queuePic" width="40" height="40"
                            src="{{ $img_path . 'small/small_' . $research_id . '.jpg' }}" alt="{{ $research_name }}">
                    </a>
                    <a href="javascript:void(0);" class="tooltip js_hideTipOnMobile abortNow"
                        onclick="cancelresearch({{ $research_id }}, {{ $research_time_cancel }}, &quot;{{ $button_cancel_text }}&quot;); return false;"
                        title="{{ $button_cancel_text }}">
                        <img src="https://gf2.geo.gfsrv.net/cdndf/3e567d6f16d040326c7a0ea29a4f41.gif" height="15"
                            width="15">
                    </a>
                </div>
            </td>
            <td class="desc ausbau">{{ $research_to }}
                <span class="level">{{ $level . $research_level }}</span>
            </td>
        </tr>
        <tr class="data">
            <td class="desc">{{ $duration }}:</td>
        </tr>
        <tr class="data">
            <td class="desc timer">
                <span id="researchCountdown">{{ $research_to_end }}</span>
            </td>
        </tr>
        <tr class="data">
            <td colspan="2">
                {{-- <a class="build-faster dark_highlight tooltipLeft js_hideTipOnMobile research "
                    title="Reduce el tiempo de investigación al 50% del total (11s)" href="javascript:void(0);"
                    rel="https://s142-ar.ogame.gameforge.com/game/index.php?page=inventory&amp;buyAndActivate=14c17d49462963f5e5b67efa1257622ce1b866ac"
                    token="fa78f4ef15fd2b27279034e90cf81981">
                    <div class="                                                build-faster-img
						"
                        alt="                                                Reducir tiempo a la mitad
						"></div>
                    <span class="build-txt">
                        Reducir tiempo a la mitad
                    </span>
                    <span class="dm_cost ">
                        Costes:
                        675 MO
                    </span>
                </a> --}}
            </td>
        </tr>
    </tbody>
</table>
{{-- <table class="queue">
    <tbody>
        <tr>

            <td class="tooltip js_hideTipOnMobile tpd-hideOnClickOutside" title="" style="text-align: center">
                <a class="queue_link dark_highlight_tablet" href="javascript:void(0);"
                    onclick="cancelbuilding(2, 840190, &quot;\u00bfCancelar la mejora de Mina de cristal al Nivel 12?&quot;); return false;"
                    title="¿Cancelar la mejora de Mina de cristal al Nivel 12?">
                    <img class="queuePic" height="28" width="28"
                        src="https://gf3.geo.gfsrv.net/cdn21/6468ceef42917eea7b76f72dd3b70a.jpg" alt="Mina de cristal">
                    12
                </a>
            </td>
        </tr>
    </tbody>
</table> --}}
<script type="text/javascript">
    var refreshLinkresearch = '{{ $game_url }}game.php?page=overview';
    var cancelLinkresearch = '{{ $game_url }}game.php?page=research&cmd=cancel&tech={{ $research_id }}';
    var questionresearch =
        '\u00BFQuieres\u0020reducir\u0020el\u0020tiempo\u0020de\u0020investigaci\u00F3n\u0020al\u002050\u0025\u0020del\u0020total\u0020\u002822s\u0029\u0020por\u0020\u003Cb\u003E675\u0020de\u0020Materia\u0020Oscura\u003C\/b\u003E\u003F';
    var priceresearch = 0;
    var referrerPage = $.deparam.querystring().page;

    var countdownIdresearch = '#researchCountdown';
    var techDetailsresearch = '#countdownresearchDetails';
    var restTimeresearch = {{ $research_time }} - Math.floor((Date.now() + window.timeDiff + window
            .timeZoneDiffSeconds * 1000) /
        1000);
    new baulisteCountdown(countdownIdresearch, restTimeresearch, refreshLinkresearch, null, techDetailsresearch);

    if (true) { //$type == 'TemplateHelper::TYPE_PBOX_RESEARCH'
        function cancelresearch(id, listId, question) {
            errorBoxDecision(
                'Cuidado',
                "" + question + "",
                'si',
                'No',
                function() {
                    window.location.replace(cancelLinkresearch + "&type=" + id + "&listid=" + listId);
                }
            );
        }

        function redirectPremium() {
            location.href = 'https://s142-ar.ogame.gameforge.com/game/index.php?page=premium&showDarkMatter=1';
        }
    }

    $(function() {});
</script>
