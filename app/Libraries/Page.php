<?php

namespace App\Libraries;

use App\Core\Database;
use App\Core\Enumerators\PlanetTypesEnumerator;
use App\Core\Language;
use App\Core\Objects;
use App\Core\Template;
use App\Helpers\UrlHelper;
use App\Libraries\ProductionLib as Production;
use App\Libraries\TimingLibrary as Timing;
use App\Models\Game\Fleet;
use App\Models\Libraries\Alert;
use CiLang;
use DateTime;

class Page
{
    private ?array $current_user;
    private ?array $current_planet;
    private string $current_year;
    private Template $template;
    private Language $langs;
    private Objects $objects;

    public function __construct(object $users)
    {
        $this->current_user = $users->getUserData();
        $this->current_planet = $users->getPlanetData();
        $this->current_year = date('Y');

        $this->setTemplate();
        $this->setLanguage();
        $this->setObjects();
    }

    /**
     * Set template object
     *
     * @return void
     */
    private function setTemplate(): void
    {
        $this->template = new Template();
    }

    /**
     * Set language object
     *
     * @return void
     */
    private function setLanguage(): void
    {
        $this->langs = new Language();
    }

    /**
     * Set objects object
     *
     * @return void
     */
    private function setObjects(): void
    {
        $this->objects = new Objects();
    }

    public function display(string $current_page, bool $sidebar = true, bool $navigation = true, bool $footer = true): void
    {
        if (!defined('IN_MESSAGE')) {
            // For the Home page
            if (defined('IN_LOGIN')) {
                die($current_page);
            }
        }

        // Anything else
        if ($navigation) {
            $parse['navigation'] = $this->gameNavigation();
            $parse['resources'] = $this->gameResources();
            $parse['officers'] = $this->gameOfficers();
			$parse['notifications'] = $this->gameNotifications();
        }

        if ($sidebar) {
            $parse['sidebar'] = $this->gameMenu();
			$parse['planetbar'] = $this->planetMenu();
        }

        if ($footer) {
            $parse['footer'] = $this->gameFooter();
        }

        $page = '';
        $page .= $this->gamePage($current_page, ($parse ?? []), ($navigation && $sidebar && $footer));

        // Show result page
        die($page);
    }

    private function gamePage(string $page, array $parse, bool $full): string
    {
        $date = new DateTime();

        return $this->template->set(
            ($full ? 'game/game_layout' : 'game/game_layout_simple'),
            array_merge(
                $this->langs->loadLang('adm/popups', true)->language,
                $parse,
                [
                    'content' => $page,
                    'game_title' => Functions::readConfig('game_name'),
                    'game_url' => SYSTEM_ROOT,
                    'version' => SYSTEM_VERSION,
                    'css_path' => CSS_PATH,
                    'js_path' => JS_PATH,
                    'img_path' => IMG_PATH,
                    'meta_tags' => ($metatags = '') ? $metatags : "",
                    'date_js' => 'new Date(' . $date->format('Y, n - 1, j, G, i, s') . ')',

                ]
            )
        );
    }


    /**
     * Display the installation page
     *
     * @param string $current_page
     * @param array $langs
     * @return void
     */
    public function displayInstall($current_page, $langs): void
    {
        $page = $this->installHeader();
        $page .= $this->installMenu($langs); // MENU
        $page .= $this->installNavbar($langs); // TOP NAVIGATION BAR
        $page .= $current_page;
        $page .= $this->template->set(
            'install/simple_footer',
            ['year' => $this->current_year]
        );

        // Show result page
        die($page);
    }

    /**
     * Display the admin page
     *
     * @param string $current_page
     * @param boolean $sidebar
     * @param boolean $navigation
     * @param boolean $footer
     * @return void
     */
    public function displayAdmin(string $current_page, bool $sidebar = true, bool $navigation = true, bool $footer = true): void
    {
        if ($sidebar) {
            $parse['sidebar'] = $this->adminSidebar();
        }

        if ($navigation) {
            $parse['navigation'] = $this->adminNavigation();
        }

        if ($footer) {
            $parse['footer'] = $this->adminFooter();
        }

        $page = $this->adminSimpleHeader();
        $page .= $this->adminPage($current_page, ($parse ?? []), ($sidebar && $navigation && $footer));
        $page .= $this->adminSimpleFooter();

        // Show result page
        die($page);
    }

