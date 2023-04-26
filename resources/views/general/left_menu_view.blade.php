{{-- <div id="leftmenu">
    <script language="JavaScript">
        function f(target_url, win_name) {
            var new_win = window.open(target_url, win_name, 'resizable=yes,scrollbars=yes,menubar=no,toolbar=no,width=550,height=280,top=0,left=0');
            new_win.focus();
        }
    </script>
    <center>
        <div id="menu">
            <p style="width:110px;">
                <NOBR>
                    {{ $lm_players }} <strong>{!! $user_name !!}</strong>
                </NOBR>
            </p>
            <table width="110" cellspacing="0" cellpadding="0">
                <tr>
                    <td>
                        <img src="{{ $dpath }}menu/ogame-produktion.jpg" width="110" height="40" />
                    </td>
                </tr>
                {!! $menu_block1 !!}
                <tr>
                    <td>
                        <img src="{{ $dpath }}menu/info-help.jpg" width="110" height="19">
                    </td>
                </tr>
                {!! $menu_block2 !!}
                <tr>
                    <td>
                        <img src="{{ $dpath }}menu/user-menu.jpg" width="110" height="35">
                    </td>
                </tr>
                {!! $menu_block3 !!}
                {!! $admin_link !!}
                <tr>
                    <td>
                        <img src="{{ $dpath }}menu/info-help.jpg" width="110" height="19">
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:center">
                            {{ $servername }} ({!! $changelog !!})
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="text-align:center">
                            <span style="color:#FFFFFF">
                                <a href="#" title="Powered by XG Proyect {{ $version }} &copy; 2008 - {{ $year }} GNU General Public License">&copy; 2008 - {{ $year }}</a>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </center>
</div>
<!-- END LEFTMENU --> --}}
<div id="links">
    <ul id="menuTable" class="leftmenu">

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=rewards"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="">
                    <div class="menuImage overview active 
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton  selected"
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=overview"
                accesskey="" target="_self">
                <span class="textlabel">Resumen</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=resourcesettings"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="Opciones de recursos">
                    <div class="menuImage resources  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=supplies"
                accesskey="" target="_self">
                <span class="textlabel">Recursos</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=lfresearch"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="Desarrollo de forma de vida">
                    <div class="menuImage lifeform  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=lfbuildings"
                accesskey="" target="_self">
                <span class="textlabel">Forma de vida</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=facilities"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="Salto cuántico">
                    <div class="menuImage station  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=facilities"
                accesskey="" target="_self">
                <span class="textlabel">Instalaciones</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=traderOverview#page=traderResources&amp;animation=false"
                    class="trader tooltipRight js_hideTipOnMobile " target="_self" title="Mercado de recursos">
                    <div class="menuImage traderOverview  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton premiumHighligt"
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=traderOverview"
                accesskey="" target="_self">
                <span class="textlabel">Comerciante</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ajax&amp;component=technologytree&amp;tab=3&amp;open=all"
                    class="overlay tooltipRight js_hideTipOnMobile " target="_blank" title="Técnica">
                    <div class="menuImage research  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=research"
                accesskey="" target="_self">
                <span class="textlabel">Investigación</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage shipyard  "></span>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=shipyard"
                accesskey="" target="_self">
                <span class="textlabel">Hangar</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage defense  "></span>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=defenses"
                accesskey="" target="_self">
                <span class="textlabel">Defensa</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=movement"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="movimiento de flota">
                    <div class="menuImage fleet1  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=fleetdispatch"
                accesskey="" target="_self">
                <span class="textlabel">Flota</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage galaxy  "></span>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=galaxy"
                accesskey="" target="_self">
                <span class="textlabel">Galaxia</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage empire  "></span>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=standalone&amp;component=empire"
                accesskey="" target="_blank">
                <span class="textlabel">Imperio</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage alliance  "></span>
            </span>
            <a class="menubutton "
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=alliance"
                accesskey="" target="_self">
                <span class="textlabel">Alianza</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <span class="menuImage premium  "></span>
            </span>
            <a class="menubutton premiumHighligt officers"
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=premium" accesskey="" target="_self">
                <span class="textlabel">Casino</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=shop#page=inventory&amp;category=d8d49c315fa620d9c7f1f19963970dea59a0e3be"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="Inventario">
                    <div class="menuImage shop  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton premiumHighligt" href="https://s145-ar.ogame.gameforge.com/game/index.php?page=shop"
                accesskey="" target="_self">
                <span class="textlabel">Tienda</span>
            </a>
        </li>

        <li>
            <span class="menu_icon">
                <a href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=rewarding&amp;tab=rewards&amp;tier=1"
                    class="tooltipRight js_hideTipOnMobile " target="_self" title="Rango actual">
                    <div class="menuImage rewarding  
                    ">
                    </div>
                </a>
            </span>
            <a class="menubutton premiumHighligt"
                href="https://s145-ar.ogame.gameforge.com/game/index.php?page=ingame&amp;component=rewarding"
                accesskey="" target="_self">
                <span class="textlabel">Recompensas</span>
            </a>
        </li>
    </ul>

    <div id="toolLinksWrapper">
        <ul id="menuTableTools" class="leftmenu"></ul>
    </div>
    <br class="clearfloat" />
</div>
