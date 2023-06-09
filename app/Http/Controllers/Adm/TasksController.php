<?php

declare(strict_types=1);

namespace App\Http\Controllers\Adm;

use App\Core\BaseController;
use App\Helpers\UrlHelper;
use App\Libraries\Adm\AdministrationLib as Administration;
use App\Libraries\FormatLib as Format;
use App\Libraries\Functions;
use App\Libraries\TimingLibrary as Timing;

class TasksController extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        // check if session is active
        Administration::checkSession();

        // load Language
        parent::loadLang(['adm/global', 'adm/tasks']);
    }

    public function index(): void
    {
        // check if the user is allowed to access
        if (!Administration::authorization(__CLASS__, (int) $this->user['user_authlevel'])) {
            die(Administration::noAccessMessage($this->langs->line('no_permissions')));
        }

        // build the page
        $this->buildPage();
    }

    private function buildPage(): void
    {
        $this->page->displayAdmin(
            $this->template->set(
                'adm/tasks_view',
                array_merge(
                    $this->langs->language,
                    $this->buildUpdatesBlock()
                )
            )
        );
    }

    /**
     * Build the tasks list
     *
     * @return array
     */
    private function buildUpdatesBlock(): array
    {
        $update_tasks = ['stat_last_update', 'last_backup', 'last_cleanup'];
        $update_blocks = [];

        foreach ($update_tasks as $task) {
            $update_blocks[] = $this->getTaskData($task);
        }

        return ['tasks_list' => $update_blocks];
    }

    /**
     * Get the task information
     *
     * @return array
     */
    private function getTaskData(string $task): array
    {
        $next_run = '-';
        $last_run = '-';

        if ($this->isTaskScheduled($task)) {
            $task_time = Functions::readConfig($task);
            $next_run = Timing::formatExtendedDate($task_time);
            $last_run = Format::prettyTimeAgo(date('Y-m-d H:i:s', (int) $task_time)) . ' ago';
        }

        return [
            'name' => $this->langs->line('ta_' . $task),
            'next_run' => $next_run,
            'last_run' => $last_run,
            'actions' => $this->{'get' . ucwords(strtr($task, ['_' => ''])) . 'Actions'}(),
        ];
    }

    /**
     * Check if the task is scheduled, return true if it is
     *
     * @param string $task
     * @return boolean
     */
    private function isTaskScheduled(string $task): bool
    {
        return !($task == 'last_backup' && Functions::readConfig('auto_backup') == 0);
    }

    /**
     * Get actions for the points update task
     *
     * @return string
     */
    private function getStatLastUpdateActions(): string
    {
        return UrlHelper::setUrl(
            'admin.php?page=rebuildhighscores',
            '<i class="fas fa-play" data-toggle="popover" data-placement="top"
            data-trigger="hover" data-content="' . $this->langs->line('ta_buildstats_title') . '"></i>',
            $this->langs->line('ta_buildstats_title')
        );
    }

    /**
     * Get actions for the backup task
     *
     * @return string
     */
    private function getLastBackupActions(): string
    {
        return UrlHelper::setUrl(
            'admin.php?page=backup',
            '<i class="fas fa-cogs" data-toggle="popover" data-placement="top"
            data-trigger="hover" data-content="' . $this->langs->line('ta_backup_title') . '"></i>',
            $this->langs->line('ta_backup_title')
        );
    }

    /**
     * Get actions for clean up task
     *
     * @return string
     */
    private function getLastCleanupActions(): string
    {
        return '';
    }
}