    /**
     * Set the admin page
     *
     * @param string $page
     * @param array $parse
     * @return string
     */
    private function adminPage(string $page, array $parse, bool $full): string
    {
        return $this->template->set(
            ($full ? 'adm/admin_page_view' : 'adm/simple_admin_page_view'),
            array_merge($this->langs->loadLang('adm/popups', true)->language, $parse, ['page_content' => $page])
        );
    }

    /**
     * Set the admin meta header
     *
     * @return string
     */
    private function adminSimpleHeader(): string
    {
        return $this->template->set(
            'adm/simple_header',
            [
                'title' => 'Admin CP',
                'admin_public_path' => ADMIN_PUBLIC_PATH,
            ]
        );
    }

    /**
     * Set the admin sidebar
     *
     * @return string
     */
    private function adminSidebar(): string
    {
        $lang = $this->langs->loadLang('adm/menu', true);

        $current_page = isset($_GET['page']) ? $_GET['page'] : null;
        $items = '';
        $flag = '';
        $pages = [
            ['server', '2'],
            ['mailing', '2'],
            ['modules', '2'],
            ['planets', '2'],
            ['registration', '2'],
            ['statistics', '2'],
            ['premium', '2'],
            ['tasks', '3'],
            ['errors', '3'],
            ['fleets', '3'],
            ['messages', '3'],
            ['maker', '4'],
            ['users', '4'],
            ['alliances', '4'],
            ['languages', '4'],
            ['changelog', '4'],
            ['permissions', '4'],
            ['backup', '5'],
            ['encrypter', '5'],
            ['announcement', '5'],
            ['ban', '5'],
            ['rebuildhighscores', '5'],
            ['update', '5'],
            ['migrate', '5'],
            ['repair', '6'],
            ['reset', '6'],
        ];
        $active_block = 1;

        // BUILD THE MENU
        foreach ($pages as $key => $data) {
            $extra = '';
            $active = '';

            if ($data[1] != $flag) {
                $flag = $data[1];
                $items = '';
            }

            if ($data[0] == 'rebuildhighscores') {
                $extra = 'onClick="return confirm(\'' . $lang->line('tools_manual_update_confirm') . '\');"';
            }

            if ($data[0] == $current_page) {
                $active = ' active';
                $active_block = $data[1];
            }

            $items .= '<a class="collapse-item' . $active . '" href="' . ADM_URL . 'admin.php?page=' . $data[0] . '"  ' . $extra . '>' . $lang->line($data[0]) . '</a>';

            $parse_block[$data[1]] = $items;
        }

        // PARSE THE MENU AND OTHER DATA
        $parse = $lang->language;
        $parse['menu_block_2'] = $parse_block[2];
        $parse['menu_block_3'] = $parse_block[3];
        $parse['menu_block_4'] = $parse_block[4];
        $parse['menu_block_5'] = $parse_block[5];
        $parse['menu_block_6'] = $parse_block[6];
        $parse['active_1'] = '';
        $parse['active_1_show'] = '';
        $parse['active_2'] = '';
        $parse['active_2_show'] = '';
        $parse['active_3'] = '';
        $parse['active_3_show'] = '';
        $parse['active_4'] = '';
        $parse['active_4_show'] = '';
        $parse['active_5'] = '';
        $parse['active_5_show'] = '';
        $parse['active_6'] = '';
        $parse['active_6_show'] = '';
        $parse['active_' . $active_block] = ' active';
        $parse['active_' . $active_block . '_show'] = ' show';

        return $this->template->set(
            'adm/sidebar_view',
            $parse
        );
    }

    /**
     * Set the admin navigation
     *
     * @return string
     */
    private function adminNavigation(): string
    {
        return $this->template->set(
            'adm/navigation_view',
            array_merge(
                $this->langs->loadLang('adm/navigation', true)->language,
                [
                    'user_name' => $this->current_user['user_name'],
                    'current_date' => Timing::formatShortDate(time()),
                ]
            )
        );
    }

    /**
     * Set the admin footer
     *
     * @return string
     */
    private function adminFooter(): string
    {
        return $this->template->set(
            'adm/footer_view',
            [
                'version' => SYSTEM_VERSION,
                'year' => $this->current_year,
            ]
        );
    }

