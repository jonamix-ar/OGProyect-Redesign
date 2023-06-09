<?php

namespace App\Libraries;

use App\Helpers\StringsHelper;
use App\Libraries\TimingLibrary as Timing;

class Officiers
{
    public static function isOfficierActive(int $expireTime): int
    {
        return ($expireTime > time() && $expireTime != 0);
    }

	public static function isCommandingActive(array $user): int
    {
        return ($user['premium_officier_commander'] > time() && $user['premium_officier_commander'] != 0
				&& $user['premium_officier_admiral'] > time() && $user['premium_officier_admiral'] != 0
				&& $user['premium_officier_engineer'] > time() && $user['premium_officier_engineer'] != 0
				&& $user['premium_officier_geologist'] > time() && $user['premium_officier_geologist'] != 0
				&& $user['premium_officier_technocrat'] > time() && $user['premium_officier_technocrat'] != 0);
    }

    public static function getMaxEspionage(int $espionageTech, int $technocrateLevel): int
    {
        return $espionageTech + (1 * (self::isOfficierActive($technocrateLevel) ? TECHNOCRATE_SPY : 0));
    }

    public static function getMaxComputer(int $computerTech, int $admiralLevel): int
    {
        return 1 + $computerTech + (1 * (self::isOfficierActive($admiralLevel) ? AMIRAL : 0));
    }

    public static function getOfficierTimeLeft(int $expiration, array $lang): string
    {
        $lang_line = 'of_time_remaining_many';
        $time_left = round(Timing::getDaysLeft($expiration));

        if (Timing::getDaysLeft($expiration) <= 1) {
            $lang_line = 'of_time_remaining_less';
            $time_left = Timing::formatHoursMinutesLeft($expiration);
        }

        if (Timing::getDaysLeft($expiration) > 1 && Timing::getDaysLeft($expiration) <= 2) {
            $lang_line = 'of_time_remaining_one';
            $time_left = '';
        }

        return StringsHelper::parseReplacements(
            $lang[$lang_line],
            [$time_left]
        );
    }

    public static function getOfficierShortTime(int $expiration): string
    {
        $days_left = round(Timing::getDaysLeft($expiration));

        return ($days_left <= 2) ? 'shortTime' : '';
    }
}
