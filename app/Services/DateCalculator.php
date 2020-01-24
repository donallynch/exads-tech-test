<?php

namespace App\Services;
use DateTime;

/**
 * Class DateCalculator
 *  The Irish National Lottery draw takes place twice weekly on a Wednesday and a Saturday at 8pm.
 *  Write a function or class that calculates and returns the next valid draw date based on the current
 *  date and time AND also on an optionally supplied date and time.
 *
 * Driver
 *  $value = $this->dateCalculator->calculateNextValidDrawDate();
 *
 * @package App\Services
 */
class DateCalculator
{
    private $preWednesday = [7,1,2];
    private $preSaturday = [4,5];

    const EIGHT_PM_24_HOUR = 20;
    const TODAY_AT_EIGHT = 'Y-m-d 20:00';
    const DEFAULT_DATE_FORMAT = "Y-m-d H:i";
    const NEXT_WEDNESDAY_STRING = 'next Wednesday 20:00';
    const NEXT_SATURDAY_STRING = 'next Saturday 20:00';
    const WEDNESDAY_WEEKDAY_NUMBER = 3;

    /**
     * Calculate next lottery draw date
     *
     * @param string|null $dateAndTime
     * @return string
     */
    public function calculateNextValidDrawDate($dateAndTime = null)
    {
        $date = ($dateAndTime === null) ? 'now' : date(self::DEFAULT_DATE_FORMAT, strtotime($dateAndTime));
        $time = new DateTime($date);
        $hour = $time->format('H');
        $weekdayNumber = $time->format('N');
        $nextWed = date(self::DEFAULT_DATE_FORMAT,strtotime(self::NEXT_WEDNESDAY_STRING, $time->getTimestamp()));
        $nextSat = date(self::DEFAULT_DATE_FORMAT,strtotime(self::NEXT_SATURDAY_STRING, $time->getTimestamp()));

        /* If day before Wednesday */
        if (in_array($weekdayNumber, $this->preWednesday)) {
            return $nextWed;
        }

        /* If day before Saturday */
        if (in_array($weekdayNumber, $this->preSaturday)) {
            return $nextSat;
        }

        /* If current day and earlier than 20:00 */
        if ($hour < self::EIGHT_PM_24_HOUR) {
            return $time->format(self::TODAY_AT_EIGHT);
        }

        /* If current day is Wednesday (and $hour >= 8PM) */
        if ($weekdayNumber === self::WEDNESDAY_WEEKDAY_NUMBER) {
            return $nextSat;
        }

        /* If current day is Saturday (and $hour >= 8PM)  */
        return $nextWed;
    }
}