    /**
     * Set admin simple footer
     *
     * @return string
     */
    private function adminSimpleFooter(): string
    {
        return $this->template->set(
            'adm/simple_footer',
            [
                'admin_public_path' => ADMIN_PUBLIC_PATH,
                'version' => SYSTEM_VERSION,
            ]
        );
    }

    /**
     * installHeader
     *
     * @return string
     */
    private function installHeader()
    {
        return $this->template->set(
            'install/simple_header',
            [
                'title' => 'Install',
                'js_path' => '../js/',
                'css_path' => '../css/',
            ]
        );
    }

    /**
     * installNavbar
     *
     * @return string
     */
    private function installNavbar($langs)
    {
        // Update config language to the new setted value
        if (isset($_POST['language'])) {
            Functions::setCurrentLanguage($_POST['language']);
            Functions::redirect(SYSTEM_ROOT . DIRECTORY_SEPARATOR);
        }

        $current_page = isset($_GET['page']) ? $_GET['page'] : null;
        $items = '';

        $pages = [
            0 => ['installation', $langs['ins_overview'], 'overview'],
            1 => ['installation', $langs['ins_license'], 'license'],
            2 => ['installation', $langs['ins_install'], 'step1'],
        ];

        // BUILD THE MENU
        foreach ($pages as $key => $data) {
            if ($data[2] != '') {
                // URL
                $items .= '<li' . ($current_page == $data[0] ? ' class="active"' : '') .
                    '><a href="index.php?page=' . $data[0] . '&mode=' . $data[2] . '">' . $data[1] . '</a></li>';
            } else {
                // URL
                $items .= '<li' . ($current_page == $data[0] ? ' class="active"' : '') .
                    '><a href="index.php?page=' . $data[0] . '">' . $data[1] . '</a></li>';
            }
        }

        // PARSE THE MENU AND OTHER DATA
        $parse = $langs;
        $parse['menu_items'] = $items;
        $parse['language_select'] = Functions::getLanguages(Functions::getCurrentLanguage());

        return $this->template->set(
            'install/topnav_view',
            $parse
        );
    }

    /**
     * installMenu
     *
     * @return string
     */
    private function installMenu($langs)
    {
        $current_mode = isset($_GET['mode']) ? $_GET['mode'] : null;
        $items = '';
        $steps = [
            0 => ['step1', $langs['ins_step1']],
            1 => ['step2', $langs['ins_step2']],
            2 => ['step3', $langs['ins_step3']],
            3 => ['step4', $langs['ins_step4']],
            4 => ['step5', $langs['ins_step5']],
        ];

        // BUILD THE MENU
        foreach ($steps as $key => $data) {
            // URL
            $items .= '<li' . ($current_mode == $data[0] ? ' class="active"' : '') .
                '><a href="#">' . $data[1] . '</a></li>';
        }

        // PARSE THE MENU AND OTHER DATA
        $parse = $langs;
        $parse['menu_items'] = $items;

        return $this->template->set(
            'install/menu_view',
            $parse
        );
    }

    private function gameNavigation()
    {
        $lang = $this->langs->loadLang('game/navigation', true);

        $navigation_menu = '';
        $tota_rank = $this->current_user['user_statistic_total_rank'] == '' ?
            $this->current_planet['stats_users'] : $this->current_user['user_statistic_total_rank'];

        $pages = [
            ['highscore', $lang->line('tn_highscore'), '&range=' . $tota_rank, '', ''],
            ['notices', $lang->line('tn_notices'), '', '', 'true'],
            ['buddies', $lang->line('tn_buddies'), '', '', ''],
            ['search', $lang->line('tn_search'), '&ajax=1', '', 'true'],
            ['preferences', $lang->line('tn_preferences'), '', '', ''],
            ['support', $lang->line('tn_support'), '', '', ''],
            ['logout', $lang->line('tn_logout'), '', '', ''],
        ];

        //&site=2&category=1&searchRelId=102605 // Search next

        foreach ($pages as $key => $data) {
            // overlay

            if ($data[0] == 'highscore') {
                $total_points = ' (' . $tota_rank . ')';
            } else {
                $total_points = '';
            }

            if ($data[0] == 'notices') {
                $attributes = 'data-overlay-title="Mis notas" data-overlay-class="notices" data-overlay-popup-width="750" data-overlay-popup-height="480"';
            }

            if ($data[0] == 'search') {
                $attributes = 'data-overlay-title="Buscar en el Universo" data-overlay-close="__default closeSearch" data-overlay-class="search"';
            }

            if ($data[4] == 'true') {
                $link = '<li><a href="' . SYSTEM_ROOT . 'game.php?page=' . $data[0] . $data[2] . '" class="overlay"' . $attributes . '>' . $data[1] . '</a></li>';
            } else {
                $link = '<li><a class="" href="' . SYSTEM_ROOT . 'game.php?page=' . $data[0] . $data[2] . '">' . $data[1] . '</a>' . $total_points . '</li>';
            }


            $navigation_menu .= $link;
        }

        return $this->template->set(
            'general/navigation',
            [
                'player_name' => $this->current_user['user_name'],
                'player_text' => $lang->line('tn_player'),
                'navigation_menu' => $navigation_menu,
                'date' => date(Functions::readConfig('date_format'), time()),
                'time' => date('H:i:s', time()),
            ]
        );
    }

