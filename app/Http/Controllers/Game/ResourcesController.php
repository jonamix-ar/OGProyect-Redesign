<?php

namespace App\Http\Controllers\Game;

use App\Core\BaseController;
use App\Core\Enumerators\PlanetTypesEnumerator;
use App\Libraries\FormatLib;
use App\Libraries\Formulas;
use App\Libraries\Functions;
use App\Libraries\Officiers;
use App\Libraries\ProductionLib;
use App\Libraries\Users;
use App\Models\Game\Resources;

class ResourcesController extends BaseController
{
    public const MODULE_ID = 4;

    private $resource;
    private $prodGrid;
    private $reslist;
    private Resources $resourcesModel;

    public function __construct()
    {
        parent::__construct();

        // load Language
        parent::loadLang(['game/global', 'game/constructions', 'game/ships', 'game/resources', 'game/technologies', 'game/officier']);

        // check if session is active
        Users::checkSession();

        $this->resourcesModel = new Resources();
        $this->resource = $this->objects->getObjects();
        $this->prodGrid = $this->objects->getProduction();
        $this->reslist = $this->objects->getObjectsList();
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
        $parse = $this->langs->language;
		$parse['img_path'] = IMG_PATH;

        $game_metal_basic_income = Functions::readConfig('metal_basic_income');
        $game_crystal_basic_income = Functions::readConfig('crystal_basic_income');
        $game_deuterium_basic_income = Functions::readConfig('deuterium_basic_income');
        $game_energy_basic_income = Functions::readConfig('energy_basic_income');
        $game_resource_multiplier = Functions::readConfig('resource_multiplier');

        if ($this->user['preference_vacation_mode'] > 0 or $this->planet['planet_type'] == PlanetTypesEnumerator::MOON) {
            $game_metal_basic_income = 0;
            $game_crystal_basic_income = 0;
            $game_deuterium_basic_income = 0;
        }

        $this->planet['planet_metal_max'] = ProductionLib::maxStorable($this->planet[$this->resource[22]]);
        $this->planet['planet_crystal_max'] = ProductionLib::maxStorable($this->planet[$this->resource[23]]);
        $this->planet['planet_deuterium_max'] = ProductionLib::maxStorable($this->planet[$this->resource[24]]);

        $parse['production_level'] = 100;
        $post_percent = ProductionLib::maxProduction($this->planet['planet_energy_max'], $this->planet['planet_energy_used']);

        $parse['resource_row'] = '';
        $this->planet['planet_metal_perhour'] = 0;
        $this->planet['planet_crystal_perhour'] = 0;
        $this->planet['planet_deuterium_perhour'] = 0;
        $this->planet['planet_energy_max'] = 0;
        $this->planet['planet_energy_used'] = 0;

        $BuildTemp = $this->planet['planet_temp_max'];

        $plasmaBoost = [
            'metal' => 0,
            'crystal' => 0,
            'deuterium' => 0,
        ];

        $geologeBoost = [
            'metal' => 0,
            'crystal' => 0,
            'deuterium' => 0,
        ];

		$commandingBoost = [
            'metal' => 0,
            'crystal' => 0,
            'deuterium' => 0,
			'energy' => 0,
        ];

		$engineerBoost = 0;
		$energy_total = 0;

        $alt = 0;

        foreach ($this->reslist['prod'] as $ProdID) {
            if ($this->planet[$this->resource[$ProdID]] > -1 && isset($this->prodGrid[$ProdID])) {
                $resourcesTotal = [
                    'metal' => 0,
                    'crystal' => 0,
                    'deuterium' => 0,
                ];

                $BuildLevelFactor = $this->planet['planet_' . $this->resource[$ProdID] . '_percent'];
                $BuildLevel = $this->planet[$this->resource[$ProdID]];
                $BuildEnergy = $this->user['research_energy_technology'];

                // BOOST
                $geologe_boost = 1 + (1 * (Officiers::isOfficierActive($this->user['premium_officier_geologist']) ? GEOLOGUE : 0));
                $engineer_boost = 1 + (1 * (Officiers::isOfficierActive($this->user['premium_officier_engineer']) ? ENGINEER_ENERGY : 0));
				$commanding_production_boost = (1 * (Officiers::isCommandingActive($this->user) ? 1 + COMMAND_PRODUCTION : 0));
				$commanding_energy_boost = (1 * (Officiers::isCommandingActive($this->user) ? 1 + COMMAND_ENERGY : 0));

                // PRODUCTION FORMULAS
                $metal_prod = eval($this->prodGrid[$ProdID]['formule']['metal']);
                $crystal_prod = eval($this->prodGrid[$ProdID]['formule']['crystal']);
                $deuterium_prod = eval($this->prodGrid[$ProdID]['formule']['deuterium']);
                $energy_prod = eval($this->prodGrid[$ProdID]['formule']['energy']);

                // PRODUCTION
                $resourcesTotal['metal'] += ProductionLib::productionAmount($metal_prod, 1, $game_resource_multiplier);
                $resourcesTotal['crystal'] += ProductionLib::productionAmount($crystal_prod, 1, $game_resource_multiplier);
                $resourcesTotal['deuterium'] += ProductionLib::productionAmount($deuterium_prod, 1, $game_resource_multiplier);

                // PLASMA BOOST
                $metalBoost = Formulas::getPlasmaTechnologyBonus($this->user['research_plasma_technology'], 'metal');
                $crystalBoost = Formulas::getPlasmaTechnologyBonus($this->user['research_plasma_technology'], 'crystal');
                $deuteriumBoost = Formulas::getPlasmaTechnologyBonus($this->user['research_plasma_technology'], 'deuterium');

                // PRODUCTION
                $plasmaBoostMetal = ProductionLib::productionAmount($metal_prod, $metalBoost, $game_resource_multiplier);
                $plasmaBoostCrystal = ProductionLib::productionAmount($crystal_prod, $crystalBoost, $game_resource_multiplier);
                $plasmaBoostDeuterium = ProductionLib::productionAmount($deuterium_prod, $deuteriumBoost, $game_resource_multiplier);

				$geologeBoost['metal'] += ($resourcesTotal['metal'] * $geologe_boost) - $resourcesTotal['metal'];
                $geologeBoost['crystal'] += ($resourcesTotal['crystal'] * $geologe_boost) - $resourcesTotal['crystal'];
                $geologeBoost['deuterium'] += ($resourcesTotal['deuterium'] * $geologe_boost) - $resourcesTotal['deuterium'];

                $resourcesTotal['metal'] += $plasmaBoostMetal;
                $resourcesTotal['crystal'] += $plasmaBoostCrystal;
                $resourcesTotal['deuterium'] += $plasmaBoostDeuterium;

                $plasmaBoost['metal'] += $plasmaBoostMetal;
                $plasmaBoost['crystal'] += $plasmaBoostCrystal;
                $plasmaBoost['deuterium'] += $plasmaBoostDeuterium;

                $energy = ProductionLib::productionAmount($energy_prod, 1, 0, true);

                if ($energy > 0) {
                    $this->planet['planet_energy_max'] += $energy;
                } else {
                    $this->planet['planet_energy_used'] += $energy;
                }

				$engineerBoost = ($this->planet['planet_energy_max'] * $engineer_boost) - $this->planet['planet_energy_max'];

				if(Officiers::isCommandingActive($this->user))
				{
					$commandingBoost['metal'] += ($resourcesTotal['metal'] * $commanding_production_boost) - $resourcesTotal['metal'];
					$commandingBoost['crystal'] += ($resourcesTotal['crystal'] * $commanding_production_boost) - $resourcesTotal['crystal'];
					$commandingBoost['deuterium'] += ($resourcesTotal['deuterium'] * $commanding_production_boost) - $resourcesTotal['deuterium'];
					$commandingBoost['energy'] = ($this->planet['planet_energy_max'] * $commanding_energy_boost) - $this->planet['planet_energy_max'];
				}

                $this->planet['planet_metal_perhour'] += $resourcesTotal['metal'];
                $this->planet['planet_crystal_perhour'] += $resourcesTotal['crystal'];
                $this->planet['planet_deuterium_perhour'] += $resourcesTotal['deuterium'];
				$energy_total = $this->planet['planet_energy_max'] + $engineerBoost + $commandingBoost['energy'];

                $metal = ProductionLib::currentProduction($metal_prod, $post_percent) * $game_resource_multiplier;
                $crystal = ProductionLib::currentProduction($crystal_prod, $post_percent) * $game_resource_multiplier;
                $deuterium = ProductionLib::currentProduction($deuterium_prod, $post_percent) * $game_resource_multiplier;
                $energy2 = ProductionLib::currentProduction($energy, $post_percent);
                $Field = 'planet_' . $this->resource[$ProdID] . '_percent';
                $CurrRow = [];
                $CurrRow['name'] = $this->resource[$ProdID];
                $CurrRow['percent'] = $this->planet[$Field];
                $CurrRow['option'] = $this->build_options($CurrRow['percent'], $this->resource[$ProdID]);
                $CurrRow['id'] = $ProdID;
                $CurrRow['type'] = $this->langs->language[$this->resource[$ProdID]];
                $CurrRow['level'] = ($ProdID > 200) ? $this->langs->line('rs_amount') : $this->langs->line('level');
                $CurrRow['level_type'] = $this->planet[$this->resource[$ProdID]];
                $CurrRow['metal_type'] = FormatLib::prettyNumber($metal);
				$CurrRow['metal_class'] = FormatLib::getNumberClass($metal);
                $CurrRow['crystal_type'] = FormatLib::prettyNumber($crystal);
				$CurrRow['crystal_class'] = FormatLib::getNumberClass($crystal);
                $CurrRow['deuterium_type'] = FormatLib::prettyNumber($deuterium);
				$CurrRow['deuterium_class'] = FormatLib::getNumberClass($deuterium);

				if ($ProdID >= 4) {
                    $CurrRow['energy_type'] = FormatLib::prettyNumber($energy);
                } else {
                    $CurrRow['energy_type'] = FormatLib::prettyNumber(str_replace('-', '', $energy2)) . '/' . FormatLib::prettyNumber(str_replace('-', '', $energy2));
                }

				$CurrRow['energy_class'] = FormatLib::getNumberClass($energy2);
                $CurrRow['metal_type'] = $CurrRow['metal_type'];
                $CurrRow['crystal_type'] = $CurrRow['crystal_type'];
                $CurrRow['deuterium_type'] = $CurrRow['deuterium_type'];
                $CurrRow['energy_type'] = $CurrRow['energy_type'];
                $CurrRow['alt'] = ($alt % 2) ? 'alt' : '';

                $parse['resource_row'] .= $this->template->set(
                    'resources/resources_row',
                    $CurrRow
                );
            }

            $alt++;
        }

        $parse['Production_of_resources_in_the_planet'] = str_replace('%s', $this->planet['planet_name'], $this->langs->line('rs_production_on_planet'));
		$parse['recalculate_button'] = (!$this->userLibrary->isOnVacations($this->user)) ? '<span class="factorbutton">
										<input class="btn_blue" name="action" type="submit"
											value="' . $this->langs->language['rs_calculate'] . '">
									</span>'
									: '';

		$parse['second_overmark'] = ($this->userLibrary->isOnVacations($this->user)) ? '<div class="secondcol overmark">
										' . $this->langs->language['rs_production_disabled'] . '
									</div>'
									: '';

		//$this->planet['planet_energy_max'] = $this->planet['planet_energy_max'] + ($this->planet['planet_energy_max'] / 100 * 12);

        $parse['production_level'] = $this->prod_level($this->planet['planet_energy_used'], $this->planet['planet_energy_max']);
        $parse['metal_basic_income'] = $game_metal_basic_income;
        $parse['crystal_basic_income'] = $game_crystal_basic_income;
        $parse['deuterium_basic_income'] = $game_deuterium_basic_income;
        $parse['energy_basic_income'] = $game_energy_basic_income;

		$production_factor = ($this->planet['planet_energy_used'] > 0)
								? abs(ceil((($this->planet['planet_energy_max'] + $parse['energy_basic_income']) / $this->planet['planet_energy_used']) * 100))
								: 0;
		$parse['production_factor'] = (($production_factor > 100) ? 100 : $production_factor) . '%';

        $parse['plasma_level'] = $this->user['research_plasma_technology'];
        $parse['plasma_metal'] = FormatLib::prettyNumber($plasmaBoost['metal']);
        $parse['plasma_crystal'] = FormatLib::prettyNumber($plasmaBoost['crystal']);
        $parse['plasma_deuterium'] = FormatLib::prettyNumber($plasmaBoost['deuterium']);

		$parse['geologe_grayscale'] = (Officiers::isOfficierActive($this->user['premium_officier_geologist'])) ? '' : 'grayscale';
		$parse['geologe_disabled'] = (Officiers::isOfficierActive($this->user['premium_officier_geologist'])) ? '' : 'disabled';
		$parse['geologe_description'] = (Officiers::isOfficierActive($this->user['premium_officier_geologist']))
											? $parse['of_add_premium_officier_geologist']
											: $parse['of_hire_geologist'];
		$parse['geologe_metal'] = FormatLib::prettyNumber($geologeBoost['metal']);
		$parse['geologe_crystal'] = FormatLib::prettyNumber($geologeBoost['crystal']);
		$parse['geologe_deuterium'] = FormatLib::prettyNumber($geologeBoost['deuterium']);

		$parse['engineer_grayscale'] = (Officiers::isOfficierActive($this->user['premium_officier_engineer'])) ? '' : 'grayscale';
		$parse['engineer_disabled'] = (Officiers::isOfficierActive($this->user['premium_officier_engineer'])) ? '' : 'disabled';
		$parse['engineer_description'] = (Officiers::isOfficierActive($this->user['premium_officier_engineer']))
											? $parse['of_add_premium_officier_engineer_short']
											: $parse['of_hire_engineer'];
		$parse['engineer_energy'] = FormatLib::prettyNumber($engineerBoost);

		$parse['commanding_grayscale'] = (Officiers::isCommandingActive($this->user)) ? '' : 'grayscale';
		$parse['commanding_disabled'] = (Officiers::isCommandingActive($this->user)) ? '' : 'disabled';
		$parse['commanding_description'] = (Officiers::isCommandingActive($this->user))
											? $parse['of_add_premium_officier_commanding_short']
											: $parse['of_hire_commanding'];
		$parse['commanding_metal'] = FormatLib::prettyNumber($commandingBoost['metal']);
		$parse['commanding_crystal'] = FormatLib::prettyNumber($commandingBoost['crystal']);
		$parse['commanding_deuterium'] = FormatLib::prettyNumber($commandingBoost['deuterium']);
		$parse['commanding_energy'] = FormatLib::prettyNumber($commandingBoost['energy']);

        $parse['class_metal_max'] = $this->resource_color($this->planet['planet_metal'], $this->planet['planet_metal_max']);
        $parse['class_crystal_max'] = $this->resource_color($this->planet['planet_crystal'], $this->planet['planet_crystal_max']);
        $parse['class_deuterium_max'] = $this->resource_color($this->planet['planet_deuterium'], $this->planet['planet_deuterium_max']);

		$parse['planet_metal_max'] = FormatLib::shortlyNumber($this->planet['planet_metal_max']);
		$parse['planet_metal_max_wof'] = FormatLib::prettyNumber($this->planet['planet_metal_max']);
        $parse['planet_crystal_max'] = FormatLib::shortlyNumber($this->planet['planet_crystal_max']);
        $parse['planet_crystal_max_wof'] = FormatLib::prettyNumber($this->planet['planet_crystal_max']);
        $parse['planet_deuterium_max'] = FormatLib::shortlyNumber($this->planet['planet_deuterium_max']);
		$parse['planet_deuterium_max_wof'] = FormatLib::prettyNumber($this->planet['planet_deuterium_max']);

        $parse['metal_total'] = FormatLib::prettyNumber(floor((($this->planet['planet_metal_perhour'] * 0.01 * $parse['production_level']) + $parse['metal_basic_income'])));
        $parse['crystal_total'] = FormatLib::prettyNumber(floor((($this->planet['planet_crystal_perhour'] * 0.01 * $parse['production_level']) + $parse['crystal_basic_income'])));
        $parse['deuterium_total'] = FormatLib::prettyNumber(floor((($this->planet['planet_deuterium_perhour'] * 0.01 * $parse['production_level']) + $parse['deuterium_basic_income'])));
        $parse['energy_total'] = FormatLib::prettyNumber(abs(($this->planet['planet_energy_used'])));
		$parse['energy_total2'] = FormatLib::prettyNumber(floor($energy_total + $parse['energy_basic_income']));
		$parse['energy_class'] = ($parse['energy_total'] > $parse['energy_total2']) ? 'overmark' : 'undermark';

        $parse['hour_metal'] = $this->calculate_hour($this->planet['planet_metal_perhour'], $parse['production_level'], $parse['metal_basic_income']);
        $parse['daily_metal'] = $this->calculate_daily($this->planet['planet_metal_perhour'], $parse['production_level'], $parse['metal_basic_income']);
        $parse['weekly_metal'] = $this->calculate_weekly($this->planet['planet_metal_perhour'], $parse['production_level'], $parse['metal_basic_income']);

        $parse['hour_crystal'] = $this->calculate_hour($this->planet['planet_crystal_perhour'], $parse['production_level'], $parse['crystal_basic_income']);
        $parse['daily_crystal'] = $this->calculate_daily($this->planet['planet_crystal_perhour'], $parse['production_level'], $parse['crystal_basic_income']);
        $parse['weekly_crystal'] = $this->calculate_weekly($this->planet['planet_crystal_perhour'], $parse['production_level'], $parse['crystal_basic_income']);

        $parse['hour_deuterium'] = $this->calculate_hour($this->planet['planet_deuterium_perhour'], $parse['production_level'], $parse['deuterium_basic_income']);
        $parse['daily_deuterium'] = $this->calculate_daily($this->planet['planet_deuterium_perhour'], $parse['production_level'], $parse['deuterium_basic_income']);
        $parse['weekly_deuterium'] = $this->calculate_weekly($this->planet['planet_deuterium_perhour'], $parse['production_level'], $parse['deuterium_basic_income']);


        $parse['hour_metal'] = FormatLib::prettyNumber($parse['hour_metal']);
        $parse['daily_metal'] = FormatLib::prettyNumber($parse['daily_metal']);
        $parse['weekly_metal'] = FormatLib::prettyNumber($parse['weekly_metal']);
        $parse['hour_crystal'] = FormatLib::prettyNumber($parse['hour_crystal']);
        $parse['daily_crystal'] = FormatLib::prettyNumber($parse['daily_crystal']);
        $parse['weekly_crystal'] = FormatLib::prettyNumber($parse['weekly_crystal']);
        $parse['hour_deuterium'] = FormatLib::prettyNumber($parse['hour_deuterium']);
        $parse['daily_deuterium'] = FormatLib::prettyNumber($parse['daily_deuterium']);
        $parse['weekly_deuterium'] = FormatLib::prettyNumber($parse['weekly_deuterium']);

        $ValidList['percent'] = [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100];
        $SubQry = '';

        if ($_POST && !$this->userLibrary->isOnVacations($this->user)) {
            foreach ($_POST as $Field => $Value) {
                $FieldName = 'planet_' . $Field . '_percent';
                if (isset($this->planet[$FieldName])) {
					$Value = ($this->planet[$Field] > 0) ? $Value : 100;
                    if (!in_array($Value, $ValidList['percent'])) {
                        Functions::redirect('game.php?page=resourceSettings');
                    }

                    $Value = $Value / 10;
                    $this->planet[$FieldName] = $Value;
                    $SubQry .= ', `' . $FieldName . "` = '" . $Value . "'";
                }
            }

            $this->resourcesModel->updateCurrentPlanet($this->planet, $SubQry);

            Functions::redirect('game.php?page=resourceSettings');
        }

        $this->page->display(
            $this->template->set(
                'resources/resources',
                $parse
            )
        );
    }

