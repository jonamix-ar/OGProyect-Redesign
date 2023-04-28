<?php

namespace App\Http\Controllers\Game;

use App\Core\BaseController;
use App\Helpers\UrlHelper;
use App\Libraries\Functions;
use App\Libraries\TimingLibrary as Timing;
use App\Libraries\Users;
use App\Models\Game\ComponentOnly;

class ComponentOnlyController extends BaseController
{
    public const MODULE_ID = 23;

    private int $bans_count = 0;
    private ComponentOnly $componentOnlyModel;

    public function __construct()
    {
        parent::__construct();

        // check if session is active
        Users::checkSession();

        // load Language
        parent::loadLang(['game/componentonly']);

        $this->componentOnlyModel = new ComponentOnly();
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
        $this->page->display(
            $this->template->set(
                'ajax/eventBoxAjax',
                array_merge(
                    $this->langs->language,
                    [
                        //'banned_players' => $this->buildBannedPlayersList(),
                        'banned_msg' => $this->getBannedAmountLabel(),
                    ]
                )
            ), false
        );
    }

    /**
     * Return the list of banned players
     *
     * @return array
     */
    private function buildBannedPlayersList(): array
    {
        $bans = $this->bannedModel->getBannedUsers();
        $list_of_bans = [];

        if (!empty($bans)) {
            foreach ($bans as $u) {
                $this->bans_count++;

                $list_of_bans[] = [
                    'player' => $u['banned_who'],
                    'reason' => $u['banned_theme'],
                    'since' => Timing::formatExtendedDate($u['banned_time']),
                    'until' => Timing::formatExtendedDate($u['banned_longer']),
                    'by' => UrlHelper::setUrl(
                        'mailto:' . $u['banned_email'],
                        $u['banned_author'],
                        $u['banned_author']
                    ),
                ];
            }
        }

        return $list_of_bans;
    }

    /**
     * Get banned amount label
     *
     * @return string
     */
    private function getBannedAmountLabel(): string
    {
        if ($this->bans_count > 0) {
            return strtr($this->langs->line('bn_exists_players_banned'), ['%s' => $this->bans_count]);
        }

        return $this->langs->line('bn_no_players_banned');
    }
}
