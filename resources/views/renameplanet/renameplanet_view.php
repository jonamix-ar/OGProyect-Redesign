<div id="abandonplanet">
    <img src="{planet_image}" class="float_left" />
    <p class="desc_txt">Usando este menú puedes cambiar nombres de planetas o abandonar completamente una colonia.</p>
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr class="head">
                <th colspan="3">{rp_planet_rename}</th>
            </tr>
            <tr>
                <td colspan="3" class="ipiHintable" data-ipi-hint="ipiPlanetSettingsName">
                    <form id="planetMaintenance" class="formValidation" onsubmit="clearField(); $('#newPlanetName').val($('#planetName').val()); ajaxFormSubmit('planetMaintenance', 'https://s153-ar.ogame.gameforge.com/game/index.php?page=planetRename', planetRenamed); return false;">
                        <input type="hidden" id="newPlanetName" name="newPlanetName" value="Nuevo nombre de planeta">
                        <input type='hidden' name='token' value='df51513b63b5c78754c65111885e602d' />

                        <a title="{rp_rules}"
                            href="javascript:void(0);"
                            class="tooltipHTML tooltipLeft help"></a>
                        <input
                            class="text w200 validate[optional,custom[noSpecialCharacters],custom[noBeginOrEndUnderscore],custom[noBeginOrEndWhitespace],custom[noBeginOrEndHyphen],custom[notMoreThanThreeUnderscores],custom[notMoreThanThreeWhitespaces],custom[notMoreThanThreeHyphen],custom[noCollocateUnderscores],custom[noCollocateWhitespaces],custom[noCollocateHyphen],minSize[2]]"
                            type="text"
                            maxlength="20"
                            size="25"
                            id="planetName"
                            value="Nuevo nombre de planeta"
                            onFocus="clearField()"
                            onBlur="fillField()"
                        />
                        <input class="btn_blue float_right" type="submit" value="{rp_planet_rename_action}" name="aktion"/>
                    </form>
                </td>
            </tr>
            <tr class="head">
                <th colspan="3" class="second" id="giveupHeadline" rel="1">Abandonar planeta principal</th>
            </tr>
			<tr>
				<td colspan="3">
					No puedes abandonar tu planeta principal mientras no hayas colonizado otros.
				</td>
			</tr>
		</tbody>
    </table>

    <script type="text/javascript">
    (function($) {
        $.fn.validationEngineLanguage = function() {};
        $.validationEngineLanguage = {
            newLang: function() {
                $.validationEngineLanguage.allRules = 	{
                    "minSize": {
                        "regex": "none",
                        "alertText": "Los caracteres no son suficientes"},
                    "pwMinSize": {
                        "regex": /^.{ 4,}$/,
                        "alertText": "La contrase\u00f1a introducida es demasiado corta (m\u00edn. 4 caracteres)"},
                    "pwMaxSize": {
                        "regex": /^.{0, 20}$/,
                        "alertText": "La contrase\u00f1a es demasiado larga (Caracteres m\u00e1ximos: 20)"},
                    "email":{
                        "regex":/^[a-zA-Z0-9_\.\-]+\@([a-zA-Z0-9\-]+\.)+[a-zA-Z0-9]{2,4}$/,
                        "alertText":"\u00a1Necesit\u00e1s escribir una direcci\u00f3n de e-mail valida!"},
                    "noSpecialCharacters":{
                        "regex":/^[a-zA-Z0-9\-_\s]+$/,
                        "alertText": "contiene caracteres inv\u00e1lidos."},
                    "noBeginOrEndUnderscore":{
                        "regex":/^([^_]+(.*[^_])?)?$/,
                        "alertText": "Tu nombre no puede empezar ni terminar con una barra baja."},
                    "noBeginOrEndHyphen":{
                        "regex":/^([^\-]+(.*[^\-])?)?$/,
                        "alertText": "Tu nombre no puede empezar ni terminar con un guion."},
                    "noBeginOrEndWhitespace":{
                        "regex":/^([^\s]+(.*[^\s])?)?$/,
                        "alertText": "Tu nombre no puede empezar ni terminar con un espacio."},
                    "notMoreThanThreeUnderscores":{
                        "regex":/^[^_]*(_[^_]*){0,3}$/,
                        "alertText": "Tu nombre no puede contener m\u00e1s de 3 barras bajas en total."},
                    "notMoreThanThreeHyphen":{
                        "regex":/^[^\-]*(\-[^\-]*){0,3}$/,
                        "alertText": "Tu nombre no puede contener m\u00e1s de 3 guiones en total."},
                    "notMoreThanThreeWhitespaces":{
                        "regex":/^[^\s]*(\s[^\s]*){0,3}$/,
                        "alertText": "Tu nombre no puede contener m\u00e1s de 3 espacios en total."},
                    "noCollocateUnderscores":{
                        "regex":/^[^_]*(_[^_]+)*_?$/,
                        "alertText": "No puedes utilizar dos o m\u00e1s barras bajas seguidas."},
                    "noCollocateHyphen":{
                        "regex":/^[^\-]*(\-[^\-]+)*-?$/,
                        "alertText": "No puedes utilizar dos o m\u00e1s guiones seguidos."},
                    "noCollocateWhitespaces":{
                        "regex":/^[^\s]*(\s[^\s]+)*\s?$/,
                        "alertText": "No puedes utilizar dos o m\u00e1s espacios seguidos."}

                }
            }
        }
        $.validationEngineLanguage.newLang();
    })(jQuery);
</script>
    <script language="javascript">
        var defaultName = "Nuevo nombre de planeta";
    </script>
    <script>
        initFormValidation();
        if (typeof IPI !== 'undefined') {
            IPI.refreshHighlights()
        }
    </script>
</div>
