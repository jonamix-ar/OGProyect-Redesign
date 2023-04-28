<?php

namespace App\Models\Game;

use App\Core\Model;

class ComponentOnly extends Model
{
    /**
     * Get banned users
     *
     * @return array
     */
    public function getBannedUsers()
    {
        return $this->db->queryFetchAll(
            'SELECT *
            FROM ' . BANNED . '
            ORDER BY `banned_id`;'
        );
    }
}
