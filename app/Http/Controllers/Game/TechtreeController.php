<?php

namespace App\Http\Controllers\Game;

use App\Core\BaseController;
use App\Libraries\FormatLib;
use App\Libraries\Functions;
use App\Libraries\Users;

class TechtreeController extends BaseController
{
    public const MODULE_ID = 10;

    /**
     *
     * @var \Objects
     */
    private $_resource;

    /**
     *
     * @var \Objects
     */
    private $_requirements;

    public function __construct()
    {
        parent::__construct();

        // check if session is active
        Users::checkSession();

        // load Language
        parent::loadLang(['game/global', 'game/constructions', 'game/defenses', 'game/ships', 'game/technologies']);

        // requirements
        $this->_resource = $this->objects->getObjects();

        // requirements
        $this->_requirements = $this->objects->getRelations();
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
        /**
         * Get tab and item id
         */
        $tab = filter_input(INPUT_GET, 'tab', FILTER_VALIDATE_INT);
        $open = filter_input(INPUT_GET, 'open');
        $tech_id = filter_input(INPUT_GET, 'technologyId', FILTER_VALIDATE_INT);
        $allowed_tabs = [
			'1' => 'technologytree',
			'2' => 'technologyinformation',
			'3' => 'technologies',
			'4' => 'applications',
		];

        if (!is_null($tab)) {
            if (array_key_exists($tab, $allowed_tabs)) {
				$parse['techtree_view'] = $this->template->set('techtree/techtree_' . $allowed_tabs[$tab] . '_view');
				$parse['current_tab'] = $allowed_tabs[$tab];

				// display the page
				$this->page->display(
					$this->template->set(
						'techtree/techtree_body',
						$parse
					), false
				);
            } else {
				Functions::redirect('game.php?page=techtree&technologyId=1&tab=1');
			}
        } else {
			Functions::redirect('game.php?page=techtree&technologyId=1&tab=1');
		}
    }

    /**
     * Build the block
     *
     * @param string $object_id
     *
     * @return array
     */
    private function buildBlock(string $object_id): array
    {
        $objects = $this->objects->getObjectsList($object_id);
        $list_of_objects = [];

        foreach ($objects as $object) {
            $list_of_objects[] = [
                'tt_info' => $object,
                'tt_name' => $this->langs->language[$this->_resource[$object]],
                'tt_detail' => '',
                'requirements' => join('<br/>', $this->getRequirements($object)),
            ];
        }

        return $list_of_objects;
    }

    /**
     * Build the requirements list
     *
     * @param int $object
     *
     * @return array
     */
    private function getRequirements(int $object): array
    {
        $list_of_requirements = [];

        if (!isset($this->_requirements[$object])) {
            return $list_of_requirements;
        }

        foreach ($this->_requirements[$object] as $requirement => $level) {
            $color = 'Red';

            if ((isset($this->user[$this->_resource[$requirement]])
                && $this->user[$this->_resource[$requirement]] >= $level)
                or (isset($this->planet[$this->_resource[$requirement]])
                    && $this->planet[$this->_resource[$requirement]] >= $level)) {
                $color = 'Green';
            }

            $list_of_requirements[] = FormatLib::{'color' . $color}(
                FormatLib::formatLevel(
                    $this->langs->language[$this->_resource[$requirement]],
                    $this->langs->line('level'),
                    $level
                )
            );
        }

        return $list_of_requirements;
    }

    /**
     * Build the technologies block
     *
     * @param int $object
     *
     * @return array
     */
    private function buildTechnologiesBlock(): array
    {
        $list_of_requirements = [];

        if (!isset($this->_requirements[$object])) {
            return $list_of_requirements;
        }

        foreach ($this->_requirements[$object] as $requirement => $level) {
            $color = 'Red';

            if ((isset($this->user[$this->_resource[$requirement]])
                && $this->user[$this->_resource[$requirement]] >= $level)
                or (isset($this->planet[$this->_resource[$requirement]])
                    && $this->planet[$this->_resource[$requirement]] >= $level)) {
                $color = 'Green';
            }

            $list_of_requirements[] = FormatLib::{'color' . $color}(
                FormatLib::formatLevel(
                    $this->langs->language[$this->_resource[$requirement]],
                    $this->langs->line('level'),
                    $level
                )
            );
        }

        return $list_of_requirements;
    }
}