    private function gameResources()
    {
        $lang = $this->langs->loadLang(['game/global', 'game/navigation', 'game/officier'], true);

        $parse['img_path'] = IMG_PATH;
        $parse['image'] = $this->current_planet['planet_image'];
        $parse['planetlist'] = $this->buildPlanetList();
        $parse['show_umod_notice'] = '';

        // When vacation mode did not expire
        if ($this->current_user['preference_vacation_mode'] > 0) {
            $parse['color'] = '#1DF0F0';
            $parse['message'] = $lang->line('tn_vacation_mode') . Timing::formatExtendedDate($this->current_user['preference_vacation_mode']);
            $parse['jump_line'] = '<br/>';

            $parse['show_umod_notice'] = $this->template->set(
                'general/notices_view',
                $parse
            );
        }

        if ($this->current_user['preference_delete_mode'] > 0) {
            // When it is in delete mode
            $parse['color'] = '#FF0000';
            $parse['message'] = $lang->line('tn_delete_mode') . Timing::formatExtendedDate($this->current_user['preference_delete_mode'] + (60 * 60 * 24 * 7));
            $parse['jump_line'] = '';

            $parse['show_umod_notice'] = $this->template->set(
                'general/notices_view',
                $parse
            );
        }

        // RESOURCES FORMAT
        $metal = FormatLib::prettyNumber($this->current_planet['planet_metal']);
        $crystal = FormatLib::prettyNumber($this->current_planet['planet_crystal']);
        $deuterium = FormatLib::prettyNumber($this->current_planet['planet_deuterium']);
        $darkmatter = FormatLib::prettyNumber($this->current_user['premium_dark_matter']);
        $energy = FormatLib::prettyNumber(
            $this->current_planet['planet_energy_max'] + $this->current_planet['planet_energy_used']
        ) . "/" . FormatLib::prettyNumber($this->current_planet['planet_energy_max']);

        // METAL
        if ($this->current_planet['planet_metal'] >= Production::maxStorable($this->current_planet['building_metal_store'])) {
            $metal = FormatLib::colorRed($metal);
        }

        // CRYSTAL
        if ($this->current_planet['planet_crystal'] >= Production::maxStorable($this->current_planet['building_crystal_store'])) {
            $crystal = FormatLib::colorRed($crystal);
        }

        // DEUTERIUM
        if ($this->current_planet['planet_deuterium'] >= Production::maxStorable($this->current_planet['building_deuterium_tank'])) {
            $deuterium = FormatLib::colorRed($deuterium);
        }

        // ENERGY
        if (($this->current_planet['planet_energy_max'] + $this->current_planet['planet_energy_used']) < 0) {
            $energy = FormatLib::colorRed($energy);
        }

        $parse['re_metal'] = $metal;
        $parse['re_crystal'] = $crystal;
        $parse['re_deuterium'] = $deuterium;
        $parse['re_darkmatter'] = $darkmatter;
        $parse['re_energy'] = $energy;

        return $this->template->set(
            'general/topnav',
            array_merge(
                $lang->language,
                $parse
            )
        );
    }

