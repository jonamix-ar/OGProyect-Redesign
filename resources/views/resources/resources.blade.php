<div id="resourcesettingscomponent" class="maincontent">
    <div id="inhalt">
        <div id="planet" class="shortHeader">
            <h2>{{ $Production_of_resources_in_the_planet }}</h2>
        </div>
        <div class="contentRS">
            <div class="headerRS"><a
                    href="game.php?page=resources"
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
                                            <span class="factorkey">{{ $rs_production_factor }} {{ $production_factor }}</span>
                                            {!! $recalculate_button !!}
                                            <br class="clearfloat">
                                        </div>
                                    </div>
									{!! $second_overmark !!}
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
							<tr class="122">
                                <td class="label">
                                    {{ $research_plasma_technology }} ({{ $level }}{{ $plasma_level }})
                                </td>
                                <td>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="{{ $plasmametal }}">
                                        {{ $plasma_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="{{ $plasma_crystal }}">
                                        {{ $plasma_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
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
                            <tr class="122">
                                <td class="label">
                                    {{ $research_plasma_technology }} ({{ $level }}{{ $plasma_level }})
                                </td>
                                <td>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="{{ $plasmametal }}">
                                        {{ $plasma_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom " title="{{ $plasma_crystal }}">
                                        {{ $plasma_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
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
                                    Objetos
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
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class=" 604">
                                <td class="label">
                                    {{ $officiers[604]['name'] }}
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer geologe {{ $geologe_grayscale }}"
										title="{{ $geologe_description }}">
                                        <img src="{{ $img_path }}/layout/pixel.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $geologe_disabled }}" title="{{ $geologe_metal }}">
										{{ $geologe_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $geologe_disabled }}" title="{{ $geologe_crystal }}">
                                        {{ $geologe_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $geologe_disabled }}" title="{{ $geologe_deuterium }}">
                                        {{ $geologe_deuterium }}
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom {{ $geologe_disabled }}" title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class="alt 603">
                                <td class="label">
									{{ $officiers[603]['name'] }}
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer engineer {{ $engineer_grayscale }}"
                                        title="{{ $engineer_description }}">
                                        <img src="{{ $img_path }}/layout/pixel.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom {{ $engineer_disabled }}" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom {{ $engineer_disabled }}" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="normalmark">
                                    <span class="tooltipCustom {{ $engineer_disabled }}" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $engineer_disabled }}" title="{{ $engineer_energy }}">
                                        {{ $engineer_energy }}
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class=" 610">
                                <td class="label">
                                    {{ $officiers[610]['name'] }}
                                </td>
                                <td>
                                    <div class="tooltipCustom smallOfficer stab {{ $commanding_grayscale }}"
                                        title="{{ $commanding_description }}">
                                        <img src="{{ $img_path }}/layout/pixel.gif"
                                            width="25" height="25">
                                    </div>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $commanding_disabled }}" title="{{ $commanding_metal }}">
                                        {{ $commanding_metal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $commanding_disabled }}" title="{{ $commanding_crystal }}">
                                        {{ $commanding_crystal }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $commanding_disabled }}" title="{{ $commanding_deuterium }}">
                                        {{ $commanding_deuterium }}
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom {{ $commanding_disabled }}" title="{{ $commanding_energy }}">
                                        {{ $commanding_energy }}
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr><tr class="alt 1003">
                                <td class="label">
                                    Clase
                                </td>
                                <td>
									<div class="tooltipCustom  sprite characterclass medium warrior" title="">
                                            <img src="{{ $img_path }}/layout/pixel.gif" width="25" height="25">
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
                                <td class="normalmark">
                                    <span class="tooltipCustom " title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <tr class=" 1003">
                                <td class="label">
                                    Clase de alianza
                                </td>
                                <td>
									<a href="https://s137-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=alliance&amp;tab=classselection"
										class="tooltipCustom sprite allianceclass medium none grayscale js_hideTipOnMobile tpd-hideOnClickOutside"
										title="">
										<img src="{{ $img_path }}/layout/pixel.gif" width="25" height="25">
									</a>
								</td>
                                <td class="undermark">
                                    <span class="tooltipCustom disabled" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom disabled" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom disabled" title="0">
                                        0
                                    </span>
                                </td>
                                <td class="undermark">
                                    <span class="tooltipCustom disabled" title="0">
                                        0
                                    </span>
                                </td>
                                <td>
                                </td>
                            </tr>
                            
                            <tr class="alt">
                                <td colspan="2" class="label">{{ $rs_storage_capacity }}</td>
                                <td class="{{ $class_metal_max }} left2">
                                    <span class="tooltipCustom" title="{{ $planet_metal_max_wof }}">
                                        {{ $planet_metal_max }}
                                    </span>
                                </td>
                                <td class="{{ $class_crystal_max }} left2">
                                    <span class="tooltipCustom" title="{{ $planet_crystal_max_wof }}">
                                        {{ $planet_crystal_max }}
                                    </span>
                                </td>
                                <td class="{{ $class_deuterium_max }} left2">
                                    <span class="tooltipCustom" title="{{ $planet_deuterium_max_wof }}">
                                        {{ $planet_deuterium_max }}
                                    </span>
                                </td>
                                <td class="normalmark left2">
                                    <span class="tooltipCustom" title="0">
                                        0
                                    </span>
                                </td>
                            </tr>
                            <tr class="summary">
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
                                <td class="{{ $energy_class }}">
                                    <span class="tooltipCustom" title="{{ $energy_total }}/{{ $energy_total2 }}">
                                        {{ $energy_total }}/{{ $energy_total2 }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="alt">
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
                                <td class="{{ $energy_class }}">
                                    <span class="tooltipCustom" title="{{ $energy_total }}/{{ $energy_total2 }}">
                                        {{ $energy_total }}/{{ $energy_total2 }}
                                    </span>
                                </td>
                                <td></td>
                            </tr>
                            <tr class="">
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
                                <td class="{{ $energy_class }}">
                                    <span class="tooltipCustom" title="{{ $energy_total }}/{{ $energy_total2 }}">
                                        {{ $energy_total }}/{{ $energy_total2 }}
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
