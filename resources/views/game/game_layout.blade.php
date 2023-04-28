<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $game_title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">
        /**
         * This is only currently needed in a separate file in libraries because
         * the javascript files are loaded alphabetically from files and we need to
         * ensure that our namespace object is loaded before all other ogproyect specific
         * javascript code
         */

        /*
         * global javascript namespace for ogproyect
         */
        var ogproyect = ogproyect || {};
    </script>
    {!! $meta_tags !!}
    <meta name="ogproyect-session" content="8cd0506ce2f393fa12018cf5d0e8fb5e17a266a9" />
    <meta name="ogproyect-version" content="{{ $version }}" />
    <meta name="ogproyect-timestamp" content="1682253758" />
    <meta name="ogproyect-universe" content="s145-ar.ogproyect.gameforge.com" />
    <meta name="ogproyect-universe-name" content="Spica" />
    <meta name="ogproyect-universe-speed" content="8" />
    <meta name="ogproyect-universe-speed-fleet-peaceful" content="2" />
    <meta name="ogproyect-universe-speed-fleet-war" content="1" />
    <meta name="ogproyect-universe-speed-fleet-holding" content="1" />
    <meta name="ogproyect-language" content="ar" />
    <meta name="ogproyect-donut-galaxy" content="1" />
    <meta name="ogproyect-donut-system" content="1" />
    <meta name="ogproyect-player-id" content="102605" />
    <meta name="ogproyect-player-name" content="Constable Phoenix" />
    <meta name="ogproyect-planet-id" content="33650641" />
    <meta name="ogproyect-planet-name" content="Planeta Principal" />
    <meta name="ogproyect-planet-coordinates" content="2:85:12" />
    <meta name="ogproyect-planet-type" content="planet" />

    <script type="text/javascript">
        var ajaxEventboxURI =
            'game.php?page=componentOnly&component=eventList&action=fetchEventBox&ajax=1&asJson=1';
        var ajaxResourceboxURI = 'game.php?page=fetchResources&ajax=1';
        var eventboxLoca = {
            "mission": "Misi\u00f3n",
            "missions": "Encargos",
            "next misson": "DUMMY_KEY_N\u00e4chster_fertig",
            "type": "DUMMY_KEY_Art",
            "friendly": "propia",
            "neutral": "amiga",
            "hostile": "enemiga",
            "nextEvent": "Siguiente",
            "nextEventText": "Tipo"
        };
        var eventlistLink =
            "game.php?page=componentOnly&component=eventList&ajax=1";
    </script>

    <link rel="stylesheet" type="text/css" href="{{ $css_path . 'ogproyect-default.css' }}" />
    <link rel="stylesheet" type="text/css" href="{{ $css_path . 'resourcesbar.css' }}" />
    <link rel="stylesheet" type="text/css" href="{{ $css_path . 'retrieveEmail.css' }}" />
    <link rel="stylesheet" type="text/css" href="{{ $css_path . 'technologydetails.css' }}" />
    <link rel="stylesheet" type="text/css" href="{{ $css_path . 'technologytree.css' }}" />

    <script type='text/javascript' src='{{ $js_path . 'jquery.js' }}'></script>
    <script type='text/javascript' src='{{ $js_path . 'jquery.jsPlumb.js' }}'></script>
    <script type='text/javascript' src='{{ $js_path . 'ogproyect-default.js' }}'></script>

    <script type="text/javascript">
        var changeSettingsLink = "{{ $game_url_js }}game.php?page=changeSettings";
        var changeSettingsToken = "810573ac5ca7652431d6ad0419049b49";
        var redirectLogoutLink = "{{ $game_url_js }}game.php?page=logout";
        var redirectPremiumLink = "{{ $game_url_js }}game.php?page=premium&showDarkMatter=1";
        var redirectOverviewLink = "{{ $game_url_js }}game.php?page=ingame&component=overview";
        var redirectSpaceDockLink =
            "{{ $game_url_js }}game.php?page=ingame&component=facilities&openTech=36";
        var constants = {
            "lifeformEnabled": true,
            "espionage": 6,
            "missleattack": 10,
            "discover": 18,
            "language": "ar",
            "name": "145"
        };
        var currentPage = "overview";
        var changeNickLink =
            "{{ $game_url_js }}game.php?page=ajax&component=changenick&asJson=1";
    </script>

    <script type="text/javascript">
        var playerId = 102605;
        var playerName = "Constable Phoenix";
        var player = {
            "playerId": 102605,
            "name": "Constable Phoenix",
            "hasCommander": false,
            "hasAPassword": true
        };
        var session = "8cd0506ce2f393fa12018cf5d0e8fb5e17a266a9";
        var vacation = 0;
        var hasAPassword = true;
        var locaKeys = {
            "bold": "Negrita",
            "italic": "Cursiva",
            "underline": "Subrayado",
            "stroke": "Tachado",
            "sub": "Sub\u00edndice",
            "sup": "Super\u00edndice",
            "fontColor": "Color del texto",
            "fontSize": "Tama\u00f1o del texto",
            "backgroundColor": "Color de fondo",
            "backgroundImage": "Imagen de fondo",
            "tooltip": "Descripci\u00f3n emergente",
            "alignLeft": "Alineado a la izquierda",
            "alignCenter": "Centrado",
            "alignRight": "Alineado a la derecha",
            "alignJustify": "Justificado",
            "block": "Salto de l\u00ednea",
            "code": "C\u00f3digo",
            "spoiler": "M\u00e1s opciones",
            "moreopts": "",
            "list": "Lista",
            "hr": "L\u00ednea horizontal",
            "picture": "Imagen",
            "link": "Enlace",
            "email": "Correo electr\u00f3nico",
            "player": "Jugador",
            "item": "Objeto",
            "coordinates": "Coordenadas",
            "preview": "Vista previa",
            "textPlaceHolder": "Texto...",
            "playerPlaceHolder": "ID o nombre de jugador",
            "itemPlaceHolder": "ID de objeto",
            "coordinatePlaceHolder": "Galaxia:Sistema:Posici\u00f3n",
            "charsLeft": "Caracteres restrantes",
            "colorPicker": {
                "ok": "Ok",
                "cancel": "cancelar",
                "rgbR": "R",
                "rgbG": "V",
                "rgbB": "A"
            },
            "backgroundImagePicker": {
                "ok": "Ok",
                "repeatX": "Repetir en horizontal",
                "repeatY": "Repetir en vertical"
            }
        };
        var itemNames = {
            "1aa36213cb676fd5baad5edc2bee4fbe117a778b": "Investigadores",
            "6c9fe5e35bdad0d4e3382eb6a5aeac6bc8263752": "Comerciantes",
            "9b48e257cbef6c5df0f03a47cead7f9abda3d437": "Combatientes",
            "090a969b05d1b5dc458a6b1080da7ba08b84ec7f": "Amplificador de cristal (bronce)",
            "e254352ac599de4dd1f20f0719df0a070c623ca8": "Amplificador de deuterio (bronce)",
            "b956c46faa8e4e5d8775701c69dbfbf53309b279": "Amplificador de metal (bronce)",
            "2dd05cc4c0e185fce2e712112dc44932027aee98": "Descubridor",
            "9374c79a24b84c4331f0d26526ef6c2d33319a6e": "Recolector",
            "77eff880829027daf23b755e14820a60c4c6fd93": "General",
            "3c9f85221807b8d593fa5276cdf7af9913c4a35d": "Amplificador de cristal (bronce)",
            "060902a23da9dd917f1a754fe85734a91ec8d785": "Amplificador de cristal (bronce)",
            "bb7579f7a21152a4a256f001d5162765e2f2c5b9": "Amplificador de cristal (bronce)",
            "422db99aac4ec594d483d8ef7faadc5d40d6f7d3": "Amplificador de cristal (plata)",
            "5b69663e3ba09a1fe77cf72c5094e246cfe954d6": "Amplificador de cristal (plata)",
            "04d8afd5936976e32ce894b765ea8bd168aa07ef": "Amplificador de cristal (plata)",
            "118d34e685b5d1472267696d1010a393a59aed03": "Amplificador de cristal (oro)",
            "36fb611e71d42014f5ebd0aa5a52bc0c81a0c1cb": "Amplificador de cristal (oro)",
            "d45f00e8b909f5293a83df4f369737ea7d69c684": "Amplificador de cristal (oro)",
            "35d96e441c21ef112a84c618934d9d0f026998fd": "Amplificador de cristal (platino)",
            "6bf45fcba8a6a68158273d04a924452eca75cf39": "Amplificador de cristal (platino)",
            "7c2edf40c5cd54ad11c6439398b83020c0a7a6be": "Amplificador de cristal (platino)",
            "d3d541ecc23e4daa0c698e44c32f04afd2037d84": "DETROID (bronce)",
            "0968999df2fe956aa4a07aea74921f860af7d97f": "DETROID (oro)",
            "3347bcd4ee59f1d3fa03c4d18a25bca2da81de82": "DETROID (platino)",
            "27cbcd52f16693023cb966e5026d8a1efbbfc0f9": "DETROID (plata)",
            "d9fa5f359e80ff4f4c97545d07c66dbadab1d1be": "Amplificador de deuterio (bronce)",
            "d50005c05fd5b95125364af43c78dfaba64d7f83": "Amplificador de deuterio (bronce)",
            "63d11915e9af76ee41938cc099dbf8d54ad59a17": "Amplificador de deuterio (bronce)",
            "e4b78acddfa6fd0234bcb814b676271898b0dbb3": "Amplificador de deuterio (plata)",
            "26416a3cdb94613844b1d3ca78b9057fd6ae9b15": "Amplificador de deuterio (plata)",
            "6f0952a919fd2ab9c009e9ccd83c1745f98f758f": "Amplificador de deuterio (plata)",
            "5560a1580a0330e8aadf05cb5bfe6bc3200406e2": "Amplificador de deuterio (oro)",
            "300493ddc756869578cb2888a3a1bc0c3c66765f": "Amplificador de deuterio (oro)",
            "dc5896bed3311434224d511fa7ced6fdbe41b4e8": "Amplificador de deuterio (oro)",
            "4b51d903560edd102467b110586000bd64fdb954": "Amplificador de deuterio (platino)",
            "620f779dbffa1011aded69b091239727910a3d03": "Amplificador de deuterio (platino)",
            "831c3ea8d868eb3601536f4d5e768842988a1ba9": "Amplificador de deuterio (platino)",
            "3f6f381dc9b92822406731a942c028adf8dc978f": "Amplificador de energ\u00eda (bronce)",
            "7eeeb36a455c428eb6923a50d2f03544b6dd05d6": "Amplificador de energ\u00eda (bronce)",
            "6837c08228d2b023fb955ca2dc589a0a4bed3ba8": "Amplificador de energ\u00eda (bronce)",
            "c2bad58fcec374d709099d11d0549e59ea7e233e": "Amplificador de energ\u00eda (plata)",
            "bedd248aaf288c27e9351cfacfa6be03f1dbb898": "Amplificador de energ\u00eda (plata)",
            "e05aa5b9e3df5be3857b43da8403eafbf5ad3b96": "Amplificador de energ\u00eda (plata)",
            "55b52cbfb148ec80cd4e5b0580f7bed01149d643": "Amplificador de energ\u00eda (oro)",
            "4fa9a2273ee446284d5177fd9d60a22de01e932b": "Amplificador de energ\u00eda (oro)",
            "5ad783dcfce3655ef97b36197425718a0dad6b66": "Amplificador de energ\u00eda (oro)",
            "77c36199102e074dca46f5f26ef57ce824d044dd": "Amplificador de energ\u00eda (platino)",
            "dfe86378f8c3d7f3ee0790ea64603bc44e83ca47": "Amplificador de energ\u00eda (platino)",
            "c39aa972a971e94b1d9b4d7a8f734b3d8be12534": "Amplificador de energ\u00eda (platino)",
            "7eacfcee74660f30bb92a5874e8cccf2bb286ebd": "Objeto de migraci\u00f3n",
            "8c1f6c6849d1a5e4d9de6ae9bb1b861f6f7b5d4d": "Espacios de expedici\u00f3n (bronce)",
            "e54ecc0416d6e96b4165f24238b03a1b32c1df47": "Espacios de expedici\u00f3n (bronce)",
            "a5784c685c0e1e6111d9c18aeaf80af2e0777ab4": "Espacios de expedici\u00f3n (bronce)",
            "31a504be1195149a3bef05b9cc6e3af185d24ef2": "Espacios de expedici\u00f3n (plata)",
            "b2bc9789df7c1ef5e058f72d61380b696dde54e8": "Espacios de expedici\u00f3n (plata)",
            "4f6f941bbf2a8527b0424b3ad11014502d8f4fb8": "Espacios de expedici\u00f3n (plata)",
            "fd7d35e73d0e09e83e30812b738ef966ea9ef790": "Espacios de expedici\u00f3n (oro)",
            "9336b9f29d36e3f69b0619c9523d8bec5e09ab8e": "Espacios de expedici\u00f3n (oro)",
            "540410439514ac09363c5c47cf47117a8b8ae79a": "Espacios de expedici\u00f3n (oro)",
            "94a28491b6fd85003f1cb151e88dde106f1d7596": "Espacios de flota (bronce)",
            "0684c6a5a42acbb3cd134913d421fc28dae6b90d": "Espacios de flota (bronce)",
            "bb47add58876240199a18ddacc2db07789be1934": "Espacios de flota (bronce)",
            "c4e598a85805a7eb3ca70f9265cbd366fc4d2b0e": "Espacios de flota (plata)",
            "f8fd610825fb4a442e27e4e9add74f050e040e27": "Espacios de flota (plata)",
            "a693c5ce3f5676efaaf0781d94234bea4f599d2e": "Espacios de flota (plata)",
            "1808bf7639b81ac3ac87bcb7eb3bbba0a1874d0a": "Espacios de flota (oro)",
            "5a8000c372cd079292a92d35d4ddba3c0f348d3b": "Espacios de flota (oro)",
            "1f7024c4f6493f0c589e1b00c76e6ced258c00e5": "Espacios de flota (oro)",
            "40f6c78e11be01ad3389b7dccd6ab8efa9347f3c": "KRAKEN (bronce)",
            "929d5e15709cc51a4500de4499e19763c879f7f7": "KRAKEN (oro)",
            "c19f0e09d862d93d7956beb3185d9ee929b5ef74": "KRAKEN platino (formas de vida)",
            "00b42f7113d81f98df865bbfa2280fe3a4465e89": "KRAKEN bronce (formas de vida)",
            "0ad06bba14dfd0b576f1daef729a60753e2263c7": "KRAKEN oro (formas de vida)",
            "5f194777c5b69d5c2a3c68e9e04a4cae9c28bcf2": "KRAKEN plata (formas de vida)",
            "f36042d76e6b8b33d931e1d4ae99f35265cd82d1": "KRAKEN (platino)",
            "4a58d4978bbe24e3efb3b0248e21b3b4b1bfbd8a": "KRAKEN (plata)",
            "de922af379061263a56d7204d1c395cefcfb7d75": "Amplificador de metal (bronce)",
            "8a469c50ed10b78eaf872ea766ca66495da31a17": "Amplificador de metal (bronce)",
            "9ce31395cbd1e60d29e0770b9e20c6eb6053a344": "Amplificador de metal (bronce)",
            "ba85cc2b8a5d986bbfba6954e2164ef71af95d4a": "Amplificador de metal (plata)",
            "742743b3b0ae1f0b8a1e01921042810b58f12f39": "Amplificador de metal (plata)",
            "6f44dcd2bd84875527abba69158b4e976c308bbc": "Amplificador de metal (plata)",
            "05294270032e5dc968672425ab5611998c409166": "Amplificador de metal (oro)",
            "6fecb993169fe918d9c63cd37a2e541cc067664e": "Amplificador de metal (oro)",
            "21c1a65ca6aecf54ffafb94c01d0c60d821b325d": "Amplificador de metal (oro)",
            "a83cfdc15b8dba27c82962d57e50d8101d263cfb": "Amplificador de metal (platino)",
            "c690f492cffe5f9f2952337e8eed307a8a62d6cf": "Amplificador de metal (platino)",
            "ca7f903a65467b70411e513b0920d66c417aa3a2": "Amplificador de metal (platino)",
            "be67e009a5894f19bbf3b0c9d9b072d49040a2cc": "Campos lunares - bronce",
            "05ee9654bd11a261f1ff0e5d0e49121b5e7e4401": "Campos lunares - oro",
            "8a426241572b2fea57844acd99bc326fe40e35cf": "Campos lunares - platino",
            "c21ff33ba8f0a7eadb6b7d1135763366f0c4b8bf": "Campos lunares - plata",
            "485a6d5624d9de836d3eb52b181b13423f795770": "L.U.N.A.S. - bronce",
            "d94731aa4a989f741ca18dd7d16589e970f0486f": "L.U.N.A.S. - bronce",
            "45d6660308689c65d97f3c27327b0b31f880ae75": "L.U.N.A.S. - oro",
            "faab6a750c53d440cd5a1638dbd853ef4ecb1fec": "L.U.N.A.S. - oro",
            "fd895a5c9fd978b9c5c7b65158099773ba0eccef": "L.U.N.A.S. - plata",
            "8ecde49bed4d3da1c3266ab736cb0c1a3dc209aa": "L.U.N.A.S. - plata",
            "da4a2a1bb9afd410be07bc9736d87f1c8059e66d": "NEWTRON (bronce)",
            "8a4f9e8309e1078f7f5ced47d558d30ae15b4a1b": "NEWTRON (oro)",
            "ba3e6693f112986b7964c835bcac6ae201900e2f": "NEWTRON bronce (formas de vida)",
            "7fe4cdb098685f8af827ca460a56e00ef46f5f05": "NEWTRON oro (formas de vida)",
            "9cde936fabc5037617f8261955e7d3f2262eec69": "NEWTRON platino (formas de vida)",
            "9879a36c42797a868416b13f07e033f664cabd70": "NEWTRON plata (formas de vida)",
            "a1ba242ede5286b530cdf991796b3d1cae9e4f23": "NEWTRON (platino)",
            "d26f4dab76fdc5296e3ebec11a1e1d2558c713ea": "NEWTRON (plata)",
            "16768164989dffd819a373613b5e1a52e226a5b0": "Campos de planeta de bronce",
            "04e58444d6d0beb57b3e998edc34c60f8318825a": "Campos de planeta de oro",
            "f3d9b82e10f2e969209c1a5ad7d22181c703bb36": "Campos de planeta - platino",
            "0e41524dc46225dca21c9119f2fb735fd7ea5cb3": "Campos de planeta de plata",
            "c1d0232604872f899ea15a9772baf76880f55c5f": "Paquete de recursos completo",
            "bb2f6843226ef598f0b567b92c51b283de90aa48": "Paquete de cristal",
            "cb72ed207dd871832a850ee29f1c1f83aa3f4f36": "Paquete de deuterio",
            "859d82d316b83848f7365d21949b3e1e63c7841f": "Paquete de metal"
        };
        var isMobile = false;
        var isMobileApp = false;
        var bbcodePreviewUrl = "https://s145-ar.ogproyect.gameforge.com/game/index.php?page=bbcodePreview&ajax=1";
        var ogameUrl = "{{ $game_url }}";
        var startpageUrl = "{{ $game_url }}";
        var LocalizationStrings = {
            "timeunits": {
                "short": {
                    "year": "y",
                    "month": "M",
                    "week": "se.",
                    "day": "d",
                    "hour": "h",
                    "minute": "m",
                    "second": "s"
                }
            },
            "status": {
                "ready": "hecho"
            },
            "decimalPoint": ".",
            "thousandSeperator": ".",
            "unitMega": "M",
            "unitKilo": "K",
            "unitMilliard": "Mrd",
            "question": "Pregunta",
            "error": "Error",
            "loading": "cargando...",
            "notice": "Referencia",
            "yes": "si",
            "no": "No",
            "ok": "Ok",
            "attention": "Cuidado",
            "outlawWarning": "Est\u00e1s a punto de atacar a un jugador m\u00e1s fuerte. Si lo haces tu protecci\u00f3n contra ataques se desactivar\u00e1 durante 7 d\u00edas y todos los jugadores podr\u00e1n atacarte sin piedad. \u00bfSeguro que quieres continuar?",
            "lastSlotWarningMoon": "Este edificio va a utilizar el \u00faltimo espacio de construcci\u00f3n disponible. Construye una base lunar para conseguir m\u00e1s espacios. \u00bfDe verdad quieres construir el edificio?",
            "lastSlotWarningPlanet": "Este edificio va a utilizar el \u00faltimo espacio de construcci\u00f3n disponible. Construye un Terraformer o compra un objeto de campo de planeta para conseguir m\u00e1s espacios. \u00bfDe verdad quieres construir el edificio?",
            "forcedVacationWarning": "\u00a1Verifica tu cuenta de la antesala y te regalamos Materia Oscura en cada universo!",
            "planetMoveBreakUpWarning": "\u00a1Atenci\u00f3n! Esta misi\u00f3n puede seguir en curso una vez que comience el per\u00edodo de reubicaci\u00f3n y si \u00e9ste es el caso, el proceso ser\u00e1 cancelado. \u00bfDe verdad deseas continuar?",
            "moreDetails": "Mas detalles",
            "lessDetails": "Menos detalles",
            "planetOrder": {
                "lock": "Fijar orden",
                "unlock": "Desbloquear orden"
            },
            "darkMatter": "Materia Oscura",
            "errorNotEnoughDM": "\u00a1No hay suficiente Materia Oscura disponible! \u00bfDeseas comprar m\u00e1s ahora?",
            "activateItem": {
                "upgradeItemQuestion": "\u00bfEst\u00e1s seguro de querer reemplazar el \u00edtem existente? La bonificaci\u00f3n antigua se perder\u00e1 durante el proceso.",
                "upgradeItemQuestionHeader": "\u00bfReemplazar \u00edtem?"
            },
            "characterClassItem": {
                "buyAndActivateItemQuestion": "\u00bfQuieres activar la clase #characterClassName# a cambio de #darkmatter# de Materia Oscura? Perder\u00e1s tu clase actual.",
                "activateItemQuestion": "\u00bfQuieres activar la clase #characterClassName#? Perder\u00e1s tu clase actual."
            },
            "allianceClassItem": {
                "buyAndActivateItemQuestion": "\u00bfQuieres activar la clase de alianza #allianceClassName# a cambio de #darkmatter# de Materia Oscura? La clase de alianza actual se perder\u00e1.",
                "activateItemQuestion": "\u00bfQuieres activar la clase de alianza #allianceClassName#? La clase de alianza actual se perder\u00e1.",
                "appendCurrentClassQuestion": "<br><br>Clase de alianza actual: #currentAllianceClassName#<br><br>\u00daltima modificaci\u00f3n: #lastAllianceClassChange#"
            },
            "LOCA_ALL_NETWORK_ATTENTION": "Cuidado",
            "LOCA_ALL_YES": "si",
            "LOCA_ALL_NO": "No",
            "redirectMessage": "Al seguir este enlace, abandonar\u00e1s OGame. \u00bfQuieres continuar?"
        };
        var popupWindows = [];
        var showOutlawWarning = true;
        var showDiscoveryWarning = true;
        var chatLoca = {
            "TEXT_EMPTY": "D\u00f3nde esta el mensaje?",
            "TEXT_TOO_LONG": "El mensaje es demasiado largo.",
            "SAME_USER": "No puedes escribirte a ti mismo.",
            "IGNORED_USER": "Has ignorado a este jugador.",
            "NO_DATABASE_CONNECTION": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
            "INVALID_PARAMETERS": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
            "SEND_FAILED": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
            "LOCA_ALL_ERROR_NOTACTIVATED": "Esta funci\u00f3n s\u00f3lo est\u00e1 disponible despu\u00e9s de que actives tu cuenta.",
            "X_NEW_CHATS": "#+# conversaci\u00f3n\/es sin leer",
            "MORE_USERS": "ver m\u00e1s"
        };
        var overlayWidth = 770;
        var overlayHeight = 600;
        var isRTLEnabled = 0;
        var isStandalonePage = false;
        var serverTime = {{ $date_js }}
        var serverTimeZoneOffsetInMinutes = {{ $serverTimeZoneOffsetInMinutes }};
        var localTime = new Date();
        var localTimeZoneOffsetInMinutes = localTime.getTimezoneOffset();
        var timeDiff = serverTime - localTime;
        var timeZoneDiffSeconds = (serverTimeZoneOffsetInMinutes - localTimeZoneOffsetInMinutes) * 60;

        var nodePort = 23979
        var nodeUrl = "https:\/\/s145-ar.ogproyect.gameforge.com:23979\/socket.io\/socket.io.js"
        var nodeParams = {
            "port": 23979,
            "secure": true
        }

        var token = "360c2c4ecaefa02d4d39f2fc6b6ed27c";
        var miniFleetLink =
            "{{ $game_url_js }}game.php?page=ingame&component=fleetdispatch&action=miniFleet&ajax=1&asJson=1";

        var jumpGateLink = "{{ $game_url_js }}game.php?page=jumpgatelayer";
        var jumpGateLoca = {
            "LOCA_STATION_JUMPGATE_HEADLINE": "Usar salto cu\u00e1ntico"
        };

        var timerHandler = new TimerHandler();

        $(document).ready(
            function() {
                initOverlays();
            }
        );
    </script>
