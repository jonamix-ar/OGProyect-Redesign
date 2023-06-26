<?php

namespace App\Http\Controllers\Game;

use App\Core\Objects;
use App\Core\BaseController;
use App\Core\Enumerators\PlanetTypesEnumerator;
use App\Core\Language;
use App\Helpers\UrlHelper;
use App\Libraries\DevelopmentsLib;
use App\Libraries\FormatLib;
use App\Libraries\Functions;
use App\Libraries\NoobsProtectionLib;
use App\Libraries\UpdatesLibrary;
use App\Libraries\Users;
use App\Models\Game\Overview;
use App\Models\Libraries\PlanetLib as Planet;

class OverviewController extends BaseController
{
    public const MODULE_ID = 1;

    private Overview $overviewModel;
    private NoobsProtectionLib $noob;

    public function __construct()
    {
        parent::__construct();

        // check if session is active
        Users::checkSession();

        // load Language
        parent::loadLang(['game/global', 'game/overview', 'game/buildings', 'game/constructions', 'game/technologies', 'game/ships', 'game/defenses']);

        $this->overviewModel = new Overview();
        $this->noob = new NoobsProtectionLib();
    }

    public function index(): void
    {
        // Check module access
        Functions::moduleMessage(Functions::isModuleAccesible(self::MODULE_ID));

        // build the page
        $this->buildPage();
    }

    private function buildPage(): void
    {
        $planetAsMoon = $this->getPlanetAsMoon();

        $this->page->display(
            $this->template->set(
                'overview/overview_body',
                array_merge(
                    $this->langs->language,
                    [
                        'game_url' => SYSTEM_ROOT,
                        'img_path' => strtr(IMG_PATH, ['\\' => '/']),
                        'planet_name' => $this->planet['planet_name'],
                        'user_name' => $this->user['user_name'],
                        'planet_image' => $this->getPlanetName($this->planet['planet_type'], $this->planet['planet_image']),
                        'building' => $this->getBuildingCurrentWork($this->planet),
                        'research' => $this->getResearchCurrentWork($this->planet),
                        'shipyard' => $this->getShipyardCurrentWork($this->planet),
                        'planet_as_moon' => $planetAsMoon['planet_as_moon'],
                        'planet_diameter' => FormatLib::prettyNumber($this->planet['planet_diameter']),
                        'planet_field_current' => $this->planet['planet_field_current'],
                        'planet_field_max' => DevelopmentsLib::maxFields($this->planet),
                        'planet_temp_min' => $this->planet['planet_temp_min'],
                        'planet_temp_max' => $this->planet['planet_temp_max'],
                        'galaxy_galaxy' => $this->planet['planet_galaxy'],
                        'galaxy_system' => $this->planet['planet_system'],
                        'galaxy_planet' => $this->planet['planet_planet'],
                        'user_rank' => $this->getUserRank(),
						'free_movements' => $this->getFreeMovements(),
                    ]
                )
            )
        );
    }

    private function getPlanetName($user_planet, $planet_img)
    {
        return $user_planet == PlanetTypesEnumerator::PLANET ? 'header_' . FormatLib::formatName($planet_img) : $planet_img;
    }


    private function getBuildingCurrentWork($user_planet, $is_current_planet = true)
    {
        // THE PLANET IS "FREE" BY DEFAULT
        $building_block = '';

        if (!$is_current_planet) {
            // UPDATE THE PLANET INFORMATION FIRST, MAY BE SOMETHING HAS JUST FINISHED
            UpdatesLibrary::updateBuildingsQueue($user_planet, $this->user);
        }

        if ($user_planet['planet_b_building'] != 0) {
            if ($user_planet['planet_b_building'] != 0) {
                $queue = explode(';', $user_planet['planet_b_building_id']); // GET ALL
                $current_building = explode(',', $queue[0]); // GET ONLY THE FIRST ELEMENT
                $building = $current_building[0]; // THE BUILDING
                $building_level = $current_building[1]; // THE LEVEL
                $time_to_end = $current_building[3] - time(); // THE TIME

                $button_cancel = strtr($this->langs->line('overview_button_building_cancel'), [
                    '%building%' => $this->langs->language[$this->objects->getObjects($building)],
                    '%level%' => $building_level
                ]);

                // THE BUILDING BLOCK
                if ($is_current_planet) {
                    $building_block = $this->template->set(
                        'overview/overview_production_building',
                        array_merge(
                            $this->langs->language,
                            [
                                'game_url' => SYSTEM_ROOT,
                                'img_path' => IMG_PATH,
                                'building_id' => $building,
                                'building_name' => $this->langs->language[$this->objects->getObjects($building)],
                                'building_level' => $building_level,
                                'building_time_end_formated' => FormatLib::prettyTime($time_to_end),
                                'building_time_end' => $time_to_end,
                                'building_planet_id' => $this->planet['planet_id'],
                                'building_time' => $user_planet['planet_b_building'],
                                'building_current' => $current_building[2],
                                'building_cancel' =>  $button_cancel,
                            ]
                        )
                    );
                }
            }
        } else {
            $building_block = $this->template->set(
                'overview/overview_production_empty',
                array_merge(
                    $this->langs->language,
                    [
                        'production_empty_tooltip' => $this->langs->line('overview_production_building_tooltip'),
                        'production_current_page' => SYSTEM_ROOT . 'game.php?page=resources',
                        'production_description' => $this->langs->line('overview_production_building_description')
                    ]
                )
            );
        }

        // BACK TO THE PLANET!
        return $building_block;
    }

