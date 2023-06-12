<?php

declare(strict_types=1);

namespace App\Core\Enumerators;

abstract class ObjectsClassesEnumerator
{
	// buildings
	public const building_metal_mine = 'metalMine';
    public const building_crystal_mine = 'crystalMine';
    public const building_deuterium_sintetizer = 'deuteriumSynthesizer';
    public const building_solar_plant = 'solarPlant';
    public const building_fusion_reactor = 'fusionPlant';
    public const building_robot_factory = 'roboticsFactory';
    public const building_nano_factory = 'naniteFactory';
    public const building_hangar = 'shipyard';
    public const building_metal_store = 'metalStorage';
    public const building_crystal_store = 'crystalStorage';
    public const building_deuterium_tank = 'deuteriumStorage';
    public const building_laboratory = 'researchLaboratory';
    public const building_terraformer = 'terraformer';
    public const building_ally_deposit = 'allianceDepot';
    public const building_mondbasis = 'moonbase';
    public const building_phalanx = 'sensorPhalanx';
    public const building_jump_gate = 'jumpGate';
    public const building_missile_silo = 'missileSilo';

	// researchs
	public const research_espionage_technology = 'espionageTechnology';
    public const research_computer_technology = 'computerTechnology';
    public const research_weapons_technology = 'weaponsTechnology';
    public const research_shielding_technology = 'shieldingTechnology';
    public const research_armour_technology = 'armorTechnology';
    public const research_energy_technology = 'energyTechnology';
    public const research_hyperspace_technology = 'hyperspaceTechnology';
    public const research_combustion_drive = 'combustionDriveTechnology';
    public const research_impulse_drive = 'impulseDriveTechnology';
    public const research_hyperspace_drive = 'hyperspaceDriveTechnology';
    public const research_laser_technology = 'laserTechnology';
    public const research_ionic_technology = 'ionTechnology';
    public const research_plasma_technology = 'plasmaTechnology';
    public const research_intergalactic_research_network = 'researchNetworkTechnology';
    public const research_astrophysics = 'astrophysicsTechnology';
    public const research_graviton_technology = 'gravitonTechnology';

	// ships
    public const ship_small_cargo_ship = 'transporterSmall';
    public const ship_big_cargo_ship = 'transporterLarge';
    public const ship_light_fighter = 'fighterLight';
    public const ship_heavy_fighter = 'fighterHeavy';
    public const ship_cruiser = 'cruiser';
    public const ship_battleship = 'battleship';
    public const ship_colony_ship = 'colonyShip';
    public const ship_recycler = 'recycler';
    public const ship_espionage_probe = 'espionageProbe';
    public const ship_bomber = 'bomber';
    public const ship_solar_satellite = 'solarSatellite';
    public const ship_destroyer = 'destroyer';
    public const ship_deathstar = 'deathstar';
    public const ship_battlecruiser = 'interceptor';

	// defenses
	public const defense_rocket_launcher = 'rocketLauncher';
    public const defense_light_laser = 'laserCannonLight';
    public const defense_heavy_laser = 'laserCannonHeavy';
    public const defense_gauss_cannon = 'gaussCannon';
    public const defense_ion_cannon = 'ionCannon';
    public const defense_plasma_turret = 'plasmaCannon';
    public const defense_small_shield_dome = 'shieldDomeSmall';
    public const defense_large_shield_dome = 'shieldDomeLarge';

	// missiles
    public const defense_anti_ballistic_missile = 'missileInterceptor';
    public const defense_interplanetary_missile = 'missileInterplanetary';
}
