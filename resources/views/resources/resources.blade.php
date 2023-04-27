<div id="resourcesettingscomponent" class="maincontent">
    <div id="inhalt">
        <div id="planet" class="shortHeader">
            <h2>{{ $Production_of_resources_in_the_planet }}</h2>
        </div>
        <div class="contentRS">
            <div class="headerRS"><a
                    href="https://s142-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=supplies"
                    class="close_details close_ressources"></a></div>
            <div class="mainRS">
                <form method="POST" action="#">
                    <input type="hidden" name="saveSettings" value="1">
                    <input type="hidden" name="token" value="0933415af780a07837921f9bedb3558a">
                    <table cellpadding="0" cellspacing="0" class="list listOfResourceSettingsPerPlanet"
                        style="margin-top:0px;">
                        <tbody>
                            <tr>
                                <td colspan="7" id="factor">
                                    <div class="secondcol">
                                        <div style="width:376px; margin: 0px auto;">
                                            <span class="factorkey">Factor de producción: 93%</span>
                                            <span class="factorbutton">
                                                <input class="btn_blue" name="action" type="submit"
                                                    value="{{ $rs_calculate }}">
                                            </span>
                                            <br class="clearfloat">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="2"></th>
                                <th>
                                    <div class="resourceIconSmall metal tooltipCustom" title="{{ $metal }}">
                                    </div>
                                </th>
                                <th>
                                    <div class="resourceIconSmall crystal tooltipCustom" title="{{ $crystal }}">
                                    </div>
                                </th>
                                <th>
                                    <div class="resourceIconSmall deuterium tooltipCustom" title="{{ $deuterium }}">
                                    </div>
                                </th>
                                <th>
                                    <div class="resourceIconSmall energy tooltipCustom" title="{{ $energy }}">
                                    </div>
                                </th>
                                <th></th>
                            </tr>
                            <tr class="alt">
                                <td colspan="2" class="label">{{ $rs_basic_income }}</td>
                                <td class="undermark textRight">
                                    <span class="tooltipCustom"
                                        title="{{ $metal_basic_income }}">{{ $metal_basic_income }}</span>
                                </td>
                                <td class="undermark textRight">
                                    <span class="tooltipCustom"
                                        title="{{ $crystal_basic_income }}">{{ $crystal_basic_income }}</span>
                                </td>
                                <td class="normalmark textRight">
                                    <span class="tooltipCustom"
                                        title="{{ $deuterium_basic_income }}">{{ $deuterium_basic_income }}</span>
                                </td>
                                <td class="normalmark textRight">
                                    <span class="tooltipCustom"
                                        title="{{ $energy_basic_income }}">{{ $energy_basic_income }}</span>
                                </td>
                                <td></td>
                            </tr>
                            {!! $resource_row !!}
                            {{-- <tr class=" 217">
                                <td class="label">
                                    Taladrador (Número: 0/272)
                                </td>
                                <td>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="overmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                    <select name="last217" size="1" class="undermark dropdownInitialized"
                                        style="display: none;">
                                        <option disabled="disabled"
                                            class="overcharge tooltipCustom grayscale tooltipRight js_hideTipOnMobile"
                                            title="¡Sobrecarga permitida solo con el Recolector!" value="150">150%
                                        </option>
                                        <option disabled="disabled"
                                            class="overcharge tooltipCustom grayscale tooltipRight js_hideTipOnMobile"
                                            title="¡Sobrecarga permitida solo con el Recolector!" value="140">140%
                                        </option>
                                        <option disabled="disabled"
                                            class="overcharge tooltipCustom grayscale tooltipRight js_hideTipOnMobile"
                                            title="¡Sobrecarga permitida solo con el Recolector!" value="130">130%
                                        </option>
                                        <option disabled="disabled"
                                            class="overcharge tooltipCustom grayscale tooltipRight js_hideTipOnMobile"
                                            title="¡Sobrecarga permitida solo con el Recolector!" value="120">120%
                                        </option>
                                        <option disabled="disabled"
                                            class="overcharge tooltipCustom grayscale tooltipRight js_hideTipOnMobile"
                                            title="¡Sobrecarga permitida solo con el Recolector!" value="110">110%
                                        </option>
                                        <option class="undermark" value="100" selected="">100%</option>
                                        <option class="undermark" value="90">90%</option>
                                        <option class="undermark" value="80">80%</option>
                                        <option class="undermark" value="70">70%</option>
                                        <option class="middlemark" value="60">60%</option>
                                        <option class="middlemark" value="50">50%</option>
                                        <option class="middlemark" value="40">40%</option>
                                        <option class="overmark" value="30">30%</option>
                                        <option class="overmark" value="20">20%</option>
                                        <option class="overmark" value="10">10%</option>
                                        <option class="overmark" value="0">0%</option>
                                    </select><span class="dropdown currentlySelected undermark" rel="dropdown794"
                                        style="width: 67px;"><a class="undermark" data-value="100" rel="dropdown794"
                                            href="javascript:void(0);">100%</a></span>
                                </td>
                            </tr> --}}
                            <tr class="122">
                                <td class="label">
                                    {{ $research_plasma_technology }} ({{ $level }}: {{ $plasma_level }})
                                </td>
                                <td>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="{{ $plasma_level }}">
                                        {{ $plasma_level }}
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="{{ $plasma_crystal }}">
                                        {{ $plasma_crystal }}
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="{{ $plasma_deuterium }}">
                                        {{ $plasma_deuterium }}
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="alt 1001">
                                <td class="label">
                                    Geólogo
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer geologe" title="+10% producción de mineral">
                                        <img src="https://gf2.geo.gfsrv.net/cdndf/3e567d6f16d040326c7a0ea29a4f41.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="784.7">
                                        784
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="251">
                                        251
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="119.8">
                                        119
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class=" 1002">
                                <td class="label">
                                    Ingeniero
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer engineer"
                                        title="10% + de producción de energía">
                                        <img src="https://gf2.geo.gfsrv.net/cdndf/3e567d6f16d040326c7a0ea29a4f41.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="113.214">
                                        113
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="alt 1003">
                                <td class="label">
                                    Equipo de comando
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer stab"
                                        title="+2% producción de mineral<br>2% + de producción de energía">
                                        <img src="https://gf2.geo.gfsrv.net/cdndf/3e567d6f16d040326c7a0ea29a4f41.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="156.94">
                                        156
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="50.2">
                                        50
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="23.96">
                                        23
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="22.642">
                                        22
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="2" class="label">{{ $rs_storage_capacity }}</td>
                                <td class="overmark left2">
                                    <span class="tooltipCustom" title="{{ $planet_metal_max }}">
                                        {{ $planet_metal_max }}
                                    </span>
                                </td>
                                <td class="normalmark left2">
                                    <span class="tooltipCustom" title="{{ $planet_deuterium_max }}">
                                        {{ $planet_deuterium_max }}
                                    </span>
                                </td>
                                <td class="normalmark left2">
                                    <span class="tooltipCustom" title="{{ $planet_deuterium_max }}">
                                        {{ $planet_deuterium_max }}
                                    </span>
                                </td>
                                <td class="normalmark left2">
                                    <span class="tooltipCustom" title="0">
                                        0
                                    </span>
                                </td>
                            </tr>
                            <tr class="summary alt">
                                <td colspan="2" class="label"><em>{{ $rs_sum }}</em></td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $hour_metal }}">
                                        {{ $hour_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $hour_crystal }}">
                                        {{ $hour_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $hour_deuterium }}">
                                        {{ $hour_deuterium }}
                                    </span>
                                </td>
                                <td class="overmark">
                                    <span class="tooltipCustom" title="{{ $energy_total }}">
                                        {{ $energy_total }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="">
                                <td colspan="2" class="label"><em>{{ $rs_daily }}</em></td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $daily_metal }}">
                                        {{ $daily_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $daily_crystal }}">
                                        {{ $daily_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $daily_deuterium }}">
                                        {{ $daily_deuterium }}
                                    </span>
                                </td>
                                <td class="overmark">
                                    <span class="tooltipCustom" title="{{ $energy_total }}">
                                        {{ $energy_total }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="alt">
                                <td colspan="2" class="label"><em>{{ $rs_weekly }}:</em></td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $weekly_metal }}">
                                        {{ $weekly_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $weekly_crystal }}">
                                        {{ $weekly_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom" title="{{ $weekly_deuterium }}">
                                        {{ $weekly_deuterium }}
                                    </span>
                                </td>
                                <td class="overmark">
                                    <span class="tooltipCustom" title="{{ $energy_total }}">
                                        {{ $energy_total }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="footerRS"></div>
        </div>
        <br class="clearfloat">
    </div>

    <script type="text/javascript">
        function initResourceSettings() {
            $('.mainRS tr:gt(0)').hover(function() {
                $(this).addClass('hover');
            }, function() {
                $(this).removeClass('hover');
            });
        }
        $(function() {
            initResourceSettings();
        });
    </script>
</div>