    private function getResearchCurrentWork($users_planet, $is_current_planet = true)
    {
        // Si el planeta no es el actual, la cola de construcción debería haberse actualizado previamente.
        $research_row = '';

        if (!$is_current_planet) {
            // UPDATE THE PLANET INFORMATION FIRST, MAY BE SOMETHING HAS JUST FINISHED
            UpdatesLibrary::updateBuildingsQueue($user_planet, $this->user);
        }

        // Si hay una investigación en proceso
        if ($users_planet['planet_b_tech'] != 0) {
            $research_time = $users_planet['planet_b_tech'] - time();
            $research_name = $this->langs->language[$this->objects->getObjects($users_planet['planet_b_tech_id'])];
            $research_level = $this->user[$this->objects->getObjects($users_planet['planet_b_tech_id'])] + 1;
            $research_id = $users_planet['planet_b_tech_id'];
            $research_planet_type = $this->langs->line('planet_type')[$users_planet['planet_type']];

            $button_cancel = strtr($this->langs->line('overview_button_research_cancel'), [
                '%tech%' => $research_name,
                '%level%' => $research_level,
                '%type%' => $research_planet_type,
                '%planet%' => $users_planet['planet_name'],
                '%cord%' => FormatLib::formatCoords($users_planet['planet_galaxy'], $users_planet['planet_system'], $users_planet['planet_planet']),
            ]);

            // Si se trata del planeta actual, mostrar información detallada
            if ($is_current_planet) {
                // Mostrar detalles de la investigación en proceso
                $research_row = $this->template->set(
                    'overview/overview_production_research',
                    array_merge(
                        $this->langs->language,
                        [
                            'game_url' => SYSTEM_ROOT,
                            'img_path' => IMG_PATH,
                            'research_to_end' => FormatLib::prettyTime($research_time),
                            'research_time' => $users_planet['planet_b_tech'],
                            'research_time_cancel' => $research_time,
                            'research_name' => $research_name,
                            'research_level' => $research_level,
                            'research_id' => $research_id,
                            'research_button_cancel' => $button_cancel
                        ]
                    )
                );
            }
        } else {
            // Si no hay investigación en proceso, mostrar mensaje de que no hay investigación.
            $research_row = $this->template->set(
                'overview/overview_production_empty',
                array_merge(
                    $this->langs->language,
                    [
                        'production_empty_tooltip' => $this->langs->line('overview_production_research_tooltip'),
                        'production_current_page' => SYSTEM_ROOT . 'game.php?page=research',
                        'production_description' => $this->langs->line('overview_production_research_description')
                    ]
                )
            );
        }

        return $research_row;
    }

