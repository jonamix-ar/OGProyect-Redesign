<?php

namespace App\Libraries\Game;

use App\Core\Entity\FleetEntity;
use App\Core\Enumerators\MissionsEnumerator as Missions;

class Fleets
{
    private array $_fleets = [];
    private int $_current_user_id = 0;
    private int $_fleet_count = 0;
    private int $_expedition_count = 0;
    private array $_fleets_index = [];

    public function __construct($fleets, $current_user_id)
    {
        if (is_array($fleets)) {
            $this->setUp($fleets);
            $this->setUserId($current_user_id);
        }
    }

    /**
     * Get all the fleets
     *
     * @return array
     */
    public function getFleets()
    {
        $list_of_fleets = [];
        $index = 0;

        foreach ($this->_fleets as $fleets) {
            if (($fleets instanceof FleetEntity)) {
                $list_of_fleets[] = $fleets;
            }
        }

        return $list_of_fleets;
    }

    /**
     * Get a fleet by ID
     *
     * @param int $fleet_id
     *
     * @return FleetEntity
     */
    public function getFleetById(int $fleet_id): FleetEntity
    {
        return $this->_fleets[$this->validateIndex($fleet_id)] ?? new FleetEntity([]);
    }

    /**
     * Get a fleet by ID
     *
     * @param int $fleet_id
     *
     * @return FleetEntity
     */
    public function getOwnFleetById(int $fleet_id)
    {
        $fleet = $this->getFleetById($fleet_id);

        if ($fleet->getFleetOwner() == $this->getUserId()) {
            return $fleet;
        }

        return null;
    }

    /**
     * Get a valid fleet by ID
     *
     * @param int $fleet_id
     *
     * @return FleetEntity
     */
    public function getOwnValidFleetById(int $fleet_id)
    {
        $fleet = $this->getOwnFleetById($fleet_id);

        if ($fleet->getFleetStartTime() <= time()
            or $fleet->getFleetEndTime() < time()
            or $fleet->getFleetMess() == 1) {
            return null;
        }

        return $fleet;
    }

    /**
     * Validate index
     *
     * @param int $fleet_id
     *
     * @return type
     */
    private function validateIndex(int $fleet_id)
    {
        return isset($this->_fleets_index[$fleet_id]) ? $this->_fleets_index[$fleet_id] : -1;
    }

    /**
     * Set up the list of fleets
     *
     * @param array $fleets Fleets
     *
     * @return void
     */
    private function setUp($fleets)
    {
        $index = 0;

        foreach ($fleets as $fleet) {
            $data = $this->createNewFleetEntity($fleet);

            $this->_fleets[] = $data;
            $this->_fleets_index[$data->getFleetId()] = $index++;

            $this->setFleetsCount();

            if ($data->getFleetMission() == Missions::EXPEDITION) {
                $this->setExpeditionsCount();
            }
        }
    }

    /**
     *
     * @param int $user_id User Id
     */
    private function setUserId($user_id)
    {
        $this->_current_user_id = $user_id;
    }

    /**
     * Increase the fleets count
     *
     * @return void
     */
    private function setFleetsCount()
    {
        ++$this->_fleet_count;
    }

    /**
     * Increase the expeditions count
     *
     * @return void
     */
    private function setExpeditionsCount()
    {
        ++$this->_expedition_count;
    }

    /**
     *
     * @return int
     */
    private function getUserId()
    {
        return $this->_current_user_id;
    }

    /**
     *
     * @return int
     */
    public function getFleetsCount()
    {
        return $this->_fleet_count;
    }

    /**
     *
     * @return int
     */
    public function getExpeditionsCount()
    {
        return $this->_expedition_count;
    }

    /**
     * Create a new instance of FleetEntity
     *
     * @param array $fleet Fleet
     *
     * @return \FleetEntity
     */
    private function createNewFleetEntity($fleet)
    {
        return new FleetEntity($fleet);
    }
}