    /**
     * method build_options
     * param $current_percentage
     * return percentage options for the select element
     */
    private function build_options($current_porcentage, $name)
    {
		$class = [
			100 => 'undermark',
			90 => 'undermark',
			80 => 'undermark',
			70 => 'undermark',
			60 => 'middlemark',
			50 => 'middlemark',
			40 => 'middlemark',
			30 => 'overmark',
			20 => 'overmark',
			20 => 'overmark',
			10 => 'overmark',
			0 => 'overmark',
		];

        $option_row = '<select name="' . $name . '" size="1" class="' . $class[$current_porcentage * 10] . '">';
        for ($option = 10; $option >= 0; $option--) {
            $opt_value = $option * 10;

            if ($option == $current_porcentage) {
                $opt_selected = ' selected=selected';
            } else {
                $opt_selected = '';
            }

            $option_row .= '<option class="' . $class[$opt_value] . '" value="' . $opt_value . '"' . $opt_selected . '>' . $opt_value . '%</option>';
        }

        return $option_row;
    }

    private function calculate_hour($prod_per_hour, $prod_level, $basic_income)
    {
        return floor(($basic_income + ($prod_per_hour * 0.01 * $prod_level)));
    }


    private function calculate_daily($prod_per_hour, $prod_level, $basic_income)
    {
        return floor(($basic_income + ($prod_per_hour * 0.01 * $prod_level)) * 24);
    }

    private function calculate_weekly($prod_per_hour, $prod_level, $basic_income)
    {
        return floor(($basic_income + ($prod_per_hour * 0.01 * $prod_level)) * 24 * 7);
    }

    private function resource_color($current_amount, $max_amount)
    {
        if ($max_amount < $current_amount) {
            return 'overmark';
        } else {
            return 'normalmark';
        }
    }

    private function prod_level($energy_used, $energy_max)
    {
        if ($energy_max == 0 && $energy_used > 0) {
            $prod_level = 0;
        } elseif ($energy_max > 0 && abs($energy_used) > $energy_max) {
            $prod_level = floor(($energy_max) / ($energy_used * -1) * 100);
        } elseif ($energy_max == 0 && abs($energy_used) > $energy_max) {
            $prod_level = 0;
        } else {
            $prod_level = 100;
        }

        if ($prod_level > 100) {
            $prod_level = 100;
        }

        return $prod_level;
    }
}