    private function getShipyardCurrentWork($users_planet, $is_current_planet = true)
    {
        // Si el planeta no es el actual, la cola de construcción debería haberse actualizado previamente.
        $shipyard_row = '';

        if (!$is_current_planet) {
            // UPDATE THE PLANET INFORMATION FIRST, MAY BE SOMETHING HAS JUST FINISHED
            UpdatesLibrary::updateBuildingsQueue($user_planet, $this->user);
        }

        $current_page = '';

        // Si hay una investigación en proceso
        if ($users_planet['planet_b_hangar'] != 0) {
            // Si se trata del planeta actual, mostrar información detallada
            if ($is_current_planet) {
                if (empty($shipyard)) {
                    $shipyard = explode(';', $this->planet['planet_b_hangar_id']);
                    $shipyard_data = explode(",", $shipyard[0]);
                    $shipyard_time = DevelopmentsLib::developmentTime($this->user, $this->planet, $shipyard_data[0]);
                    $shipyard_time_formated = FormatLib::prettyTime($shipyard_time);
                    $shipyard_queue_time = $shipyard_time * $shipyard_data[1];
                    $shipyard_total_time = $shipyard_queue_time - $users_planet['planet_b_hangar'];

                    if (!is_null($shipyard) && !empty($shipyard)) {
                        $shipyard_queue = $this->template->set(
                            'overview/overview_production_shipyard_queue',
                            [
                                'shipyard' => $shipyard,
                                'game_url' => SYSTEM_ROOT,
                                'img_path' => IMG_PATH,
                                'objects' => new Objects(),
                                'langs' => $this->langs->language,
                            ],
                        );
                    }

                    if ($shipyard_data[0] >= 200 && $shipyard_data[0] <= 299) {
                        $current_page .= 'shipyard';
                    }

                    if ($shipyard_data[0] >= 400 && $shipyard_data[0] <= 550) {
                        $current_page .= 'defense';
                    }

                    // Mostrar detalles de la investigación en proceso
                    $shipyard_row = $this->template->set(
                        'overview/overview_production_shipyard',
                        array_merge(
                            $this->langs->language,
                            [
                                'game_url' => SYSTEM_ROOT,
                                'img_path' => IMG_PATH,
                                'shipyard_id' => $shipyard_data[0],
                                'shipyard_name' => $this->langs->language[$this->objects->getObjects($shipyard_data[0])],
                                'shipyard_count' => $shipyard_data[1],
                                'shipyard_time' => $shipyard_time - $this->planet['planet_b_hangar'],
                                'shipyard_time_formated' => $shipyard_time_formated,
                                'shipyard_queue_time' => $shipyard_queue_time,
                                'shipyard_total_time' => $shipyard_total_time,
                                'shipyard_queue' => $shipyard_queue
                            ]
                        )
                    );
                }
            }
        } else {
            // Si no hay hangar en proceso, mostrar mensaje de que no hay hangar.
            $shipyard_row = $this->template->set(
                'overview/overview_production_empty',
                array_merge(
                    $this->langs->language,
                    [
                        'production_empty_tooltip' => $this->langs->line('overview_production_shipyard_tooltip'),
                        'production_current_page' => SYSTEM_ROOT . 'game.php?page=' . $current_page,
                        'production_description' => $this->langs->line('overview_production_shipyard_description')
                    ]
                )
            );
        }

        return $shipyard_row;
    }

    private function getPlanetAsMoon()
    {
        $return['planet_as_moon'] = '';

        if ($this->planet['moon_id'] != 0 && $this->planet['moon_destroyed'] == 0 && $this->planet['planet_type'] == 1) {
            $name = $this->langs->line('ov_switch') . ' ' . $this->langs->line('moon') . ' ' . $this->planet['moon_name'];
            $url = 'game.php?page=overview&cp=' . $this->planet['moon_id'] . '&re=0';
            $image = IMG_PATH . 'planets/large/' . $this->planet['moon_image'] . '.gif';
            $attributes = 'class="tooltipBottom js_hideTipOnMobile" title="' . $this->planet['moon_name'] . '"';

            $return['planet_as_moon'] = '<div id="moon">' . UrlHelper::setUrl($url, Functions::setImage($image, $name, $attributes), $name) . '</div>';
        } elseif ($this->planet['planet_type'] == 3) {
            $planetLib = new Planet();
            $planet = $planetLib->getPlanetDataByType($this->planet['planet_galaxy'], $this->planet['planet_system'], $this->planet['planet_planet'], PlanetTypesEnumerator::PLANET);

            $name = $this->langs->line('ov_switch') . ' ' . $this->langs->line('planet') . ' ' . $planet['planet_name'];
            $url = 'game.php?page=overview&cp=' . $planet['planet_id'] . '&re=0';
            $image = IMG_PATH . 'planets/large/' . FormatLib::formatName($planet['planet_image']) . '.jpg';
            $attributes = 'class="tooltipBottom js_hideTipOnMobile" title="' . $planet['planet_name'] . '"';

            $return['planet_as_moon'] = '<div id="planet_as_moon">' . UrlHelper::setUrl($url, Functions::setImage($image, $name, $attributes), $name) . '</div>';
        } else {
            $return['planet_as_moon'] = '';
        }

        return $return;
    }


    /**
     * method getUserRank
     * param
     * return the current user rank
     */
    private function getUserRank()
    {
        $user_rank = '-';
        $total_rank = $this->user['user_statistic_total_rank'] == '' ? $this->planet['stats_users'] : $this->user['user_statistic_total_rank'];

        if ($this->noob->isRankVisible($this->user['user_authlevel'])) {

            $user_rank = '<a href="' . SYSTEM_ROOT . 'game.php?page=highscore&range=' . $total_rank . '">' . $total_rank . ' (' . $this->langs->line('overview_place') . ' ' . FormatLib::prettyNumber($this->user['user_statistic_total_points']) . ' ' . $this->langs->line('overview_of') . ' ' . $this->planet['stats_users'] . ')<\/a>';
        }

        return $user_rank;
    }


    /**
     * method getFreeMovements
     * param
     * return the current user free planet movements
     */
    private function getFreeMovements()
    {
        $free_movements = '';

        if ($this->user['user_planet_movements'] > 0) {

            $free_movements = '<span class="undermark tooltip tpd-hideOnClickOutside" title="">
									(' . $this->user['user_planet_movements'] . ')
								</span>';
        }

        return $free_movements;
    }
}