    private function gameOfficers()
    {
        $lang = $this->langs->loadLang(['game/global', 'game/officier'], true);

        return $this->template->set(
            'general/officers',
            array_merge(
                $lang->language,
                $this->buildOfficersBlock($lang),
                [
                    'img_path' => IMG_PATH
                ]
            )
        );
    }

    private function gameNotifications()
    {
        $lang = $this->langs->loadLang(['game/global', 'game/notification'], true);
		$parse['message_alert']	= (($this->current_user['new_message'] == 0) ? ' noMessage' : '');
		$parse['message_count']	= $this->current_user['new_message'];

		$parse['attack_alert'] = (Functions::getAttackers($this->current_user['user_id']) > 0) ? 'soon' : 'noAttack';

        return $this->template->set(
            'general/notification',
            array_merge(
                $lang->language,
				$parse,
                [
                    'img_path' => IMG_PATH
                ]
            )
        );
    }

    private function gameMenu()
    {
        $lang = $this->langs->loadLang('game/menu', true);
        $menu_block = '';
        $modules_array = explode(';', Functions::readConfig('modules'));
        $current_page = isset($_GET['page']) ? $_GET['page'] : null;
        $sub_template = 'general/left_menu_row_view';
        $adv_template = 'general/advice_row_view';

        $fleetModel = new Fleet();
        $userFleets = $fleetModel->getUserFleetAlert($this->current_user['user_id']);
        $i = count($userFleets);

        $pages = [
            ['overview', $lang->line('lm_overview'), '', 'FFF', '', '1', '1', 'overview', '7', ''],
            ['resources', $lang->line('lm_resources'), '', 'FFF', '', '1', '3', 'resources', '0', ''],
            ['station', $lang->line('lm_station'), '', 'FFF', '', '1', '3', 'station', '', ''],
            ['traderOverview', $lang->line('lm_trader'), '', 'FF8900', '', '1', '5', 'traderOverview', '4', 'true'],
            ['research', $lang->line('lm_research'), '', 'FFF', '', '1', '6', 'research', '1', ''],
            ['shipyard', $lang->line('lm_shipyard'), '', 'FFF', '', '1', '7', 'shipyard', '', ''],
            ['defense', $lang->line('lm_defenses'), '', 'FFF', '', '1', '11', 'defense', '', ''],
            ['fleet1', $lang->line('lm_fleet'), '', 'FFF', '', '1', '8', 'fleet1', '3', ''],
            ['galaxy', $lang->line('lm_galaxy'), 'mode=0', 'FFF', '', '1', '10', 'galaxy', '', ''],
            ['imperium', $lang->line('lm_empire'), '', 'FFF', 'true', '1', '2', 'empire', '', ''],
            ['alliance', $lang->line('lm_alliance'), '', 'FFF', '', '2', '12', 'alliance', '2', ''],
            ['premium', $lang->line('lm_officiers'), '', 'FF8900', '', '2', '13', 'premium', '', 'true'],
            ['shop', $lang->line('lm_shop'), '', 'FF8900', '', '2', '13', 'shop', '5', 'true'],
            ['rewarding', $lang->line('lm_rewarding'), '', 'FF8900', '', '2', '13', 'rewarding', '6', 'true'],
        ];

        $sub_pages = [
            ['resourceSettings', $lang->line('lm_resources'), '', 'FFF', '', '1', '4', ''],
            ['techtree', $lang->line('lm_technology'), '', 'FFF', '', '1', '9', 'true'],
            ['alliance', $lang->line('lm_alliance_circular'), '&mode=circular', 'FFF', '', '1', '9', ''],
            ['movement', $lang->line('lm_movement'), '', 'FFF', '', '1', '9', ''],
            ['traderOverview#page=traderResources&animation=false', $lang->line('lm_resource_trader'), '', 'FFF', '', '1', '9', ''],
            ['shop#page=inventory&category=d8d49c315fa620d9c7f1f19963970dea59a0e3be', $lang->line('lm_inventory'), '', 'FFF', '', '1', '9', ''],
            ['rewarding&tab=rewards&tier=1', $lang->line('lm_current_rank'), '', 'FFF', '', '1', '9', ''],
            ['rewards', '', '', 'FFF', '', '1', '9', ''],
            //['station', $lang->line('tech')[43], '', 'FFF', '', '1', '9', ''], //Muelle espacial
        ];

        // BUILD THE MENU
        foreach ($pages as $key => $data) {
            $moduleEnabled = !isset($modules_array[$data[6]]) || $modules_array[$data[6]] != 0 || $modules_array[$data[6]] == '';
            if (!$moduleEnabled) {
                continue;
            }

            $link = 'game.php?page=' . $data[0] . ($data[2] != '' ? '&' . $data[2] : '');

            $selected = ($current_page == $data[0]) || ($data[8] != '' && $current_page == $sub_pages[$data[8]][0]);
            $highlighted = $selected && $i > 0 && @$sub_pages[$data[8]][0] == 'movement';

            $sub_name = isset($sub_pages[$data[8]][1]) ? $sub_pages[$data[8]][1] : '';
            $is_overlay = isset($sub_pages[$data[8]][7]) && $sub_pages[$data[8]][7] == true ? 'overlay ' : '';
            $sub_link = $data[8] != '' ? 'href=game.php?page=' . $sub_pages[$data[8]][0] . ($sub_pages[$data[8]][2] != '' ? '&' . $sub_pages[$data[8]][2] : '') . '' : '';

            $block = [
                'color' => $data[3],
                'menu_object' => $data[7],
                'menu_item' => $data[1],
                'menu_link' => $link,
                'selected' => $selected ? ' selected' : '',
                'selected2' => $highlighted ? 'active' : ($selected ? ' highlighted' : ''),
                'target' => $data[4] == true ? '_blank' : '_self',
                'premium' => $data[9] == true ? ' premiumHighligt' : '',
                'sub_name' => $sub_name,
                'is_overlay' => $is_overlay,
                'sub_link' => $sub_link
            ];

            $menu_block .= $this->template->set($sub_template, $block);
        }

        // VACATION AND DELETE STRINGS AND ICONS
        $vac_parse = [
            'icon' => 'exclaim',
            'message' => str_replace('%t', Timing::formatExtendedDate($this->current_user['preference_vacation_mode']), $lang->line('lm_vacation_mode')),
        ];
        $del_parse = [
            'icon' => 'trash',
            'message' => str_replace('%t', Timing::formatExtendedDate($this->current_user['preference_delete_mode'] + ONE_WEEK), $lang->line('lm_delete_mode')),
        ];

        // PARSE THE MENU AND OTHER DATA
		$parse['lm_tutorial_overview'] = $lang->line('lm_tutorial_overview');
        $parse['menu_block'] = $menu_block;
        $parse['is_vacation']    = ($this->current_user['preference_vacation_mode'] > 0) ? $this->template->set($adv_template, $vac_parse) : '';
        $parse['is_delete']    = ($this->current_user['preference_delete_mode'] > 0) ? $this->template->set($adv_template, $del_parse) : '';
        $parse['admin_link']    = ($this->current_user['user_authlevel'] > 0) ? '<li>
			<span class="menu_icon">
				<span class="menuImage alliance"></span>
			</span>
			<a class="menubutton" href="admin.php" accesskey="" target="_blank">
				<span class="textlabel">' . $lang->line('lm_administration') . '</span>
			</a>
		</li>' : '';

        return $this->template->set(
            'general/left_menu_view',
            $parse
        );
    }