</head>

<body id="ingamepage" class="no-touch ">
    <div id="siteHeader"></div>
    <div id="pageContent">
        <div id="top">
            <div id="pageReloader" onclick="javascript: redirectOverview();"></div>
            <div id='headerbarcomponent' class="">
                {!! $navigation !!}
            </div>
            <div id='resourcesbarcomponent' class="">
                {!! $resources !!}
            </div>
            <div id='commandercomponent' class="">
                {!! $officers !!}
            </div>
            <div id='notificationbarcomponent' class="">
				{!! $notifications !!}
            </div>
        </div>
        <div id="left">
			{!! $sidebar !!}
        </div>
        <div id="middle">
            <div id='eventlistcomponent' class="">
                <div id="eventboxContent" style="display: none;">
                    <div id="eventListWrap">
                        <div id="eventHeader">
                            <a class="close_details eventToggle" href="javascript:toggleEvents();">
                            </a>
                            <h2>Resultados</h2>
                        </div>
                        <table id="eventContent">
                            <tbody>
                            </tbody>
                        </table>
                        <div id="eventFooter"></div>
                    </div>
                </div>
                <script type="text/javascript">
                    var timeDelta = 1682254140000 - (new Date()).getTime();
                    var LocalizationStrings = {
                        "timeunits": {
                            "short": {
                                "year": "y",
                                "month": "M",
                                "week": "se.",
                                "day": "d",
                                "hour": "h",
                                "minute": "m",
                                "second": "s"
                            }
                        },
                        "status": {
                            "ready": "hecho"
                        },
                        "decimalPoint": ".",
                        "thousandSeperator": ".",
                        "unitMega": "M",
                        "unitKilo": "K",
                        "unitMilliard": "Mrd",
                        "question": "Pregunta",
                        "error": "Error",
                        "loading": "cargando...",
                        "notice": "Referencia",
                        "yes": "si",
                        "no": "No",
                        "ok": "Ok",
                        "attention": "Cuidado",
                        "outlawWarning": "Est\u00e1s a punto de atacar a un jugador m\u00e1s fuerte. Si lo haces tu protecci\u00f3n contra ataques se desactivar\u00e1 durante 7 d\u00edas y todos los jugadores podr\u00e1n atacarte sin piedad. \u00bfSeguro que quieres continuar?",
                        "lastSlotWarningMoon": "Este edificio va a utilizar el \u00faltimo espacio de construcci\u00f3n disponible. Construye una base lunar para conseguir m\u00e1s espacios. \u00bfDe verdad quieres construir el edificio?",
                        "lastSlotWarningPlanet": "Este edificio va a utilizar el \u00faltimo espacio de construcci\u00f3n disponible. Construye un Terraformer o compra un objeto de campo de planeta para conseguir m\u00e1s espacios. \u00bfDe verdad quieres construir el edificio?",
                        "forcedVacationWarning": "\u00a1Verifica tu cuenta de la antesala y te regalamos Materia Oscura en cada universo!",
                        "planetMoveBreakUpWarning": "\u00a1Atenci\u00f3n! Esta misi\u00f3n puede seguir en curso una vez que comience el per\u00edodo de reubicaci\u00f3n y si \u00e9ste es el caso, el proceso ser\u00e1 cancelado. \u00bfDe verdad deseas continuar?",
                        "moreDetails": "Mas detalles",
                        "lessDetails": "Menos detalles",
                        "planetOrder": {
                            "lock": "Fijar orden",
                            "unlock": "Desbloquear orden"
                        },
                        "darkMatter": "Materia Oscura",
                        "errorNotEnoughDM": "\u00a1No hay suficiente Materia Oscura disponible! \u00bfDeseas comprar m\u00e1s ahora?",
                        "activateItem": {
                            "upgradeItemQuestion": "\u00bfEst\u00e1s seguro de querer reemplazar el \u00edtem existente? La bonificaci\u00f3n antigua se perder\u00e1 durante el proceso.",
                            "upgradeItemQuestionHeader": "\u00bfReemplazar \u00edtem?"
                        },
                        "characterClassItem": {
                            "buyAndActivateItemQuestion": "\u00bfQuieres activar la clase #characterClassName# a cambio de #darkmatter# de Materia Oscura? Perder\u00e1s tu clase actual.",
                            "activateItemQuestion": "\u00bfQuieres activar la clase #characterClassName#? Perder\u00e1s tu clase actual."
                        },
                        "allianceClassItem": {
                            "buyAndActivateItemQuestion": "\u00bfQuieres activar la clase de alianza #allianceClassName# a cambio de #darkmatter# de Materia Oscura? La clase de alianza actual se perder\u00e1.",
                            "activateItemQuestion": "\u00bfQuieres activar la clase de alianza #allianceClassName#? La clase de alianza actual se perder\u00e1.",
                            "appendCurrentClassQuestion": "<br><br>Clase de alianza actual: #currentAllianceClassName#<br><br>\u00daltima modificaci\u00f3n: #lastAllianceClassChange#"
                        },
                        "LOCA_ALL_NETWORK_ATTENTION": "Cuidado",
                        "LOCA_ALL_YES": "si",
                        "LOCA_ALL_NO": "No",
                        "redirectMessage": "Al seguir este enlace, abandonar\u00e1s OGame. \u00bfQuieres continuar?"
                    };
                    (function($) {})(jQuery);
                </script>


            </div>
            {!! $content !!}
        </div>
        <div id="right">
            <div id='planetbarcomponent' class="">
				{!! $planetbar !!}
            </div>
            <div id='bannerSkyscrapercomponent' class="">
                <div id="banner_skyscraper" class="desktop" name="banner_skyscraper">
                    <div style="position: relative;">
                        <a class="tooltipLeft " title="" href="javascript:void(0);">
                            <img src="img/promotion/itemEvents/allTimeReductions/ar_OGame_160x600_final.jpg"
                                alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom">
        <div id='errorboxcomponent' class="">
            <div id="decisionTB" style="display:none;">
                <div id="errorBoxDecision" class="errorBox TBfixedPosition">
                    <div class="head">
                        <h4 id="errorBoxDecisionHead">-</h4>
                    </div>
                    <div class="middle">
                        <span id="errorBoxDecisionContent">-</span>
                        <div class="response">
                            <div style="float:left; width:180px;">
                                <a href="javascript:void(0);" class="yes"><span
                                        id="errorBoxDecisionYes">.</span></a>
                            </div>
                            <div style="float:left; width:180px;">
                                <a href="javascript:void(0);" class="no"><span
                                        id="errorBoxDecisionNo">.</span></a>
                            </div>
                            <br class="clearfloat" />
                        </div>
                    </div>
                    <div class="foot"></div>
                </div>
            </div>

            <div id="fadeBox" class="fadeBox fixedPostion" style="display:none;">
                <div>
                    <span id="fadeBoxStyle" class="success"></span>
                    <p id="fadeBoxContent"></p>
                </div>
            </div>

            <div id="notifyTB" style="display:none;">
                <div id="errorBoxNotify" class="errorBox TBfixedPosition">
                    <div class="head">
                        <h4 id="errorBoxNotifyHead">-</h4>
                    </div>
                    <div class="middle">
                        <span id="errorBoxNotifyContent">-</span>
                        <div class="response">
                            <div>
                                <a href="javascript:void(0);" class="ok">
                                    <span id="errorBoxNotifyOk">.</span>
                                </a>
                            </div>
                            <br class="clearfloat" />
                        </div>
                    </div>
                    <div class="foot"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        initBuffBar();

        initIndex();
    </script>
    <div id='chatbarcomponent' class="">
        <script type="text/javascript">
            var bigChatLink = 'https://s145-ar.ogproyect.gameforge.com/game/index.php?page=chat';
            var ajaxChatToken = "d757eaf16e42f68622a522898c5cd87d"
            var chatUrl = "https:\/\/s145-ar.ogproyect.gameforge.com\/game\/index.php?page=ajaxChat"
            var chatUrlLoadMoreMessages =
                "https:\/\/s145-ar.ogproyect.gameforge.com\/game\/index.php?page=chatGetAdditionalMessages"
            var chatLoca = {
                "TEXT_EMPTY": "D\u00f3nde esta el mensaje?",
                "TEXT_TOO_LONG": "El mensaje es demasiado largo.",
                "SAME_USER": "No puedes escribirte a ti mismo.",
                "IGNORED_USER": "Has ignorado a este jugador.",
                "NO_DATABASE_CONNECTION": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
                "INVALID_PARAMETERS": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
                "SEND_FAILED": "Aparecio un error anteriormente desconocido. Desafortunadamente tu \u00faltima acci\u00f3n no pudo ser procesada.",
                "LOCA_ALL_ERROR_NOTACTIVATED": "Esta funci\u00f3n s\u00f3lo est\u00e1 disponible despu\u00e9s de que actives tu cuenta.",
                "X_NEW_CHATS": "#+# conversaci\u00f3n\/es sin leer",
                "MORE_USERS": "ver m\u00e1s"
            }

            var visibleChats = {
                "players": [],
                "associations": []
            };

            /*(function($) {
                ogproyect.chat.showPlayerList('#chatBarPlayerList .cb_playerlist_box'); //list in chat bar
                ogproyect.chat.showPlayerList('#sideBar'); // list in chat

                var initChatAsyncInterval = window.setInterval(initChatAsync, 100);

                function initChatAsync() {
                    if (ogproyect.chat.isLoadingPlayerList === false && ogproyect.chat.playerList !== null) {
                        clearInterval(initChatAsyncInterval);
                        ogproyect.chat.initChatBar(102605);
                        ogproyect.chat.initChat(102605, false);
                        ogproyect.chat.updateCustomScrollbar($('.scrollContainer'));
                    }
                }
            })(jQuery);*/
        </script>
        <div id="chatBar">
            <ul class="chat_bar_list">
                <li id="chatBarPlayerList" class="chat_bar_pl_list_item">
                    <div class="cb_playerlist_box" style="display:none">
                    </div>
                    <span class="onlineCount">0 jugadores en línea</span>
                </li>
            </ul><!-- END Chat Bar List -->

            <script type="text/javascript"></script>
        </div>
    </div>
    <div id="siteFooter">
        <div class="content" style="font-size:10px">
            <div class="fleft textLeft">
                <span>9.2.2</span>
                <a class="homeLink" href="http://www.gameforge.com/" target="_blank">© 2002 Gameforge 4D GmbH. Todos
                    los derechos reservados.</a>
            </div>
            <div class="fright textRight">
                <a href="http://wiki.ogproyect.org/" target="_blank">Ayuda</a>|
                <a href="https://board.ar.ogproyect.gameforge.com/" target="_blank">Foro</a>|
                <a class="overlay"
                    href="https://s145-ar.ogproyect.gameforge.com/game/index.php?page=standalone&amp;component=rules&amp;ajax=1"
                    data-overlay-iframe="true" data-iframe-width="450" data-overlay-title="Reglas">Reglas</a>|
                <a href="https://agbserver.gameforge.com/rewrite.php?locale=ar&amp;type=imprint&amp;product=ogproyect"
                    target="_blank">Aviso legal</a>
            </div>
        </div>
    </div>
</body>
<script>
    let hideTooltipsTimeout = null;
    document.addEventListener('mouseleave', function() {
        clearTimeout(hideTooltipsTimeout)
        hideTooltipsTimeout = setTimeout(function() {
            Tipped.hideAll();
        }, 1000)
    });
    document.addEventListener('mouseenter', function() {
        clearTimeout(hideTooltipsTimeout)
    });
</script>

</html>
