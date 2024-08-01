-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2024 a las 21:59:15
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `xgr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_acs`
--

CREATE TABLE `xgp_acs` (
  `acs_id` bigint(20) UNSIGNED NOT NULL,
  `acs_name` varchar(50) DEFAULT NULL,
  `acs_owner` int(11) NOT NULL DEFAULT 0,
  `acs_galaxy` int(2) DEFAULT NULL,
  `acs_system` int(4) DEFAULT NULL,
  `acs_planet` int(2) DEFAULT NULL,
  `acs_planet_type` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_acs_members`
--

CREATE TABLE `xgp_acs_members` (
  `acs_member_id` int(11) UNSIGNED NOT NULL,
  `acs_group_id` int(11) UNSIGNED NOT NULL,
  `acs_user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_alliance`
--

CREATE TABLE `xgp_alliance` (
  `alliance_id` bigint(11) NOT NULL,
  `alliance_name` varchar(32) DEFAULT NULL,
  `alliance_tag` varchar(8) DEFAULT NULL,
  `alliance_owner` int(11) NOT NULL DEFAULT 0,
  `alliance_register_time` int(11) NOT NULL DEFAULT 0,
  `alliance_description` text DEFAULT NULL,
  `alliance_web` varchar(255) DEFAULT NULL,
  `alliance_text` text DEFAULT NULL,
  `alliance_image` varchar(255) DEFAULT NULL,
  `alliance_request` text DEFAULT NULL,
  `alliance_request_notallow` tinyint(4) NOT NULL DEFAULT 0,
  `alliance_ranks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_alliance_statistics`
--

CREATE TABLE `xgp_alliance_statistics` (
  `alliance_statistic_alliance_id` int(11) NOT NULL,
  `alliance_statistic_buildings_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `alliance_statistic_buildings_old_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_buildings_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_defenses_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `alliance_statistic_defenses_old_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_defenses_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_ships_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `alliance_statistic_ships_old_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_ships_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_technology_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `alliance_statistic_technology_old_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_technology_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_total_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `alliance_statistic_total_old_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_total_rank` int(11) NOT NULL DEFAULT 0,
  `alliance_statistic_update_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_banned`
--

CREATE TABLE `xgp_banned` (
  `banned_id` bigint(11) NOT NULL,
  `banned_who` varchar(64) NOT NULL DEFAULT '',
  `banned_theme` text NOT NULL,
  `banned_time` int(11) NOT NULL DEFAULT 0,
  `banned_longer` int(11) NOT NULL DEFAULT 0,
  `banned_author` varchar(64) NOT NULL DEFAULT '',
  `banned_email` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_buddys`
--

CREATE TABLE `xgp_buddys` (
  `buddy_id` int(11) UNSIGNED NOT NULL,
  `buddy_sender` int(10) UNSIGNED NOT NULL,
  `buddy_receiver` int(10) UNSIGNED NOT NULL,
  `buddy_status` tinyint(1) NOT NULL DEFAULT 0,
  `buddy_request_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_buildings`
--

CREATE TABLE `xgp_buildings` (
  `building_id` int(11) UNSIGNED NOT NULL,
  `building_planet_id` int(11) UNSIGNED NOT NULL,
  `building_metal_mine` int(11) NOT NULL DEFAULT 0,
  `building_crystal_mine` int(11) NOT NULL DEFAULT 0,
  `building_deuterium_sintetizer` int(11) NOT NULL DEFAULT 0,
  `building_solar_plant` int(11) NOT NULL DEFAULT 0,
  `building_fusion_reactor` int(11) NOT NULL DEFAULT 0,
  `building_robot_factory` int(11) NOT NULL DEFAULT 0,
  `building_nano_factory` int(11) NOT NULL DEFAULT 0,
  `building_hangar` int(11) NOT NULL DEFAULT 0,
  `building_metal_store` int(11) NOT NULL DEFAULT 0,
  `building_crystal_store` int(11) NOT NULL DEFAULT 0,
  `building_deuterium_tank` int(11) NOT NULL DEFAULT 0,
  `building_laboratory` int(11) NOT NULL DEFAULT 0,
  `building_terraformer` int(11) NOT NULL DEFAULT 0,
  `building_ally_deposit` int(11) NOT NULL DEFAULT 0,
  `building_repair_dock` int(11) NOT NULL DEFAULT 0,
  `building_missile_silo` int(11) NOT NULL DEFAULT 0,
  `building_mondbasis` int(11) NOT NULL DEFAULT 0,
  `building_phalanx` int(11) NOT NULL DEFAULT 0,
  `building_jump_gate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_buildings`
--

INSERT INTO `xgp_buildings` (`building_id`, `building_planet_id`, `building_metal_mine`, `building_crystal_mine`, `building_deuterium_sintetizer`, `building_solar_plant`, `building_fusion_reactor`, `building_robot_factory`, `building_nano_factory`, `building_hangar`, `building_metal_store`, `building_crystal_store`, `building_deuterium_tank`, `building_laboratory`, `building_terraformer`, `building_ally_deposit`, `building_repair_dock`, `building_missile_silo`, `building_mondbasis`, `building_phalanx`, `building_jump_gate`) VALUES
(1, 1, 30, 27, 24, 32, 4, 10, 5, 12, 15, 14, 13, 12, 5, 0, 2, 6, 0, 0, 0),
(3, 3, 29, 26, 23, 31, 4, 10, 5, 12, 14, 13, 12, 12, 0, 0, 3, 2, 0, 0, 0),
(4, 4, 28, 25, 23, 31, 4, 12, 5, 12, 13, 12, 11, 12, 0, 0, 2, 4, 0, 0, 0),
(5, 5, 29, 26, 23, 31, 5, 10, 5, 12, 13, 13, 12, 12, 3, 0, 3, 2, 0, 0, 0),
(6, 6, 28, 25, 21, 30, 3, 10, 5, 12, 12, 11, 10, 11, 6, 0, 2, 2, 0, 0, 0),
(7, 7, 28, 25, 23, 31, 5, 10, 6, 12, 14, 13, 12, 10, 0, 0, 3, 3, 0, 0, 0),
(8, 8, 27, 25, 23, 30, 4, 10, 5, 12, 13, 12, 11, 0, 0, 0, 2, 3, 0, 0, 0),
(9, 9, 29, 26, 23, 32, 4, 10, 6, 12, 14, 13, 12, 0, 3, 0, 4, 3, 0, 0, 0),
(10, 10, 23, 20, 18, 26, 0, 10, 4, 6, 11, 10, 9, 0, 0, 0, 4, 2, 0, 0, 0),
(11, 11, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 5, 4, 1),
(12, 12, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(13, 13, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0),
(14, 14, 0, 0, 0, 0, 0, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 1),
(15, 15, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0),
(16, 16, 0, 0, 0, 0, 0, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 1),
(17, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 20, 5, 1, 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_changelog`
--

CREATE TABLE `xgp_changelog` (
  `changelog_id` int(11) UNSIGNED NOT NULL,
  `changelog_lang_id` int(11) NOT NULL,
  `changelog_version` varchar(16) NOT NULL,
  `changelog_date` date NOT NULL,
  `changelog_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_changelog`
--

INSERT INTO `xgp_changelog` (`changelog_id`, `changelog_lang_id`, `changelog_version`, `changelog_date`, `changelog_description`) VALUES
(1, 1, '3.0.0', '2013-05-13', '- Ejemplo 1'),
(2, 1, '3.1.0', '2013-06-13', '- Ejemplo 2'),
(3, 1, '3.2.0', '2013-11-08', '- Ejemplo 3'),
(4, 2, '3.0.0', '2013-05-13', '- Example 1'),
(5, 2, '3.1.0', '2013-06-13', '- Example 2'),
(6, 2, '3.2.0', '2013-11-08', '- Example 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_defenses`
--

CREATE TABLE `xgp_defenses` (
  `defense_id` int(11) UNSIGNED NOT NULL,
  `defense_planet_id` int(11) UNSIGNED NOT NULL,
  `defense_rocket_launcher` int(11) NOT NULL DEFAULT 0,
  `defense_light_laser` int(11) NOT NULL DEFAULT 0,
  `defense_heavy_laser` int(11) NOT NULL DEFAULT 0,
  `defense_ion_cannon` int(11) NOT NULL DEFAULT 0,
  `defense_gauss_cannon` int(11) NOT NULL DEFAULT 0,
  `defense_plasma_turret` int(11) NOT NULL DEFAULT 0,
  `defense_small_shield_dome` int(11) NOT NULL DEFAULT 0,
  `defense_large_shield_dome` int(11) NOT NULL DEFAULT 0,
  `defense_anti_ballistic_missile` int(11) NOT NULL DEFAULT 0,
  `defense_interplanetary_missile` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_defenses`
--

INSERT INTO `xgp_defenses` (`defense_id`, `defense_planet_id`, `defense_rocket_launcher`, `defense_light_laser`, `defense_heavy_laser`, `defense_ion_cannon`, `defense_gauss_cannon`, `defense_plasma_turret`, `defense_small_shield_dome`, `defense_large_shield_dome`, `defense_anti_ballistic_missile`, `defense_interplanetary_missile`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_fleets`
--

CREATE TABLE `xgp_fleets` (
  `fleet_id` bigint(11) NOT NULL,
  `fleet_owner` int(11) NOT NULL DEFAULT 0,
  `fleet_mission` int(11) NOT NULL DEFAULT 0,
  `fleet_amount` bigint(11) NOT NULL DEFAULT 0,
  `fleet_array` text DEFAULT NULL,
  `fleet_start_time` int(11) NOT NULL DEFAULT 0,
  `fleet_start_galaxy` int(11) NOT NULL DEFAULT 0,
  `fleet_start_system` int(11) NOT NULL DEFAULT 0,
  `fleet_start_planet` int(11) NOT NULL DEFAULT 0,
  `fleet_start_type` int(11) NOT NULL DEFAULT 0,
  `fleet_end_time` int(11) NOT NULL DEFAULT 0,
  `fleet_end_stay` int(11) NOT NULL DEFAULT 0,
  `fleet_end_galaxy` int(11) NOT NULL DEFAULT 0,
  `fleet_end_system` int(11) NOT NULL DEFAULT 0,
  `fleet_end_planet` int(11) NOT NULL DEFAULT 0,
  `fleet_end_type` int(11) NOT NULL DEFAULT 0,
  `fleet_target_obj` int(2) NOT NULL DEFAULT 0,
  `fleet_resource_metal` bigint(11) NOT NULL DEFAULT 0,
  `fleet_resource_crystal` bigint(11) NOT NULL DEFAULT 0,
  `fleet_resource_deuterium` bigint(11) NOT NULL DEFAULT 0,
  `fleet_fuel` bigint(11) NOT NULL DEFAULT 0,
  `fleet_target_owner` int(11) NOT NULL DEFAULT 0,
  `fleet_group` varchar(15) NOT NULL DEFAULT '0',
  `fleet_mess` tinyint(1) NOT NULL DEFAULT 0,
  `fleet_creation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_languages`
--

CREATE TABLE `xgp_languages` (
  `language_id` int(11) NOT NULL,
  `language_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_languages`
--

INSERT INTO `xgp_languages` (`language_id`, `language_name`) VALUES
(1, 'Español'),
(2, 'English');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_messages`
--

CREATE TABLE `xgp_messages` (
  `message_id` bigint(11) NOT NULL,
  `message_sender` int(11) NOT NULL DEFAULT 0,
  `message_receiver` int(11) NOT NULL DEFAULT 0,
  `message_time` int(11) NOT NULL DEFAULT 0,
  `message_type` int(11) NOT NULL DEFAULT 0,
  `message_from` varchar(128) DEFAULT NULL,
  `message_subject` text DEFAULT NULL,
  `message_text` text DEFAULT NULL,
  `message_read` tinyint(1) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_messages`
--

INSERT INTO `xgp_messages` (`message_id`, `message_sender`, `message_receiver`, `message_time`, `message_type`, `message_from`, `message_subject`, `message_text`, `message_read`) VALUES
(3, 0, 4, 1722434930, 5, 'Admin', '¡Te damos la bienvenida a XGProyect!', 'Hola Gonzalo - ¡Bienvenido a XGProyect!\r\n    <br/><br/>\r\n    Al principio empieza por construir una mina de metal.<br/>\r\n    Para hacer esto haz click en el enlace \"Recursos\" de la izquierda, selecciona la mina de metal, y haz click en \"Construir\".<br/>\r\n    Mientras esperas tienes la oportunidad de leer más sobre el juego.<br/>\r\n    Encontrarás ayuda:<br/>\r\n    En el <a href=\"game.php?page=tutorial\">Tutorial</a><br/>\r\n    En el <a href=\"game.php?page=forums\">Foro</a><br/>\r\n    O puedes pedir ayuda en el canal de soporte de IRC: #xgproyect.org y #xgproyect.org-support en:<br/>\r\n    https://www.onlinegamesnet.net/javaChat.php?game=xgproyect&cc=en<br/>\r\n    <br/><br/>\r\n    También puedes solicitar soporte del equipo utilizando el <a href=\"game.php?page=ticket\">Sistema de Tickets</a><br/>\r\n    Ahora la mina debería estar construida.<br/>\r\n    Como las minas no producen nada sin energía, deberías construir también una planta de energía solar, vuelve a \"Recursos\", selecciona la planta de energía solar y construyela.<br/>\r\n    Para ver todas las naves, estructuras defensivas, edificios e investigaciones que podrás desarrollar puedes echar un vistazo al árbol tecnológico en \"Tecnología\" en el menu de la izquierda.<br/>\r\n    Ahora puede comentar la conquista del universo... ¡Buena suerte!', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_notes`
--

CREATE TABLE `xgp_notes` (
  `note_id` bigint(11) NOT NULL,
  `note_owner` int(11) DEFAULT NULL,
  `note_time` int(11) DEFAULT NULL,
  `note_priority` tinyint(1) DEFAULT NULL,
  `note_title` varchar(32) DEFAULT NULL,
  `note_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_options`
--

CREATE TABLE `xgp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) DEFAULT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_options`
--

INSERT INTO `xgp_options` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'game_name', 'XG Proyect'),
(2, 'game_logo', 'https://xgproyect.org/wp-content/uploads/2019/10/xgp-new-logo-white.png'),
(3, 'lang', 'spanish'),
(4, 'game_speed', '30000'),
(5, 'fleet_speed', '30000'),
(6, 'resource_multiplier', '12'),
(7, 'admin_email', 'gonzacru@yahoo.com.ar'),
(8, 'forum_url', 'https://www.xgproyect.org/'),
(9, 'game_enable', '1'),
(10, 'close_reason', 'Sorry, the server is currently offline.'),
(11, 'date_time_zone', 'America/Argentina/Buenos_Aires'),
(12, 'date_format', 'd.m.Y'),
(13, 'date_format_extended', 'd.m.Y H:i:s'),
(14, 'adm_attack', '1'),
(15, 'fleet_cdr', '30'),
(16, 'defs_cdr', '30'),
(17, 'noobprotection', '1'),
(18, 'noobprotectiontime', '50000'),
(19, 'noobprotectionmulti', '5'),
(20, 'modules', '1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;1;0;1;1'),
(21, 'admin_permissions', '{\"server\":{\"1\":1,\"2\":1},\"modules\":{\"1\":1,\"2\":1},\"planets\":{\"1\":1,\"2\":1},\"registration\":{\"1\":1,\"2\":1},\"statistics\":{\"1\":1,\"2\":1},\"premium\":{\"1\":1,\"2\":1},\"tasks\":{\"1\":1,\"2\":1},\"errors\":{\"1\":1,\"2\":1},\"fleets\":{\"1\":1,\"2\":1},\"messages\":{\"1\":1,\"2\":1},\"maker\":{\"1\":1,\"2\":1},\"userscontroller\":{\"1\":1,\"2\":1},\"alliances\":{\"1\":1,\"2\":1},\"languages\":{\"1\":1,\"2\":1},\"changelog\":{\"1\":1,\"2\":1},\"permissions\":{\"1\":1,\"2\":1},\"backup\":{\"1\":1,\"2\":1},\"encrypter\":{\"1\":1,\"2\":1},\"announcement\":{\"1\":1,\"2\":1},\"ban\":{\"1\":1,\"2\":1},\"rebuildhighscores\":{\"1\":1,\"2\":1},\"update\":{\"1\":1,\"2\":1},\"migrate\":{\"1\":1,\"2\":1},\"repair\":{\"1\":1,\"2\":1},\"reset\":{\"1\":1,\"2\":1}}'),
(22, 'initial_fields', '163'),
(23, 'metal_basic_income', '90'),
(24, 'crystal_basic_income', '45'),
(25, 'deuterium_basic_income', '0'),
(26, 'energy_basic_income', '0'),
(27, 'reg_enable', '1'),
(28, 'reg_welcome_message', '1'),
(29, 'reg_welcome_email', '1'),
(30, 'stat_points', '1000'),
(31, 'stat_update_time', '1'),
(32, 'stat_admin_level', '3'),
(33, 'stat_last_update', '1722521064'),
(34, 'premium_url', 'https://www.xgproyect.org/game.php?page=officier'),
(35, 'merchant_price', '3500'),
(36, 'auto_backup', '0'),
(37, 'last_backup', '0'),
(38, 'last_cleanup', '1722511348'),
(39, 'version', '3.5.0'),
(40, 'lastsettedgalaxypos', '1'),
(41, 'lastsettedsystempos', '1'),
(42, 'lastsettedplanetpos', '4'),
(43, 'merchant_base_min_exchange_rate', '0.7'),
(44, 'merchant_base_max_exchange_rate', '1'),
(45, 'merchant_metal_multiplier', '3'),
(46, 'merchant_crystal_multiplier', '2'),
(47, 'merchant_deuterium_multiplier', '1'),
(48, 'registration_dark_matter', '0'),
(49, 'mailing_protocol', 'smtp'),
(50, 'mailing_smtp_host', 'mailhog'),
(51, 'mailing_smtp_user', ''),
(52, 'mailing_smtp_pass', ''),
(53, 'mailing_smtp_port', '1025'),
(54, 'mailing_smtp_timeout', '5'),
(55, 'mailing_smtp_crypto', 'tls');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_planets`
--

CREATE TABLE `xgp_planets` (
  `planet_id` bigint(11) NOT NULL,
  `planet_name` varchar(255) DEFAULT NULL,
  `planet_user_id` int(11) DEFAULT NULL,
  `planet_galaxy` int(11) NOT NULL DEFAULT 0,
  `planet_system` int(11) NOT NULL DEFAULT 0,
  `planet_planet` int(11) NOT NULL DEFAULT 0,
  `planet_last_update` int(11) DEFAULT NULL,
  `planet_type` int(11) NOT NULL DEFAULT 1,
  `planet_destroyed` int(11) NOT NULL DEFAULT 0,
  `planet_b_building` int(11) NOT NULL DEFAULT 0,
  `planet_b_building_id` text NOT NULL,
  `planet_b_tech` int(11) NOT NULL DEFAULT 0,
  `planet_b_tech_id` int(11) NOT NULL DEFAULT 0,
  `planet_b_hangar` int(11) NOT NULL DEFAULT 0,
  `planet_b_hangar_id` text DEFAULT NULL,
  `planet_image` varchar(32) NOT NULL DEFAULT 'normaltempplanet01',
  `planet_diameter` int(11) NOT NULL DEFAULT 12800,
  `planet_field_current` int(11) NOT NULL DEFAULT 0,
  `planet_field_max` int(11) NOT NULL DEFAULT 163,
  `planet_temp_min` int(3) NOT NULL DEFAULT -17,
  `planet_temp_max` int(3) NOT NULL DEFAULT 23,
  `planet_metal` double(132,8) NOT NULL DEFAULT 0.00000000,
  `planet_metal_perhour` int(11) NOT NULL DEFAULT 0,
  `planet_crystal` double(132,8) NOT NULL DEFAULT 0.00000000,
  `planet_crystal_perhour` int(11) NOT NULL DEFAULT 0,
  `planet_deuterium` double(132,8) NOT NULL DEFAULT 0.00000000,
  `planet_deuterium_perhour` int(11) NOT NULL DEFAULT 0,
  `planet_energy_used` int(11) NOT NULL DEFAULT 0,
  `planet_energy_max` bigint(20) NOT NULL DEFAULT 0,
  `planet_building_metal_mine_percent` int(11) NOT NULL DEFAULT 10,
  `planet_building_crystal_mine_percent` int(11) NOT NULL DEFAULT 10,
  `planet_building_deuterium_sintetizer_percent` int(11) NOT NULL DEFAULT 10,
  `planet_building_solar_plant_percent` int(11) NOT NULL DEFAULT 10,
  `planet_building_fusion_reactor_percent` int(11) NOT NULL DEFAULT 10,
  `planet_ship_solar_satellite_percent` int(11) NOT NULL DEFAULT 10,
  `planet_last_jump_time` int(11) NOT NULL DEFAULT 0,
  `planet_debris_metal` bigint(11) NOT NULL DEFAULT 0,
  `planet_debris_crystal` bigint(11) NOT NULL DEFAULT 0,
  `planet_invisible_start_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_planets`
--

INSERT INTO `xgp_planets` (`planet_id`, `planet_name`, `planet_user_id`, `planet_galaxy`, `planet_system`, `planet_planet`, `planet_last_update`, `planet_type`, `planet_destroyed`, `planet_b_building`, `planet_b_building_id`, `planet_b_tech`, `planet_b_tech_id`, `planet_b_hangar`, `planet_b_hangar_id`, `planet_image`, `planet_diameter`, `planet_field_current`, `planet_field_max`, `planet_temp_min`, `planet_temp_max`, `planet_metal`, `planet_metal_perhour`, `planet_crystal`, `planet_crystal_perhour`, `planet_deuterium`, `planet_deuterium_perhour`, `planet_energy_used`, `planet_energy_max`, `planet_building_metal_mine_percent`, `planet_building_crystal_mine_percent`, `planet_building_deuterium_sintetizer_percent`, `planet_building_solar_plant_percent`, `planet_building_fusion_reactor_percent`, `planet_ship_solar_satellite_percent`, `planet_last_jump_time`, `planet_debris_metal`, `planet_debris_crystal`, `planet_invisible_start_time`) VALUES
(1, 'Carbono', 1, 1, 60, 9, 1722515786, 1, 0, 0, '0', 0, 0, 0, '', 'jungle_10', 12800, 211, 220, -8, 32, 110984794.63693000, 211157, 60535976.00834200, 91725, 33005105.44166800, 37959, -13502, 13745, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(3, 'Limon', 1, 1, 110, 5, 1722461066, 1, 0, 0, '0', 0, 0, 0, '', 'dry_6', 13687, 196, 217, 23, 63, 1205511.95666650, 154659, 530074.78666665, 66927, 191222.15111115, 24824, -11817, 12133, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(4, 'Pampas', 1, 1, 160, 7, 1722459661, 1, 0, 0, '0', 0, 0, 0, '', 'normal_8', 13336, 194, 207, 26, 66, 33004101.89333500, 135762, 18005000.00000000, 58508, 9819754.59555530, 24568, -10865, 12133, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(5, 'Gibzaki', 1, 1, 210, 5, 1722459689, 1, 0, 0, '0', 0, 0, 0, '', 'dry_6', 12512, 199, 202, 57, 97, 32999687.77333300, 154659, 33005000.00000000, 66927, 18003576.48999900, 21684, -11817, 12244, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(6, 'CoquiTomy', 1, 4, 399, 14, 1722459700, 1, 0, 0, '0', 0, 0, 0, '', 'normal_4', 11348, 188, 191, -110, -70, 18004101.89333400, 135762, 9820000.00000000, 58508, 5354760.82444450, 27371, -9855, 10618, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(7, 'CoquiRata', 1, 1, 399, 5, 1722459723, 1, 0, 0, '0', 0, 0, 0, '', 'normal_5', 13990, 195, 225, 53, 93, 60504252.84000200, 135762, 33005000.00000000, 58508, 18003523.42666800, 22028, -10865, 12244, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(8, 'Morza', 1, 1, 260, 6, 1722459734, 1, 0, 0, '0', 0, 0, 0, '', 'normal_7', 13942, 177, 224, 19, 59, 33004064.69333400, 119022, 18005000.00000000, 58508, 9819755.92666660, 25167, -10366, 10702, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(9, 'Magia', 1, 5, 450, 4, 1722459839, 1, 0, 0, '0', 0, 0, 0, '', 'dry_5', 12204, 191, 194, 35, 75, 60483126.63999800, 154659, 33005000.00000000, 66927, 17997867.63805800, 23797, -11817, 13745, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(10, 'Cuarenteno', 1, 1, 399, 6, 1722461051, 1, 0, 0, '0', 0, 0, 0, '', 'jungle_6', 14175, 143, 230, 37, 77, 9811714.01166860, 69288, 5355493.59166690, 29085, 2916089.35111020, 11776, -5406, 6197, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(11, 'de Pluton', 1, 1, 60, 9, 1722434241, 3, 0, 0, '0', 0, 0, 0, '', 'moon_5', 8717, 16, 16, -19, 21, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(12, 'de Girasol', 1, 1, 160, 7, 1682982076, 3, 0, 0, '0', 0, 0, 0, '', 'moon_3', 6183, 8, 10, 12, 46, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(13, 'de Canela', 1, 1, 110, 5, 1682947103, 3, 0, 0, '0', 0, 0, 0, '', 'moon_1', 7676, 8, 10, 5, 45, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(14, 'de Queso', 1, 4, 399, 14, 1682947128, 3, 0, 0, '0', 0, 0, 0, '', 'moon_4', 8944, 10, 10, -123, -83, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(15, 'de Jamon', 1, 1, 210, 5, 1682947158, 3, 0, 0, '0', 0, 0, 0, '', 'moon_1', 8944, 5, 7, 45, 85, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(16, 'de Comida para perro', 1, 1, 399, 5, 1682947479, 3, 0, 0, '0', 0, 0, 0, '', 'moon_5', 8744, 9, 10, 34, 74, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(17, 'de Comida para gato', 1, 1, 260, 6, 1682947508, 3, 0, 0, '0', 0, 0, 0, '', 'moon_2', 8744, 0, 1, 5, 45, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(18, 'de Lava', 1, 5, 450, 4, 1682947530, 3, 0, 0, '0', 0, 0, 0, '', 'moon_5', 8774, 0, 1, 24, 64, 0.00000000, 0, 0.00000000, 0, 0.00000000, 0, 0, 0, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0),
(20, 'Planeta Principal', 4, 1, 1, 4, 1722521106, 1, 0, 0, '0', 0, 0, 0, '', 'normal_7', 12800, 10, 163, 38, 78, 8656.23061114, 2988, 2680.27333328, 309, 0.00000000, 0, -92, 117, 10, 10, 10, 10, 10, 10, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_preferences`
--

CREATE TABLE `xgp_preferences` (
  `preference_id` int(11) UNSIGNED NOT NULL,
  `preference_user_id` int(11) NOT NULL,
  `preference_nickname_change` int(10) DEFAULT NULL,
  `preference_spy_probes` tinyint(2) NOT NULL DEFAULT 1,
  `preference_planet_sort` tinyint(1) NOT NULL DEFAULT 0,
  `preference_planet_sort_sequence` tinyint(1) NOT NULL DEFAULT 0,
  `preference_vacation_mode` int(10) DEFAULT NULL,
  `preference_delete_mode` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_preferences`
--

INSERT INTO `xgp_preferences` (`preference_id`, `preference_user_id`, `preference_nickname_change`, `preference_spy_probes`, `preference_planet_sort`, `preference_planet_sort_sequence`, `preference_vacation_mode`, `preference_delete_mode`) VALUES
(1, 1, NULL, 1, 0, 0, NULL, NULL),
(4, 4, NULL, 1, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_premium`
--

CREATE TABLE `xgp_premium` (
  `premium_user_id` int(10) UNSIGNED NOT NULL,
  `premium_dark_matter` int(10) NOT NULL DEFAULT 0,
  `premium_officier_commander` int(10) NOT NULL DEFAULT 0,
  `premium_officier_admiral` int(10) NOT NULL DEFAULT 0,
  `premium_officier_engineer` int(10) NOT NULL DEFAULT 0,
  `premium_officier_geologist` int(10) NOT NULL DEFAULT 0,
  `premium_officier_technocrat` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_premium`
--

INSERT INTO `xgp_premium` (`premium_user_id`, `premium_dark_matter`, `premium_officier_commander`, `premium_officier_admiral`, `premium_officier_engineer`, `premium_officier_geologist`, `premium_officier_technocrat`) VALUES
(1, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_reports`
--

CREATE TABLE `xgp_reports` (
  `report_owners` varchar(255) NOT NULL,
  `report_rid` varchar(42) NOT NULL,
  `report_content` text NOT NULL,
  `report_destroyed` tinyint(1) UNSIGNED NOT NULL DEFAULT 0,
  `report_time` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_research`
--

CREATE TABLE `xgp_research` (
  `research_id` int(10) UNSIGNED NOT NULL,
  `research_user_id` int(11) UNSIGNED NOT NULL,
  `research_current_research` int(11) NOT NULL DEFAULT 0,
  `research_espionage_technology` int(11) NOT NULL DEFAULT 0,
  `research_computer_technology` int(11) NOT NULL DEFAULT 0,
  `research_weapons_technology` int(11) NOT NULL DEFAULT 0,
  `research_shielding_technology` int(11) NOT NULL DEFAULT 0,
  `research_armour_technology` int(11) NOT NULL DEFAULT 0,
  `research_energy_technology` int(11) NOT NULL DEFAULT 0,
  `research_hyperspace_technology` int(11) NOT NULL DEFAULT 0,
  `research_combustion_drive` int(11) NOT NULL DEFAULT 0,
  `research_impulse_drive` int(11) NOT NULL DEFAULT 0,
  `research_hyperspace_drive` int(11) NOT NULL DEFAULT 0,
  `research_laser_technology` int(11) NOT NULL DEFAULT 0,
  `research_ionic_technology` int(11) NOT NULL DEFAULT 0,
  `research_plasma_technology` int(11) NOT NULL DEFAULT 0,
  `research_intergalactic_research_network` int(11) NOT NULL DEFAULT 0,
  `research_astrophysics` int(11) NOT NULL DEFAULT 0,
  `research_graviton_technology` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_research`
--

INSERT INTO `xgp_research` (`research_id`, `research_user_id`, `research_current_research`, `research_espionage_technology`, `research_computer_technology`, `research_weapons_technology`, `research_shielding_technology`, `research_armour_technology`, `research_energy_technology`, `research_hyperspace_technology`, `research_combustion_drive`, `research_impulse_drive`, `research_hyperspace_drive`, `research_laser_technology`, `research_ionic_technology`, `research_plasma_technology`, `research_intergalactic_research_network`, `research_astrophysics`, `research_graviton_technology`) VALUES
(1, 1, 0, 15, 13, 16, 15, 17, 13, 12, 15, 12, 10, 12, 5, 12, 6, 15, 1),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_sessions`
--

CREATE TABLE `xgp_sessions` (
  `session_id` char(32) NOT NULL,
  `session_data` longtext NOT NULL,
  `session_last_accessed` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_sessions`
--

INSERT INTO `xgp_sessions` (`session_id`, `session_data`, `session_last_accessed`) VALUES
('lpa27mnp11iposupkhojqc06gc', 'user_id|s:1:\"1\";user_password|s:60:\"$2y$10$FTK/3G8nh6ZSsTqJYDNiUOIVkPmiRZeGvhOlJJkW2w9TAoO9fRowe\";', '2024-08-01 12:36:26'),
('mt5e51063dq92s3bt7rrgdid25', 'user_id|s:1:\"4\";user_password|s:60:\"$2y$10$Mh0uhwb8QMny6Q/JLJsCi.3xbeEeGRPahVHuWrWQtXZZvz60vNYLq\";admin_id|s:1:\"4\";admin_password|s:60:\"$2y$10$jtfD.Gd3qwNdpkPCOqm0AeHVf9ykQSdKRYYeZxh03AT4pfRS1bwvm\";', '2024-08-01 14:05:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_ships`
--

CREATE TABLE `xgp_ships` (
  `ship_id` int(11) UNSIGNED NOT NULL,
  `ship_planet_id` int(11) UNSIGNED NOT NULL,
  `ship_small_cargo_ship` int(11) NOT NULL DEFAULT 0,
  `ship_big_cargo_ship` int(11) NOT NULL DEFAULT 0,
  `ship_light_fighter` int(11) NOT NULL DEFAULT 0,
  `ship_heavy_fighter` int(11) NOT NULL DEFAULT 0,
  `ship_cruiser` int(11) NOT NULL DEFAULT 0,
  `ship_battleship` int(11) NOT NULL DEFAULT 0,
  `ship_colony_ship` int(11) NOT NULL DEFAULT 0,
  `ship_recycler` int(11) NOT NULL DEFAULT 0,
  `ship_espionage_probe` int(11) NOT NULL DEFAULT 0,
  `ship_bomber` int(11) NOT NULL DEFAULT 0,
  `ship_solar_satellite` int(11) NOT NULL DEFAULT 0,
  `ship_destroyer` int(11) NOT NULL DEFAULT 0,
  `ship_deathstar` int(11) NOT NULL DEFAULT 0,
  `ship_battlecruiser` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_ships`
--

INSERT INTO `xgp_ships` (`ship_id`, `ship_planet_id`, `ship_small_cargo_ship`, `ship_big_cargo_ship`, `ship_light_fighter`, `ship_heavy_fighter`, `ship_cruiser`, `ship_battleship`, `ship_colony_ship`, `ship_recycler`, `ship_espionage_probe`, `ship_bomber`, `ship_solar_satellite`, `ship_destroyer`, `ship_deathstar`, `ship_battlecruiser`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 15, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 16, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 17, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 18, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(20, 20, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_users`
--

CREATE TABLE `xgp_users` (
  `user_id` bigint(11) UNSIGNED NOT NULL,
  `user_name` varchar(64) NOT NULL DEFAULT '',
  `user_password` varchar(64) NOT NULL DEFAULT '',
  `user_email` varchar(64) NOT NULL DEFAULT '',
  `user_authlevel` tinyint(4) NOT NULL DEFAULT 0,
  `user_home_planet_id` int(11) NOT NULL DEFAULT 0,
  `user_galaxy` int(11) NOT NULL DEFAULT 0,
  `user_system` int(11) NOT NULL DEFAULT 0,
  `user_planet` int(11) NOT NULL DEFAULT 0,
  `user_current_planet` int(11) NOT NULL DEFAULT 0,
  `user_lastip` varchar(39) NOT NULL DEFAULT '',
  `user_ip_at_reg` varchar(39) NOT NULL DEFAULT '',
  `user_agent` text DEFAULT NULL,
  `user_current_page` text DEFAULT NULL,
  `user_register_time` int(11) NOT NULL DEFAULT 0,
  `user_onlinetime` int(11) NOT NULL DEFAULT 0,
  `user_fleet_shortcuts` text DEFAULT NULL,
  `user_planet_movements` int(11) NOT NULL DEFAULT 0,
  `user_ally_id` int(11) NOT NULL DEFAULT 0,
  `user_ally_request` int(11) NOT NULL DEFAULT 0,
  `user_ally_request_text` text DEFAULT NULL,
  `user_ally_register_time` int(11) NOT NULL DEFAULT 0,
  `user_ally_rank_id` int(11) NOT NULL DEFAULT 0,
  `user_banned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_users`
--

INSERT INTO `xgp_users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_authlevel`, `user_home_planet_id`, `user_galaxy`, `user_system`, `user_planet`, `user_current_planet`, `user_lastip`, `user_ip_at_reg`, `user_agent`, `user_current_page`, `user_register_time`, `user_onlinetime`, `user_fleet_shortcuts`, `user_planet_movements`, `user_ally_id`, `user_ally_request`, `user_ally_request_text`, `user_ally_register_time`, `user_ally_rank_id`, `user_banned`) VALUES
(1, 'Nipis', '$2y$10$7wALdPVFIKt4fgUr6kvIyOsSULmFU2GXHqvkvSYvM3k7PJ4lM9F7.', 'gonzacru@yahoo.com.ar', 0, 1, 1, 1, 1, 1, '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '/xgr/OGProyect-Redesign/game.php?page=componentOnly&component=eventList&action=fetchEventBox&ajax=1&asJson=1', 1682897407, 1722515786, NULL, 0, 0, 0, NULL, 0, 0, 0),
(4, 'Gonzalo', '$2y$10$QVLFeDUY8XOfmlFT5APsoOLclh60eI1QdwUtDcFkBv7ugGIHuJ3e.', 'gonzacrus@gmail.com', 3, 20, 1, 1, 4, 20, '::1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36', '/xgr/OGProyect-Redesign/game.php?page=componentOnly&component=eventList&action=fetchEventBox&ajax=1&asJson=1', 1722434930, 1722521106, NULL, 0, 0, 0, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `xgp_users_statistics`
--

CREATE TABLE `xgp_users_statistics` (
  `user_statistic_user_id` int(11) NOT NULL,
  `user_statistic_buildings_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `user_statistic_buildings_old_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_buildings_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_defenses_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `user_statistic_defenses_old_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_defenses_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_ships_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `user_statistic_ships_old_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_ships_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_technology_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `user_statistic_technology_old_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_technology_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_total_points` double(132,8) NOT NULL DEFAULT 0.00000000,
  `user_statistic_total_old_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_total_rank` int(11) NOT NULL DEFAULT 0,
  `user_statistic_update_time` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `xgp_users_statistics`
--

INSERT INTO `xgp_users_statistics` (`user_statistic_user_id`, `user_statistic_buildings_points`, `user_statistic_buildings_old_rank`, `user_statistic_buildings_rank`, `user_statistic_defenses_points`, `user_statistic_defenses_old_rank`, `user_statistic_defenses_rank`, `user_statistic_ships_points`, `user_statistic_ships_old_rank`, `user_statistic_ships_rank`, `user_statistic_technology_points`, `user_statistic_technology_old_rank`, `user_statistic_technology_rank`, `user_statistic_total_points`, `user_statistic_total_old_rank`, `user_statistic_total_rank`, `user_statistic_update_time`) VALUES
(1, 1760329.49154700, 1, 1, 0.00000000, 1, 1, 0.00000000, 1, 1, 582546.73911649, 1, 1, 2342876.23066349, 1, 1, 1722521064),
(4, 1.91418750, 2, 2, 0.00000000, 2, 2, 0.00000000, 2, 2, 0.00000000, 2, 2, 1.91418750, 2, 2, 1722521064);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `xgp_acs`
--
ALTER TABLE `xgp_acs`
  ADD PRIMARY KEY (`acs_id`),
  ADD UNIQUE KEY `acs_name` (`acs_name`);

--
-- Indices de la tabla `xgp_acs_members`
--
ALTER TABLE `xgp_acs_members`
  ADD PRIMARY KEY (`acs_member_id`),
  ADD UNIQUE KEY `acs_group_id` (`acs_group_id`,`acs_user_id`);

--
-- Indices de la tabla `xgp_alliance`
--
ALTER TABLE `xgp_alliance`
  ADD PRIMARY KEY (`alliance_id`);

--
-- Indices de la tabla `xgp_alliance_statistics`
--
ALTER TABLE `xgp_alliance_statistics`
  ADD PRIMARY KEY (`alliance_statistic_alliance_id`);

--
-- Indices de la tabla `xgp_banned`
--
ALTER TABLE `xgp_banned`
  ADD PRIMARY KEY (`banned_id`),
  ADD KEY `ID` (`banned_id`);

--
-- Indices de la tabla `xgp_buddys`
--
ALTER TABLE `xgp_buddys`
  ADD PRIMARY KEY (`buddy_id`);

--
-- Indices de la tabla `xgp_buildings`
--
ALTER TABLE `xgp_buildings`
  ADD PRIMARY KEY (`building_id`),
  ADD UNIQUE KEY `building_planet_id` (`building_planet_id`);

--
-- Indices de la tabla `xgp_changelog`
--
ALTER TABLE `xgp_changelog`
  ADD PRIMARY KEY (`changelog_id`),
  ADD UNIQUE KEY `changelog_id` (`changelog_id`);

--
-- Indices de la tabla `xgp_defenses`
--
ALTER TABLE `xgp_defenses`
  ADD PRIMARY KEY (`defense_id`),
  ADD UNIQUE KEY `defense_planet_id` (`defense_planet_id`);

--
-- Indices de la tabla `xgp_fleets`
--
ALTER TABLE `xgp_fleets`
  ADD PRIMARY KEY (`fleet_id`);

--
-- Indices de la tabla `xgp_languages`
--
ALTER TABLE `xgp_languages`
  ADD PRIMARY KEY (`language_id`),
  ADD UNIQUE KEY `language_id` (`language_id`);

--
-- Indices de la tabla `xgp_messages`
--
ALTER TABLE `xgp_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indices de la tabla `xgp_notes`
--
ALTER TABLE `xgp_notes`
  ADD PRIMARY KEY (`note_id`);

--
-- Indices de la tabla `xgp_options`
--
ALTER TABLE `xgp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- Indices de la tabla `xgp_planets`
--
ALTER TABLE `xgp_planets`
  ADD PRIMARY KEY (`planet_id`);

--
-- Indices de la tabla `xgp_preferences`
--
ALTER TABLE `xgp_preferences`
  ADD PRIMARY KEY (`preference_id`),
  ADD UNIQUE KEY `preference_user_id` (`preference_user_id`);

--
-- Indices de la tabla `xgp_premium`
--
ALTER TABLE `xgp_premium`
  ADD UNIQUE KEY `premium_user_id` (`premium_user_id`);

--
-- Indices de la tabla `xgp_reports`
--
ALTER TABLE `xgp_reports`
  ADD UNIQUE KEY `report_rid` (`report_rid`),
  ADD KEY `time` (`report_time`);

--
-- Indices de la tabla `xgp_research`
--
ALTER TABLE `xgp_research`
  ADD PRIMARY KEY (`research_id`),
  ADD UNIQUE KEY `research_user_id` (`research_user_id`);

--
-- Indices de la tabla `xgp_sessions`
--
ALTER TABLE `xgp_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indices de la tabla `xgp_ships`
--
ALTER TABLE `xgp_ships`
  ADD PRIMARY KEY (`ship_id`),
  ADD UNIQUE KEY `ship_planet_id` (`ship_planet_id`);

--
-- Indices de la tabla `xgp_users`
--
ALTER TABLE `xgp_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `xgp_users_statistics`
--
ALTER TABLE `xgp_users_statistics`
  ADD PRIMARY KEY (`user_statistic_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `xgp_acs`
--
ALTER TABLE `xgp_acs`
  MODIFY `acs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_acs_members`
--
ALTER TABLE `xgp_acs_members`
  MODIFY `acs_member_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_alliance`
--
ALTER TABLE `xgp_alliance`
  MODIFY `alliance_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_banned`
--
ALTER TABLE `xgp_banned`
  MODIFY `banned_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_buddys`
--
ALTER TABLE `xgp_buddys`
  MODIFY `buddy_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_buildings`
--
ALTER TABLE `xgp_buildings`
  MODIFY `building_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `xgp_defenses`
--
ALTER TABLE `xgp_defenses`
  MODIFY `defense_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `xgp_fleets`
--
ALTER TABLE `xgp_fleets`
  MODIFY `fleet_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_messages`
--
ALTER TABLE `xgp_messages`
  MODIFY `message_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `xgp_notes`
--
ALTER TABLE `xgp_notes`
  MODIFY `note_id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `xgp_options`
--
ALTER TABLE `xgp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1354;

--
-- AUTO_INCREMENT de la tabla `xgp_planets`
--
ALTER TABLE `xgp_planets`
  MODIFY `planet_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `xgp_preferences`
--
ALTER TABLE `xgp_preferences`
  MODIFY `preference_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `xgp_research`
--
ALTER TABLE `xgp_research`
  MODIFY `research_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `xgp_ships`
--
ALTER TABLE `xgp_ships`
  MODIFY `ship_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `xgp_users`
--
ALTER TABLE `xgp_users`
  MODIFY `user_id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