	/**
     * planetMenu
     *
     * @return string
     */
    private function planetMenu()
    {
		$lang = $this->langs->loadLang('game/menu', true);
		$db = new Database();
		$parse['system_version'] = SYSTEM_VERSION;
		$parse['planetlist']    = Functions::buildPlanetList($this->current_user);

		$planet_count = $db->numRows($db->query("SELECT * FROM " . PLANETS . "
			WHERE `planet_user_id` = '" . $this->current_user['user_id'] . "'
			AND `planet_type` = 1
			AND `planet_destroyed` = 0"));

		$parse['lm_planets']	= $lang->line('lm_planets');
		$parse['row_type_1']	= ($planet_count > 5) ? 'cutty' : 'norm';
		$parse['row_type_2']	= ($planet_count > 5) ? 'myPlanets' : 'myWorlds';
		$parse['planet_count']	= $planet_count;
		$parse['planet_max']	= FleetsLib::getMaxColonies($this->current_user['research_astrophysics']);

        return $this->template->set('general/right_menu_view', $parse);
    }

    public function gameFooter()
    {
        return $this->template->set(
            'general/footer',
            []
        );
    }

    public function jsReady($template = '')
    {
        $output = str_replace(["\r\n", "\r"], "\n", $template);
        $lines = explode("\n", $output);
        $new_lines = [];

        foreach ($lines as $i => $line) {
            if (!empty($line)) {
                $new_lines[] = trim($line);
            }
        }

        return join($new_lines);
    }

    /**
     * Build the officers block for the game topnav
     *
     * @param array $lang
     * @return array
     */
    private function buildOfficersBlock(CiLang $lang): array
    {
        $objects = $this->objects->getObjects();
        $officers = $this->objects->getObjectsList('officier');
        $list_of_officiers = [];

        foreach ($officers as $officer) {
            $inactive = '';
            $details = $lang->language['of_add_' . $objects[$officer]];
            $expiration = $this->current_user[$objects[$officer]];
            $shortTime = '';

            if (Officiers::isOfficierActive($expiration)) {
                $inactive = 'on';
                $details = Officiers::getOfficierTimeLeft($expiration, $lang->language);
                $shortTime = Officiers::getOfficierShortTime($expiration);
            }

            $list_of_officiers['img_' . $objects[$officer]] = $inactive;
            $list_of_officiers['add_' . $objects[$officer]] = $details;
            $list_of_officiers['end_' . $objects[$officer]] = $shortTime;
        }

        return $list_of_officiers;
    }

    /**
     * Build the list of planet
     *
     * @return void
     */
    private function buildPlanetList()
    {
        $lang = $this->langs->loadLang('game/global', true);

        $db = new Database();
        $list = '';
        $user_planets = $this->sortPlanets();

        $page = isset($_GET['page']) ? $_GET['page'] : '';
        $gid = isset($_GET['gid']) ? $_GET['gid'] : '';
        $mode = isset($_GET['mode']) ? $_GET['mode'] : '';

        if ($user_planets) {
            while ($planets = $db->fetchArray($user_planets)) {
                $list .= "\n<option ";
                $list .= (($planets['planet_id'] == $this->current_user['user_current_planet']) ?
                    'selected="selected" ' : '');

                $list .= 'value="game.php?page=' . $page . '&gid=' .
                    $gid . '&cp=' . $planets['planet_id'] . '';
                $list .= '&amp;mode=' . $mode;
                $list .= '&amp;re=0">';

                $list .= (($planets['planet_type'] != PlanetTypesEnumerator::MOON) ? $planets['planet_name'] : $planets['planet_name'] . ' (' . $lang->line('moon') . ')');
                $list .= '&nbsp;[' . $planets['planet_galaxy'] . ':';
                $list .= $planets['planet_system'] . ':';
                $list .= $planets['planet_planet'];
                $list .= ']&nbsp;&nbsp;</option>';
            }
        }

        // IF THE LIST OF PLANETS IS EMPTY WE SHOULD RETURN false
        if ($list !== '') {
            return $list;
        } else {
            return false;
        }
    }

    /**
     * Sort planets
     *
     * @return void
     */
    private function sortPlanets()
    {
        $db = new Database();
        $order = $this->current_user['preference_planet_sort_sequence'] == 1 ? 'DESC' : 'ASC'; // up or down
        $sort = $this->current_user['preference_planet_sort'];

        $planets = 'SELECT `planet_id`, `planet_name`, `planet_galaxy`, `planet_system`, `planet_planet`, `planet_type`
                    FROM ' . PLANETS . "
                    WHERE `planet_user_id` = '" . (int) $this->current_user['user_id'] . "'
                        AND `planet_destroyed` = 0 ORDER BY ";

        switch ($sort) {
            case 0: // emergence
            default:
                $planets .= '`planet_id` ' . $order;
                break;
            case 1: // coordinates
                $planets .= '`planet_galaxy` ' . $order . ', `planet_system` ' . $order . ', `planet_planet` ' . $order . ', `planet_type` ' . $order;
                break;
            case 2: // alphabet
                $planets .= '`planet_name` ' . $order;
                break;
            case 3: // size
                $planets .= '`planet_diameter` ' . $order;
                break;
            case 4: // used_fields
                $planets .= '`planet_field_current` ' . $order;
                break;
        }

        return $db->query($planets);
    }
}
